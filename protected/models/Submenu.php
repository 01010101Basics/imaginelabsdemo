<?php

/**
 * This is the model class for table "submenu".
 *
 * The followings are the available columns in table 'submenu':
 * @property integer $id
 * @property string $sublabel
 * @property string $sub_view_page
 * @property string $suburl
 * @property string $suboptions
 * @property string $suburloptions
 * @property integer $subposition
 * @property integer $status
 * @property integer $menu_id
 *
 * The followings are the available model relations:
 * @property Menu $menu
 * @property Subsubmenu[] $subsubmenus
 */
class Submenu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Submenu the static model class
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
		return 'submenu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sublabel, sub_view_page, suburl, suboptions, suburloptions, subposition, status, menu_id', 'required'),
			array('subposition, status, menu_id', 'numerical', 'integerOnly'=>true),
			array('sublabel, suboptions, suburloptions', 'length', 'max'=>70),
			array('sub_view_page, suburl', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, sublabel, sub_view_page, suburl, suboptions, suburloptions, subposition, status, menu_id', 'safe', 'on'=>'search'),
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
			'menu' => array(self::BELONGS_TO, 'Menu', 'menu_id'),
			'subsubmenus' => array(self::HAS_MANY, 'Subsubmenu', 'submenu_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'sublabel' => 'Sublabel',
			'sub_view_page' => 'Sub View Page',
			'suburl' => 'Suburl',
			'suboptions' => 'Suboptions',
			'suburloptions' => 'Suburloptions',
			'subposition' => 'Subposition',
			'status' => 'Status',
			'menu_id' => 'Menu',
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
		$criteria->compare('sublabel',$this->sublabel,true);
		$criteria->compare('sub_view_page',$this->sub_view_page,true);
		$criteria->compare('suburl',$this->suburl,true);
		$criteria->compare('suboptions',$this->suboptions,true);
		$criteria->compare('suburloptions',$this->suburloptions,true);
		$criteria->compare('subposition',$this->subposition);
		$criteria->compare('status',$this->status);
		$criteria->compare('menu_id',$this->menu_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}