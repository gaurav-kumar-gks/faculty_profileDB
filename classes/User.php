<?php

class User
{
  private $_db; // stores db instance associated with User
  private $_sessionName; // stores unique session name
  private $_isLoggedIn; // checks login state
  private $_data; // user's data (e.g. name, email, dept)

  
  
  
  // GET DB INSTANCE AND SESSION NAME
  public function __construct($user = null)
  {
    $this->_db = DB::getInstance();
    $this->_sessionName = Config::get('session/session_name');

    if (!$user) {
      if (Session::exists($this->_sessionName)) {
        $user = Session::get($this->_sessionName);

        if ($this->find($user)) {
          $this->_isLoggedIn = true;
        } else {
          // echo 'User not exist';
        }
      }
    } else {
      $this->find($user);
    }
  }

  
  
  // may change in future after login verification api
  // FIND USER WITH ENTERED MAIL
  public function find($mail = null)
  {
    if ($mail) {
      // find user with given email in studentinfo
      $data = $this->_db->get('studentinfo', 'email', '=', $mail);
      // if we found the user
      if ($data->count()) {
        
        // check the user's credentials
        $this->_data = $data->first();
        return true;
      }
    }
    
    // if we didn't find the user
    return false;
  }

  
  
  // LOGIN 
  // for testing purpose user is logged in if email is correct
  public function login($mail = null, $password = null)
  {

    $user = $this->find($mail);  
    //print_r($this->_data);
    if ($user) {
      
      if ($this->data()->email === $mail) {
        Session::put($this->_sessionName, $this->data()->email);
        // ECHO 'OK';
        return true;
      }
    } 
    
    return false;
  }

  
  
  // LOGOUT 
  public function logout()
  {
    Session::delete($this->_sessionName);
  }

  
  
  // FETCH LOGGED IN USER'S DATA
  public function data()
  {
    return $this->_data;
  }

  
  
  // CHECK USER'S LOG IN STATE
  public function isLoggedIn()
  {
    return $this->_isLoggedIn;
  }



  // User registration removed
  // // REGISTER - inserts into login table
  // public function create($table, $fields = array())
  // {
  //   if (!$this->_db->insert($table, $fields)) {
  //     throw new Exception('There was a problem inserting the data into table '.$table);
  //   }
  // }
}
