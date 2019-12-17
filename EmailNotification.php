<?php
include('Subject.php');
class EmailNotification implements Subject
{
  private $emailText = "Default";
  public $observers = array();
  public function addUser($observer)
  {

  array_push($this->observers,$observer);
  }
  public function removeUser($observer)
  {
  unset($observers[$observer]);
  }
  public function setEmailText($text)
  {
  $this->emailText = $text;
  }
  public function getEmailText()
  {
    return $this->emailText;
  }
  public function notifyAll()
  {
    $instance = new EmailNotification();
    $instance->setEmailText($this->getEmailText());
$instance->observers = $this->observers;
          foreach($this->observers as $observer)
      {
        $observer->update($instance);
      }
  }

}





?>
