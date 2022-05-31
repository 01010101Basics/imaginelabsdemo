<?php
/**
 * @desc 
 * 
 * @author Vladimir Kovarsky <vkovarsky@gmail.com>
 * 
 * @copyright Copyright &copy; 2009 Algo-rithm
 * 
 * @version 1.0 
 */

class CsvController extends CExtController
{
	public $defaultAction='index';
        
    public function init()
    {        

    }


	public function actionIndex()
	{
        if (isset($_POST['tCells'])) {
            $tCells = $_POST['tCells'];

            $output = '';
            $outputTable = array();

            foreach ($tCells as $table) {
                foreach ($table as $row) {
                    $outputTable[] = join(Config::CSV_SEPARATOR, $row);
                }     
                $output .= join("\r\n", $outputTable) . "\r\n\r\n";
                $outputTable = array();
            }
            
            if (isset($_POST['csvFile']) and $_POST['csvFile'] != '')
                $csvFile = $_POST['csvFile'];
            else 
                $csvFile = 'data.csv';
                
            header("Content-type: application/csv");
            header("Content-Disposition: attachment; filename=\"{$csvFile}\"");
            
            echo $output;
            
        } else {
            echo Yii::t('lms', 'Nothing to do!');
        }
	}


}
