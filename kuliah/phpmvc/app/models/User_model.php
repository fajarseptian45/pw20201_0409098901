<?php
class User_model
{
  // private $username = "DONI RAMADHAN";
  // private $pass = "123456";

  public function getUser()
  {
    // return $this->username;
    // return $this->pass;
    if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
      if ($_REQUEST['username'] == 'fajar' && $_REQUEST['password'] == '123') {
        return true;
      }
    } else {
      return false;
    }
  }
}
