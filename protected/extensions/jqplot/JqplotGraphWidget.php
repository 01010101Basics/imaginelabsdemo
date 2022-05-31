<?php
Yii::import('application.extensions.jqplot.JqplotWidget');
class JqplotGraphWidget extends JqplotWidget{
        /**
         * @var string the name of the container element that contains the progress bar. Defaults to 'div'.
         */
        public $tagName = 'div';
 
        public $ajaxOpts = array(
                'dataType' => 'json'
        );
 
        protected function createJQPlotScript($plotdata) {
                $flotoptions = CJavaScript::encode($this->options);
                $id = $this->htmlOptions['id'];
                return "$.jqplot('$id', $plotdata, $flotoptions);";
        }
 
        /**
         * Run this widget.
         * This method registers necessary javascript and renders the needed HTML code.
         */
        public function run(){
                if (!isset($this->htmlOptions['id'])) $this->htmlOptions['id'] = $this->getId();
 
                echo CHtml::tag($this->tagName,$this->htmlOptions, '');
 
                $script = '';
                if (is_array($this->data)) {
                        $script = $this->createJQPlotScript(CJavaScript::encode($this->data));
                } else {
                        // ajax
                        // use data property as url
                        if (!isset($this->ajaxOpts['url']) && is_string($this->data)) $this->ajaxOpts['url'] = $this->data;
                        // write success func if not given
                        if (!isset($this->ajaxOpts['success']))
                                $this->ajaxOpts['success'] = 'js:function(data) {alert(data);}';
                        $script = '$.ajax('.CJavaScript::encode($this->ajaxOpts).')';
                }
 
                Yii::app()->getClientScript()->registerScript(__CLASS__.'#'.$this->htmlOptions['id'], $script);
        }
 
}