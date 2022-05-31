csvout

Generates csv file output for selected tables on a page

This extension generates csv file output for selected tables on a page, multiple selection is allowed

=============================
Copyright (c) 2009 by Vladimir Kovarsky, Algo-rithm
All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

* Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
* Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
* Neither the name of Vladimir Kovarsky nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
=============================

###Requirements
* Yii 1.0.5

###Installation
* Copy all the 'csv' catalogue under /protected/extensions

* Register controller 'CsvController' in /protected/config/main.php:

[php]

     'controllerMap'=>array(
              'csv'=>array(
                  'class'=>'application.extensions.csv.CsvController',
                  'property1'=>'value1',
                  'property2'=>'value2',
                  ),
          ...........other controllers (if exist)
     ),

[php]

###Usage
* Add button(s) to your view page (several times, if needed - as many as you wish!):

[php]

        <?php $this->widget('application.extensions.csv.csvWidget', array(
                        'property1'=>'value1',
                        'property2'=>'value2')); 
         ?>

[php]
		 
where possible properties with their default values are:

* 'table' => '.dataGrid' string selector (understanding by jQuery $()-function) of the table(s) to be output, by default it's a 'table' with class='dataGrid' (selection result may be not single!)
  
* 'csvFile' => '' string csv file name (if '', it will be 'data.csv' by default)

* 'ignoredRow' => 'filterRow' string class name for the rows 'tr' which should be omitted in the csv output

* 'ignoredCol' => 'actionCol' string class name for the cells 'td', 'th' to be omitted in the csv output

* 'htmlOptions' => array() array htmlOptions array - standard for Yii