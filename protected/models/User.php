<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $activkey
 * @property integer $createtime
 * @property integer $lastvisit
 * @property integer $superuser
 * @property integer $status
 * @property integer $group_id
 * @property integer $company_id
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}
	
	public function validatePassword($password, $username){
                return $this->hashPassword($password, $username) === $this->password;
                
        }
        /**
         * @return hashed value
         */
        
        public function hashPassword($phrase, $salt = null){
                return SHA1($phrase);
        }
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email, group_id, company_id', 'required'),
			array('createtime, superuser, status, group_id, company_id', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>20),
			array('password, email, activkey', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, email, activkey, createtime, lastvisit, superuser, status, group_id, company_id', 'safe', 'on'=>'search'),
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
                        'group' => array(self::BELONGS_TO, 'Groups', 'group_id'),
						
                );
        }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'activkey' => 'Activkey',
			'createtime' => 'Createtime',
			'lastvisit' => 'Lastvisit',
			'superuser' => 'Superuser',
			'status' => 'Status',
			'group_id' => 'Group',
			'company_id' => 'Company',
		);
	}
public function onlyMe()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
	if(Yii::app()->user->company_id=='2') {
			$myco=	$this->username;
			}
			else {
			$myco= Yii::app()->user->id;
			}
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$myco,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('pm_alerts',$this->pm_alerts);

                $criteria->compare('group_id',$this->group_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		if(Yii::app()->user->company_id=='1') {
			$myid=	$this->id;
			}
			else {
			$myco= Yii::app()->user->user_id;
			}
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('activkey',$this->activkey,true);
		$criteria->compare('createtime',$this->createtime);
		$criteria->compare('lastvisit',$this->lastvisit);
		$criteria->compare('superuser',$this->superuser);
		$criteria->compare('status',$this->status);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('group_id',$this->group_id);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		
	}
	
	public function searchByID($id)
	{
		

		$criteria=new CDbCriteria;

		$criteria->compare('id',$id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('activkey',$this->activkey,true);
		$criteria->compare('createtime',$this->createtime);
		$criteria->compare('lastvisit',$this->lastvisit);
		$criteria->compare('superuser',$this->superuser);
		$criteria->compare('status',$this->status);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('group_id',$this->group_id);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		
	}
	
}