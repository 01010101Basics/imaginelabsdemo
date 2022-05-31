<?php
Yii::import('zii.widgets.grid.CGridView');
/**
 * A Grid View that groups rows by date spans
 *
 * @category   	User Interface
 * @package    	extensions
 * @author 		Alex Urbano <asgaroth.belme@gmail.com>
 * @version 	0.1
 */
class XDateView extends CGridView{

	private $_formatter;
	/**
	 * @var string the date attribute of the model that will be used to render the table. Defaults to 'create_time'.
	 */
	public $dateField = "create_time";

	/**
	 * @var array html options for the table
	 */
	public $tableOptions= array();

	private $_mergedData = array();

	public function init(){
		if($this->baseScriptUrl===null){
			$this->baseScriptUrl= Yii::app()->getAssetManager()->publish(dirname(__FILE__).'/assets');
		}
		if($this->cssFile!==false)
		{
			if($this->cssFile===null){
				$this->cssFile=$this->baseScriptUrl.'/css/styles.css';
			}
		}

		if(!isset($this->htmlOptions['class'])){
			$this->htmlOptions['class']='date-view';
		}

		parent::init();
	}

	/**
	 * Registers necessary client scripts.
	 */
	public function registerClientScript()
	{
		$id=$this->getId();

		if($this->ajaxUpdate===false)
			$ajaxUpdate=false;
		else
			$ajaxUpdate=array_unique(preg_split('/\s*,\s*/',$this->ajaxUpdate.','.$id,-1,PREG_SPLIT_NO_EMPTY));
		$options=array(
			'ajaxUpdate'=>$ajaxUpdate,
			'ajaxVar'=>$this->ajaxVar,
			'pagerClass'=>$this->pagerCssClass,
			'loadingClass'=>$this->loadingCssClass,
			'filterClass'=>$this->filterCssClass,
			'tableClass'=>$this->itemsCssClass,
			'selectableRows'=>$this->selectableRows,
		);
		if($this->ajaxUrl!==null)
			$options['url']=CHtml::normalizeUrl($this->ajaxUrl);
		if($this->updateSelector!==null)
			$options['updateSelector']=$this->updateSelector;
		if($this->enablePagination)
			$options['pageVar']=$this->dataProvider->getPagination()->pageVar;
		if($this->beforeAjaxUpdate!==null)
			$options['beforeAjaxUpdate']=(strpos($this->beforeAjaxUpdate,'js:')!==0 ? 'js:' : '').$this->beforeAjaxUpdate;
		if($this->afterAjaxUpdate!==null)
			$options['afterAjaxUpdate']=(strpos($this->afterAjaxUpdate,'js:')!==0 ? 'js:' : '').$this->afterAjaxUpdate;
		if($this->ajaxUpdateError!==null)
			$options['ajaxUpdateError']=(strpos($this->ajaxUpdateError,'js:')!==0 ? 'js:' : '').$this->ajaxUpdateError;
		if($this->selectionChanged!==null)
			$options['selectionChanged']=(strpos($this->selectionChanged,'js:')!==0 ? 'js:' : '').$this->selectionChanged;

		$options=CJavaScript::encode($options);
		$cs=Yii::app()->getClientScript();
		$cs->registerCoreScript('jquery');
		$cs->registerCoreScript('bbq');
		$cs->registerScriptFile($this->baseScriptUrl.'/js/jquery.yiigridview.js',CClientScript::POS_END);
		$cs->registerScript(__CLASS__.'#'.$id,"jQuery('#$id').yiiGridView($options);");
	}


	/**
	 * Prepares the data to be used in the grid
	 * @return array the formated data in the following format.
	 *  (
	 *  	"January/2011" => array(
	 *  		'label' => 'Noviembre/2011',
	 *  		 'days' => array(
	 *	  			'Friday/11/November/2011' => array
	 *  				'label' => 'Friday 11',
	 *  				'items' => array(
	 *  					'0' => row_index
	 *  					'1' => row_index
	 *	  				)
	 *  			'Thursday/10/November/2011' => array(...)
	 *  			)
	 * 			),
	 *  	)
	 *  )
	 */
	public function processData(){
		$data = $this->dataProvider->getData();
		$n=count($data);
		if($n>0)
		{
			for($row=0;$row<$n;++$row){
				$time = strtotime($data[$row][$this->dateField]);
				if(!$time){
					$time = 0;
				}
				$month = date("F/Y", $time);
				$day = date("l/d/F/Y", $time);
				//$dayLabel = date("l\nd", $time);
				$monthLabel = Yii::app()->dateFormatter->format("MMMM/y",$time);
				$dayLabel = Yii::app()->dateFormatter->format("EEEE\nd", $time);
				if(!isset($this->_mergedData[$month])){
					$this->_mergedData[$month] = array("label" => ucfirst($monthLabel), "days" => array());
				}
				if(!isset($this->_mergedData[$month]["days"][$day])){
					$this->_mergedData[$month]["days"][$day] = array("label" => ucfirst($dayLabel), "items" => array());
				}
				$this->_mergedData[$month]["days"][$day]["items"][] = $row;
			}
		}
		return $this->_mergedData;
	}

