<?php
class DB {
private $host="localhost";
 private $username="root";
 private $password="";
 private $db_name="shopping";
 private  $database_connection;
 private static $instance;




 private function __construct() {
  $this->database_connection = $this->database_connect($this->host, $this->username,$this->password);


  // $this->database_select($this->db_name);
 }
 function get_Connecion()
 {
   return $this->database_connection;
 }
 public static function getInstance(){
     if(self::$instance==null){
         self::$instance=new DB();

     }
     else
     {



     }
     return self::$instance;
 }
  private function database_connect($database_host, $database_username, $database_password) {
     //if ($connection = mysqli_connect($database_host, $database_username, $database_password)) {
   if ($connection = mysqli_connect("localhost", "root", "")){
        mysqli_select_db( $connection,"shopping");

         return $connection;

     } else {
             die("Database connection error");

     }
 }

 private function database_select($database_name) {


     return mysqli_select_db( $this->database_connection,$database_name)
         or die("No database is selecteted");

 }
 function selectFromTable($tablename)
{
  $db=DB::getInstance();
 $sql="select * from $tablename ";


 $dataSet = mysqli_query($db->get_Connecion(),$sql) or die(mysqli_error());
 return $dataSet;
}

}

?>
