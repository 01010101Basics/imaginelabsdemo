<?php

/**
 * This is the model class for table "menu".
 *
 * The followings are the available columns in table 'menu':
 * @property integer $id
 * @property string $label
 * @property string $view_page
 * @property string $url
 * @property string $options
 * @property string $urloptions
 * @property string $description
 * @property integer $status
 * @property string $role
 * @property integer $position
 * @property integer $menu_group_id
 *
 * The followings are the available model relations:
 * @property Submenu[] $submenus
 */
class Menu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Menu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('label, view_page, url, options, urloptions, description, status, role, position, menu_group_id', 'required'),
			array('status, position, menu_group_id', 'numerical', 'integerOnly'=>true),
			array('label, view_page, url', 'length', 'max'=>128),
			array('options, urloptions', 'length', 'max'=>255),
			array('role', 'length', 'max'=>77),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, label, view_page, url, options, urloptions, description, status, role, position, menu_group_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'submenus' => array(self::HAS_MANY, 'Submenu', 'menu_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'label' => 'Label',
			'view_page' => 'View Page',
			'url' => 'Url',
			'options' => 'Options',
			'urloptions' => 'Urloptions',
			'description' => 'Description',
			'status' => 'Status',
			'role' => 'Role',
			'position' => 'Position',
			'menu_group_id' => 'Menu Group',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('label',$this->label,true);
		$criteria->compare('view_page',$this->view_page,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('options',$this->options,true);
		$criteria->compare('urloptions',$this->urloptions,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('menu_group_id',$this->menu_group_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}