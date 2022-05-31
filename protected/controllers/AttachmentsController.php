<?php

class AttachmentsController extends Controller
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
				/*'users'=>array('*'),*/
				'roles'=>array('domain_user','administrators'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				/*'users'=>array('@'),*/
				'roles'=>array('domain_user','administrators'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','process','delete'),
			/*	'users'=>array('admin'),*/
				'roles'=>array('domain_user','administrators'),
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
		$this->renderPartial('view',array(
			'model'=>$this->loadModel3($id),
		),false,true);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	/*public function actionCreate()
	{
		$model=new Attachments;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Attachments']))
		{
			$model->attributes=$_POST['Attachments'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}*/
	public function actionCreate()
	{
		
		
		$bucket = 'cesfiledata';
		$model=new Attachments;
		$type = isset($_GET['type']) ? $_GET['type'] : 'post';

		if(isset($_POST['Attachments'])){

			$model->attributes = $_POST['Attachments'];
			
			
			$name = $_FILES['files']['name'];
			$size = $_FILES['files']['size'];
           	$file = CUploadedFile::getInstancesByName('files');
			
			//Set count to 0
			$files_uploaded = 0;
        	$files_not_uploaded =0;
        	 // proceed if the images have been set
			if(isset($file) && count($file) > 0){
				$s3 = new A2S3();

			 // go through each uploaded image
			foreach ($file as $image => $pic) {
					$tmp = $pic->tempName;
            		$newfilename = $pic->name;
					
			
				if($model->save()){

					
					//Rename image name. 
					echo $newfilename;
						try {$s3->putObject(array(
							'SourceFile'          => $tmp,
							'Bucket'              => $bucket,
							'Key'                 => 'attidb/'.$newfilename,
							'ACL'                 => 'public-read',
							'x-amz-storage-class' => 'REDUCED_REDUNDANCY',));
							$model->pole_id = $_GET['pole_id'];
							$model->filename = $newfilename;
							$model->origfile = $pic->name;
							$model->path = $s3file = 'http://' . $bucket . '.s3.amazonaws.com/attidb/' . $newfilename;
							$model->save(false);
							$model=new Attachments;
							$files_uploaded++;
							
						} catch (\Aws\S3\Exception\S3Exception $e) {
						
							$files_not_uploaded++;
						}
			
         				
					}
							Yii::app()->user->setFlash('notification', 'File has been successfully uploaded to Amazon!');	

					}
				}
			
			$this->redirect(array('/poles/view/', 'id' => $_GET['pole_id']));
		}
		$this->renderPartial('create', array(
			'model' => $model),
			false, true
		);

	}

	function getExtension($str)
	{
		$i = strrpos($str, ".");
		if(!$i){
			return "";
		}
		$l = strlen($str) - $i;
		$ext = substr($str, $i + 1, $l);
		return $ext;
	}
	//local uploads
	/*public function actionCreate()
	{
		
		$model=new Attachments;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Attachments']))
		{
			
			if($model->save())
			 
   			$model->attributes=$_POST['Attachments'];
			
				
            $model->filename=CUploadedFile::getInstance($model,'filename');
            if($model->save())
            {
				if(isset($model->filename)) {
					$date = new DateTime();
					echo "Made it";
					$model->origfile=$model->filename;
					$new_file = $date->getTimestamp().$model->origfile;
					$model->path = yii::app()->baseURL.'/uploads/'.$new_file;
					echo $file= 'uploads/'.$new_file;
					$model->filename->saveAs($file);
					$model->filename = $new_file;
					
					$model->save(false);
					$model->employee_id = $model->employee_id;
					$model->save(false);
					
				}
				
				$this->redirect(array('/claim/view/','id'=>$_GET['claim_id']));
			}
		}
		
		if(Yii::app()->request->isAjaxRequest) {
			
			$this->renderPartial('create',array(
			'model'=>$model
		),false,true);
			
			}
		
		else {

		$this->render('create',array(
			'model'=>$model,
		),false,true);
		}
	}*/
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

		if(isset($_POST['Attachments']))
		{
			$model->attributes=$_POST['Attachments'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	/*public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}*/
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		if($_GET['filename']){
			
			$s3 = new A2S3();
				  $bucket = 'cesfiledata';
				  $result = $s3->deleteObject(array(
								'Bucket' => $bucket.'/workerscomp',
								'Key'    => $_GET['filename']
								));
					echo "Deleted". ' - ' . $_GET['filename'];
					
			
			
			}
		
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			//$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view'));
			$this->redirect(array('/claims/view/', 'id' => $_GET['claim_id']));
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Attachments');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Attachments('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Attachments']))
			$model->attributes=$_GET['Attachments'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Attachments the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Attachments::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function loadModel3($id)
	{
		$model=Attachments::model()->findByAttributes(array('employee_id'=>$id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function loadModel4($id)
	{
		$model=Utilitymaps::model()->findByAttributes(array('project_id'=>$id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	/**
	 * Performs the AJAX validation.
	 * @param Attachments $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='attachments-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
