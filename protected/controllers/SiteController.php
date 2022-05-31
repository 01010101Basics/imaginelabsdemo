<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
	public function actionSendData()
	{
			
			$alerts  =  Yii::app()->db->createCommand()
                             ->select('name,id,DATE_ADD(`start_date`,INTERVAL 11 MONTH) as duedate')
                            ->from('contract t')
                            ->where("DATE_ADD(`start_date`,INTERVAL (SELECT notice FROM contract WHERE t.id = id )  MONTH) > DATE_FORMAT(DATE_SUB(NOW(),INTERVAL 1 MONTH), '%Y-%m-%d') OR 					
									 DATE_ADD(`start_date`,INTERVAL (SELECT notice FROM contract WHERE t.id = id )  MONTH) < 	
									 DATE_FORMAT(DATE_ADD(NOW(),INTERVAL 1 MONTH), '%Y-%m-%d')
									 OR DATE_FORMAT(NOW(), '%Y-%m-%d') >=   DATE_ADD(`start_date`, INTERVAL (SELECT `renewal_period` FROM contract WHERE t.id = id )  MONTH) ")
							->queryAll();
			$flashmessage='';	
			$i=1;			
			foreach($alerts as $value) {
			$flashmessage= $flashmessage .=  '<strong>#'.$i++.' -- </strong>'.CHtml::link($value['name'] . '  -  Due Date:' .
			$value['duedate'],'http://'.$_SERVER['SERVER_NAME'].yii::app()->createURL('/contract/view',array('id'=>$value['id']))).'<br />';
			}
				
				$count = count($alerts);
				
			if($count>0) {
				$name='=?UTF-8?B?'.base64_encode('alerts').'?=';
				$subject='=?UTF-8?B?'.base64_encode('Contract Alerts').'?=';
				$headers="From: $name <{Ken Goddard}>\r\n".
					"Reply-To: {ken.goddard@cableeng.com}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/html charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,'The following contracts are due/overdue: <br />'.$flashmessage. ' -  Record Count is: ' .$count,$headers);
				Yii::app()->user->setFlash('contact','Alerts have been sent');
				
				//$this->render('site/page/view/badges',false,true);
			}
		
	}
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}