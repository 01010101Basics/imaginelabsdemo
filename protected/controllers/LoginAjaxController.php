<?php

class LoginAjaxController extends Controller
{
public $defaultAction = 'login';


public function actionIndex() 
{
	
	echo "this is working";
	
	}


/**
* Displays the login page
*/
public function actionLogin()
{
if (Yii::app()->user->isGuest) {
$model=new UserLogin;
// collect user input data
if(isset($_POST['UserLogin']))
{
$model->attributes=$_POST['UserLogin'];
// validate user input and redirect to previous page if valid
if($model->validate()) {
$this->lastViset();
if (Yii::app()->user->returnUrl=='/index.php')
$this->redirect(Yii::app()->controller->module->returnUrl);
else
$this->redirect(Yii::app()->user->returnUrl);
}
}
// display the login form
$this->render('/user/login',array('model'=>$model));
} else
$this->redirect(Yii::app()->controller->module->returnUrl);
}

public function actions()
{
return array(
'oauth' => array(
'class'=>'ext.hoauth.HOAuthAction',
),
'oauthadmin' => array(
'class'=>'ext.hoauth.HOAuthAdminAction',
),
);
}

private function lastViset() {
$lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
$lastVisit->lastvisit = time();
$lastVisit->save();
}

public function actionUpdateAjax()
{
$data = array();
$data["myValue"]="";
$model=new LoginForm;

if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}

if(isset($_POST['LoginForm']))
{
$model->attributes=$_POST['LoginForm'];
// validate user input and redirect to previous page if valid
if($model->validate()&& $model->login()) {
$data["myValue"]="success";
}
else{
$data["myValue"]="<?php echo TbHtml::alert(TbHtml::ALERT_COLOR_ERROR, 'Wrong'); ?>";
}
}
$this->renderPartial('_ajaxContent', $data, false, true);
}
}
