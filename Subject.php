
<?php

interface Subject {
   public  function addUser($observer);
   public  function removeUser($observer);
   public  function notifyAll();
}

?>
