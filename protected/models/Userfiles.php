<?php

/**
 * This is the model class for table "userfiles".
 *
 * The followings are the available columns in table 'userfiles':
 * @property integer $id
 * @property string $description
 * @property string $filename
 * @property integer $user_id
 */
class Userfiles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Userfiles the static model class
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
		return 'userfiles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description, user_id', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			//array('filename', 'length', 'max'=>255),
			array('filename', 'file', 'types'=>'jpg, gif, png,doc,docx,xls,xlsx,pdf','allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, description, filename,origfile, user_id', 'safe', 'on'=>'search'),
		);
	}
	/*public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('filename,description, user_id', 'required','on'=>'create'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('filename', 'file', 'types'=>'jpg, gif, png,doc,docx,xls,xlsx,pdf','allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id,description, user_id', 'safe', 'on'=>'search'),
			array('filename', 'unsafe'),
			
			 
		);
	}*/

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'description' => 'Description',
			'filename' => 'Filename',
			'origfile' => 'Origfile',
			'user_id' => 'User',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('origfile',$this->origfile,true);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}