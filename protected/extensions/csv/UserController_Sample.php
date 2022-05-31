<?php

class UserController extends CController
{
    const PAGE_SIZE = 30;

    /**
     * @var string specifies the default action to be 'list'.
     */
    public $defaultAction='admin';

    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
    private $_model;
  
    
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl',             
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
            array('allow',
                'users'=>array('*'),
            ),
        );
    }


    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $this->processAdminCommand();

        $criteria=new CDbCriteria;

        $this->filterUsers($criteria);

        $filters = new CDataFilter(User::model());
        $filters->addFilter(CDataFilter::FILTER_SEARCH,   'userFieldsSearch', '');
        $filters->addFilter(CDataFilter::FILTER_DROPDOWN, 'schoolFilter', 'School', 'All', array('null'=>'None'));
        $filters->addFilter(CDataFilter::FILTER_DROPDOWN, 'classStudentFilter', 'Class (student)', 'All', array('null'=>'None'));
        $filters->addFilter(CDataFilter::FILTER_DROPDOWN, 'classTeacherFilter', 'Class (teacher)', 'All', array('null'=>'None'));
        $filters->addFilter(CDataFilter::FILTER_DROPDOWN, 'userTypeFilter', 'User Type');
        
        $filters->applyCriteria($criteria);

        $format = Yii::app()->request->getParam('format');

        $pages=new CPagination(User::model()->count($criteria));
        $pages->pageSize= self::PAGE_SIZE;

        //if format is set - no pagination
        if (!isset($format)) {
            $pages->applyLimit($criteria);
        }

        $sort=new ExtSort('User');
        $sort->defaultOrder = "lname";
        $sort->applyOrder($criteria);

        $models=User::model()->findAll($criteria);

        $params = array(
                'models'=>$models,
                'pages'=>$pages,
                'sort'=>$sort,
                'filters'=>$filters,
                'isEdit'=>UserIdentity::canEditUsers(),
                'format'=>isset($format)?$format:''
        );
      
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('adminList', $params);
        } else {
            $this->render('admin', $params);
        }
    }

}
