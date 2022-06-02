<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','getExtra','UpdateEditable'),
				'users'=>array('@'),
			),
			/*array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),*/
			 array('allow',
                                'actions'=>array('admin','delete'),
                                'users'=>array('@'),
                                'expression'=>'$user->group_id==="1"'
                                ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		 if(Yii::app()->request->isAjaxRequest)
                                {
            $this->renderPartial('view',array(
			'model'=>$this->loadModel($id),
            ));
                                }
                                else {
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
								}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	/*public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}*/
public function actionCreate()
        {
               
			   $model2 = Groups::model();
			    $model=new User;
                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);
                if(isset($_POST['User']))
                {
                        $model->attributes=$_POST['User'];
                        $model->password = $model->hashPassword($_POST['User']['password'], $_POST['User']['email']);
                        if($model->save())
                                $this->redirect(array('view','id'=>$model->id));
								//$this->redirect(array('site/author'));
                        else
                                $model->password = $_POST['User']['password'];
                }
                if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

                $this->render('create',array(
                        'model'=>$model,
                ));
				
				
        }
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->password = sha1($_POST['User']['password']);
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		if(Yii::app()->request->isAjaxRequest)
         {
          $this->renderPartial('update',array(
                              'model'=>$model,false,true
          ));
       }
       else {
             $this->render('update',array(
                           'model'=>$model,
            ));
       }              
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	 public $columns;
	 
	public function actionAdmin()
	{
		$model=new User('search');
    $model->unsetAttributes();  // clear any default values
    if(isset($_GET['User']))
        $model->attributes=$_GET['User'];

    $this->render('admin',array(
        'model'=>$model,
    ));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function actionGetExtra($id){
        $model=User::model()->findByPk($id);
		if($model->status==1) { $status= "Active"; } else { $status= "Not Active"; }
        echo json_encode(array('row'=> '<tr class="toggle"><td   colspan="2">'. $model->email .'</td><td   colspan="2">'. $model->lastvisit.'</td><td   colspan="2">'. $status .'</td></tr>'));
		//echo json_encode(array('row'=> '<tr class="toggle"><td   colspan="6">'. $model->status.'</td></tr>'));
  }
	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	 public function actionToggle($id, $attribute)
    {
        if(!Yii::app()->request->isPostRequest)
            throw new CHttpException(400, 'Bad request');

        if (!in_array($attribute, array('public', 'inhome')))
            throw new CHttpException(400, 'Bad request');

        $model = $this->loadModel($id);
        $model->$attribute = $model->$attribute ? 0 : 1;
        $model->save();

        if (!Yii::app()->request->isAjaxRequest)
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

	public function actionUpdateEditable() {
		Yii::import('ext.x-editable.EditableSaver');
		$es = new EditableSaver($_GET['model']);  // 'modelName' is classname of model to be updated
		$es->update();
	}
}
