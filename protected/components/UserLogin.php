<?php
//Yii::import('zii.widgets.CPortlet');
class UserLogin extends Portlet
{
    public $title='Login';
 	
    protected function renderContent()
    {
		 
        $model=new LoginForm;
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            if($model->validate())
			
                $this->controller->refresh();
        }
        $this->render('userLogin',array('model'=>$model));
    }
}