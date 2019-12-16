<?php
include("../DB.php");
class UserLog
{
public $id;
public $userEmail;
public $userIP;
public $loginTime;
public $logout;
public $status;

static function getAllUserLogs()
{

    $db = DB::getInstance();


  $userlogs = array();


  $query=$db->selectFromTable("userlog");


  while($row=mysqli_fetch_array($query))
  {
$userlog = new UserLog();
    $userlog->id = $row['id'];
        $userlog->userEmail = $row['userEmail'];
            $userlog->userIP = $row['userip'];
                $userlog->loginTime = $row['loginTime'];
                    $userlog->logout = $row['logout'];
                        $userlog->status = $row['status'];
array_push($userlogs,$userlog);
}
return $userlogs;
}
}
?>
