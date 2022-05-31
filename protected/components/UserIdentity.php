<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	
	public function authenticate()
	{
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
}

/*class UserIdentity extends CUserIdentity
{
	
	
	private $_fields = array("samaccountname","mail","memberof","department","displayname","telephonenumber","primarygroupid","objectsid");
	private $_id;
	
	public function getMembership($groupinfo) {
	return Yii::app()->ldap->group()->members($groupinfo);
	
	}
	

	
	private $_roleMappings = array(
				//based on a group
				
			'domain_user' => array(
				'samaccountname'=> array(),
				'groups'=> array('Domain Users'),
			),
			// based on an acccount name
			'administrator' => array(
				'samaccountname'=> array('kmgoddard'),
				'groups'=> array(),
			),
			// based on mutliple groups and users
			
			'administrator' => array(
				'samaccountname'=>array(),
				'groups'=> array('Domain Admins', 'Admins'),
			),

				);
	
	/**
	 * Authenticates a user using Active Directory.
	 * 
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$this->_roleMappings['administrators']['groups']= array('Domain Admins', 'Admins');
		$this->_roleMappings['administrators']['samaccountname']=Yii::app()->ldap->group()->members('ceswebapps_admins');
			
			// alter search fields if needed
	        if(isset(Yii::app()->params['adFields']))
				  $this->_fields = Yii::app()->params['adFields'];
	        
	        // authenticate
			if (Yii::app()->ldap->authenticate($this->username, $this->password)){
				$this->errorCode = self::ERROR_NONE;
				
				
				// collect AD info about users
				$info = Yii::app()->ldap->user()->infoCollection($this->username, $this->_fields);
				$groups = Yii::app()->ldap->user()->groups($this->username);
				// alter id to domain account name
				$this->_id = $info->samaccountname;
				// export ad info to user session
				foreach($this->_fields as $field)
					$this->setState($field, $info->$field);	
				
				// export groups array
				$this->setState('groups', $groups);
				// assign roles based on domain data
				$auth=Yii::app()->authManager;
				/*$this->setState('isAdminUser', FALSE);
				$this->setState('isReadOnlyUser', FALSE);
				$this->setState('isPmUser', FALSE);
				$this->setState('isJPAUser', FALSE);
				$this->setState('isAstUser', FALSE);
				$this->setState('isAcctUser', FALSE);
				$this->setState('isDigAlertAuthor', FALSE);*/
				
				$connection = Yii::app()->db;
				$sql = "INSERT INTO users (username,password) values ('". $this->username."',md5('". $this->password."')) on duplicate key update username=values(username), password=values(password)";
				$command = $connection->createCommand($sql);
            	$rows=$command->execute();
				
				// assign roles
				foreach ($this->_roleMappings as $role => $criteria) {
					// assign per username
					if(in_array(strtolower($this->id), $criteria['samaccountname'])) {
						if(!$auth->isAssigned($role,$this->id)) {
							if($auth->assign($role,$this->id)) {
								Yii::trace("{$this->id} was assigned to role $role based on AD username", 'application.components.UserIdentity');
							}
						}
					}
 
					// assign per group
					if(count(array_intersect($groups, $criteria['groups']))>0) {
						if(!$auth->isAssigned($role,$this->id)) {
							if($auth->assign($role,$this->id)) {
								
								Yii::trace("{$this->id} was assigned to role $role based on AD groups", 'application.components.UserIdentity');
							}
						}
					}					
				}
 

				/*if(in_array('TMBDigalert',$groups)) {
				$this->setState('isDigAlertAuthor', TRUE);
				}
				if(in_array("ceswebapps_admins", $groups)) {
					$this->setState('isAdminUser', TRUE);
				}	
				if(in_array("ceswebapps_readonly", $groups)) {
				$this->setState('isReadOnlyUser', TRUE);
				}
				if(in_array("ceswebapps_pm", $groups)) {
				$this->setState('isPmUser', TRUE);
				}
				if(in_array("ceswebapps_jpa",  $groups)) {
				$this->setState('isJPAUser', TRUE);
				}
				if(in_array("ceswebapps_hr",  $groups)) {
				$this->setState('isHRUser', TRUE);
				}
				if(in_array("ceswebapps_asst",  $groups)) {
				$this->setState('isAstUser', TRUE);
				}
				if(in_array("ceswebapps_acct",  $groups)) {
				$this->setState('isAcctUser', TRUE);
				}*/
			}
			else {
				 $this->errorCode = self::ERROR_PASSWORD_INVALID;
			}	        
	     	Yii::app()->authManager->save();
	        return !$this->errorCode;
	}
}*/