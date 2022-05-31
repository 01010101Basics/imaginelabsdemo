<?php
/**
 * csvWidget class file.
 *
 * @author Vladimir Kovarsky <vkovarsky@gmail.com>
 * 
 * @copyright Copyright &copy; 2009 Algo-rithm
 * 
 * @version 1.0
 *
 * @desc csvWidget renders button and functionality to generate csv file from data table
 *
 * Usage:
 * 1) copy all the 'csv' catalogue under /protected/extensions
 * 
 * 2) add to your view page (several times, if needed - as many as you wish!):
 *       <?php $this->widget('application.extensions.csv.csvWidget', array(
 *                       'property1'=>'value1',
 *                       'property2'=>'value2')); 
 *        ?>
 *    where possible properties with their default values are:
 * 
 * @var 'table'                     string      css selector (understanding by jQuery $()-function) 
 *                                                  of the table(s) containing data,
 *                                                  <table class='dataGrid'></table> by default (may be not single!)
 * 
 * @var 'csvFile' = ''              string      csv file name (if '', it will be 'data.csv' by default)
 * @var 'ignoredRow' = 'filterRow'  string      class name for the rows <tr> which should be omitted in the csv output
 * @var 'ignoredCol' = 'actionCol'  string      class name for the cells <td>, <th> to be omitted in the csv output
 * @var 'title' = ''                string      the title of the printed page
 * @var 'htmlOptions' = array()     array       htmlOptions array - standard for Yii
 * 
 * 3) register controller in /protected/config/main.php:
 *          'controllerMap'=>array(
 *              'csv'=>array(
 *                  'class'=>'application.extensions.csv.CsvController',
 *                  'property1'=>'value1',
 *                  'property2'=>'value2',
 *                  ),
 *          ...........other controllers (if exist)
 *
 */

 class csvWidget extends CWidget
{
    /**
    * @desc The css selector (understanding by jQuery $()-function) 
    * of the <table> element(s), which is to be exported to csv.
    * If several elements match, all of them will be output into csv.
    * By default, it is
    * <table class='dataGrid'></table> by default
    */
    public $table = '.dataGrid';
    
    public $csvFile = '';
    
    public $ignoredRow = 'filterRow';
    
    public $ignoredCol = 'actionCol';  
        
    /**
    * @desc htmloptions array
    */
    public $htmlOptions = array();
    
    /**
    * @desc counter of widget instancies, is used in order to avoid code repetitions
    */
    static $count = 0;

    public function init()
    {
        $path = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'media';
        $imgUrl = Yii::app()->getAssetManager()->publish($path);
        $imgUrl = $imgUrl.'/csv.gif';
        echo CHtml::link("<img src=\"$imgUrl\" class=\"img_link\" title=\"".Yii::t('lms', 'export')."\">",
                        "#", array_merge($this->htmlOptions, array('onclick'=>'return exportToCsv();')));       

        self::$count++;
        if (self::$count == 1) {
            Yii::app()->clientScript->registerCoreScript('jquery'); 
            Yii::app()->clientScript->registerCoreScript('yii'); 
            
            echo CHtml::script("                
                var formCsv;

                function makeCsvData()
                {
                    formCsv = \$('#csvExportForm').get(0);                    
                    arrayEl = \$('#csvExportData {$this->table}').get();
                    for (var i=0; i<arrayEl.length; i++) {
                        rows = arrayEl[i].rows;
                        for (var j=0; j<rows.length; j++){
                            if (rows[j].className.indexOf('{$this->ignoredRow}') === -1) {
                                cells = rows[j].cells;
                                for (var k=0; k<cells.length; k++){
                                    if (cells[k].className.indexOf('{$this->ignoredCol}') === -1) {
                                        var input = document.createElement('input');
                                        input.setAttribute('type', 'hidden');
                                        input.setAttribute('name', 'tCells['+i+']['+j+']['+k+']');
                                        //check if cell contains a link
                                        if((!cells[k].firstChild) || (cells[k].firstChild.nodeName.toLowerCase()!=='a')){
                                            input.setAttribute('value', cells[k].innerHTML);
                                        } else {
                                            input.setAttribute('value', cells[k].firstChild.innerHTML);
                                        }
                                        formCsv.appendChild(input);
                                    }
                                }
                            }
                        }
                    }
                    input = document.createElement('input');
                    input.setAttribute('type', 'hidden');
                    input.setAttribute('name', 'csvFile');
                    input.setAttribute('value', '{$this->csvFile}');
                    formCsv.appendChild(input);
                }

                function exportToCsv()
                {
                    \$('<div id=\"csvExportData\" style=\"visibility:hidden\"></>').appendTo('body');
                    \$('<div id=\"exportDialogContent\" style=\"margin:0 40px;display:block;\"></div>').appendTo('body');
                    \$('<form id=\"csvExportForm\" method=\"POST\" action=\"".Yii::app()->urlManager->createUrl('csv/index')."\"></form>').appendTo('body');
                    
                    $('#exportDialogContent').html('<span><img src=\"/css/design/loading.gif\" style=\"vertical-align:middle;\"> Exporting data ...</span>');
                    
                    $('#exportDialogContent').dialog(
                    {
                        title: 'Export to CSV',
                        dialogClass: 'export-dialog',                        
                        autoOpen: false,                        
                        position: 'center',                        
                        resizable: false,
                        height:46,
                        minHeight:40

                    }
                    );
                    $('.export-dialog .ui-dialog-titlebar').hide();
                    $('.export-dialog').css('opacity', '0.5');
                    $('#exportDialogContent').dialog('open');

                    
                    jQuery.ajax(
                            {'type':'POST','url':window.location.href,'cache':false,
                                'data':'format=csv',
                                'success':function(html) {
                                    jQuery('#csvExportData').html(html);
                                    makeCsvData();
                                    formCsv.submit();
                                    $('#exportDialogContent').dialog('destroy');
                                    jQuery('#csvExportData').remove();
                                    jQuery('#exportDialogContent').remove();
                                    jQuery('#csvExportForm').html('');
                                    return false;
                                },
                                error: function (XMLHttpRequest, textStatus, errorThrown) {
                                    $('#exportDialogContent').html('Can not export data, status: ' + textStatus);
                                    $('.export-dialog .ui-dialog-titlebar').show();
                                    $('.export-dialog').css('opacity', '1');
                                    $('#exportDialogContent').dialog('option', 'buttons', { 'Close': function() { $('#exportDialogContent').dialog('destroy'); } });
                                }
                            }
                    );                                               
                    
                    return false;
                }
            ");
        }
    }                          

}