<?php  

class UserModel extends Model 
{

	public function getUserByLogin($username)
	{
        $sql = "SELECT * FROM user WHERE username = :username";
        $results = $this->ExecuteQuery($sql, [':username' => $username]);
        
        if($results){
          $user = $results[0];
          return new User($user['username'],$user['password'],$user['email'], 0, $user['dtupdate'], $user['tempPassword'], $user['id']);
        }else{
          return $results;
        }
   }   

   public function updatePassword($pass, $id) 
   {
   		$dateUpdate = new DateTime();
   		$dateUpdate = $dateUpdate->format('Y-m-d');
   		

   		$pass = md5($pass);

   		$sql = "UPDATE user SET password = :password, dtupdate = :dtupdate WHERE id = :id";

   		if($this->ExecuteCommand($sql,[':password'=>$pass, ':dtupdate'=>$dateUpdate,':id'=>$id])){
   			return true;
   		} else {
   			return false;
   		}
   }

   public function updateTempPassword($pass, $id) 
   {
   		$dateUpdate = new DateTime();
   		$dateUpdate = $dateUpdate->format('Y-m-d');
   		
   		$tempPass= $pass;
   	
   		$pass = md5($pass);

   		$sql = "UPDATE `user` SET `password`=:password, dtupdate=:dtupdate, tempPassword=:tempPassword WHERE id = :id";
   	
   		
   		if($this->ExecuteCommand($sql,[':password'=>$pass, ':dtupdate'=>$dateUpdate, ':tempPassword'=>$tempPass, ':id'=>$id])){
   			return true;
   		} else {
   			return false;
   		}
   }

}