	/**
	 * Renders the data items for the grid view.
	 */
	public function renderItems()
	{
		if($this->dataProvider->getItemCount()>0 || $this->showTableOnEmpty)
		{
			$this->processData();
			if(!isset($this->tableOptions["class"])){
				$this->tableOptions["class"] = $this->itemsCssClass;
			}else{
				$this->tableOptions["class"] .= " ".$this->itemsCssClass;
			}
			echo CHtml::openTag("table", $this->tableOptions)."\n";
			$this->renderTableHeader();
			ob_start();
			$this->renderTableBody();
			$body=ob_get_clean();
			$this->renderTableFooter();
			echo $body; // TFOOT must appear before TBODY according to the standard.
			echo "</table>";
		}
		else
		$this->renderEmptyText();
	}

	/**
	 * Renders the table header.
	 */
	public function renderTableHeader()
	{
		if(!$this->hideHeader)
		{
			echo "<thead>\n";
			if($this->filterPosition===self::FILTER_POS_HEADER)
				$this->renderFilter();
			echo "<tr>\n";
			echo "<th>&nbsp;</th>\n";//First table head is empty
			foreach($this->columns as $column){
				$column->renderHeaderCell();
			}
			echo "</tr>\n";
			if($this->filterPosition===self::FILTER_POS_BODY)
				$this->renderFilter();
			echo "</thead>\n";
		}
	}

	/**
	 * Renders the filter.
	 * @since 1.1.1
	 */
	public function renderFilter()
	{
		if($this->filter!==null)
		{
			echo "<tr class=\"{$this->filterCssClass}\">\n";
			echo "<td>&nbsp;</td>\n";//First table head is empty
			foreach($this->columns as $column){
				$column->renderFilterCell();
			}
			echo "</tr>\n";
		}
	}

	/**
	 * Renders the table footer.
	 */
	public function renderTableFooter()
	{
		$hasFilter=$this->filter!==null && $this->filterPosition===self::FILTER_POS_FOOTER;
		$hasFooter=$this->getHasFooter();
		if($hasFilter || $hasFooter)
		{
			echo "<tfoot>\n";
			if($hasFooter)
			{
				echo "<tr>\n";
				echo "<th>&nbsp;</th>\n";//First table head is empty
				foreach($this->columns as $column)
					$column->renderFooterCell();
				echo "</tr>\n";
			}
			if($hasFilter)
				$this->renderFilter();
			echo "</tfoot>\n";
		}
	}

	/**
	 * Renders the table body.
	 */
	public function renderTableBody()
	{
		$data= $this->_mergedData;
		$n=count($data);
		echo "<tbody>\n";

		if($n>0)
		{
			foreach ($data as $month) {
				$this->renderMonth($month["label"]);
				$this->renderDays($month["days"]);
			}
		}
		else
		{
			echo '<tr><td colspan="'.(count($this->columns)+1).'">'."\n";
			$this->renderEmptyText();
			echo "</td></tr>\n";
		}
		echo "</tbody>\n";
	}




	/**
	 * Renders a Month.
	 * @param array $month the month array with day items.
	 */
	public function renderMonth($month)
	{
		echo '<tr><th colspan="'.(count($this->columns)+1).'" class="table-month">'."\n";
		echo CHtml::encode($month);
		echo "</th></tr>\n";
	}

	/**
	 * Render the current days.
	 * @param array $days the array day with items.
	 */
	public function renderDays($days){
		$d = 0;
		$n = is_array($this->rowCssClass) ? count( $this->rowCssClass ) : 0;
		foreach($days as $day){
			$label = $day["label"];
			foreach ($day["items"] as $i => $row){
				echo $n > 0 ? '<tr class="'.$this->rowCssClass[$d%$n].'">'."\n" : '<tr>'."\n";
				echo $i == 0 ? "\t".CHtml::tag('td', array('rowspan' => count($day["items"]), "class" => "table-day"), "<b>".nl2br($label)."</b>")."\n" : "\n";
				foreach($this->columns as $column){
					$column->renderDataCell($row);
				}
				echo "</tr>\n";
			}
			$d++;
		}
	}
}