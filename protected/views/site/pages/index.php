<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);



$filesmodel = Userfiles::model();
$usermodel = User::model();
$menugroupsmodel = Menugroups::model();
$menumodel = Menu::model();
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.cookie.js',CClientScript::POS_END);
?>
<script type="text/javascript">
$(document).ready(function() {
		console.log('ready');
	if($.cookie("toggle-state") === 'false') {
			console.log($.cookie("toggle-state"));
		 $("#test").hide();
		  }
	});
function hideDiv(buttonid,id){
	
       if($.cookie){
           //By default, if no cookie, just display.
           $("#"+id).toggle(!(!!$.cookie("toggle-state")) || $.cookie("toggle-state") === 'true');
		  
	
		  }

    $("#"+buttonid).on('click', function(){
		
        $("#"+id).toggle();
        //Save the value to the cookie for 1 day; and cookie domain is whole site, if ignore "path", it will save this cookie for current page only;
		var obj = "{'someName':'someValue','someOtherName':'someOtherValue'}";
        $.cookie("toggle-state", "{'someName':'someValue','someOtherName':'someOtherValue'}", {expires: 1, path:'/'}); 
		console.log($.cookie('togglestate').someName);
});


    
  
	};
</script>
<style type="text/css">

.outer {
    width: 300%;
	height:300%
    border: 1px solid #000;
    overflow: auto;
}

.box {
    float: left;
    width: calc(60% - 10px);
    
    border: 1px solid #000;
}

#A {
    height: %100;
	widows:%100%
}

#B {
    height: %100;
}

#C {
    height: %100;
}

#D {
    height: %100;
}
#button1 {
     line-height: 12px;
     width: 18px;
     font-size: 8pt;
     font-family: tahoma;
   float:right;
   margin-top:-20px;
   margin-right:-20px;
     
     top:0;
     right:0;
 }
 #button2 {
     line-height: 12px;
     width: 18px;
     font-size: 8pt;
     font-family: tahoma;
   float:right;
   margin-top:-20px;
   margin-right:-20px;
     
     top:0;
     right:0;
 }
 #button3 {
     line-height: 12px;
     width: 18px;
     font-size: 8pt;
     font-family: tahoma;
   float:right;
   margin-top:-20px;
   margin-right:-20px;
     
     top:0;
     right:0;
 }
 #button4 {
     line-height: 12px;
     width: 18px;
     font-size: 8pt;
     font-family: tahoma;
   float:right;
   margin-top:-20px;
   margin-right:-20px;
     
     top:0;
     right:0;
 }
 #inner1 {
    height: 100%;
    border: 1px solid blue;
}

</style>
  
<h1>About</h1>

<p>This is a "static" page. You may change the content of this page
by updating the file <code><?php echo __FILE__; ?></code>.</p>

<?php ?>
<div class="outer">
   
      
<div id="cru-frame" width="100%" height="100%"></div>