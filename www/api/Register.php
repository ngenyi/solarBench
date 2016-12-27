<?php

  require_once('dependencies.php');

  class Register implements interfaceRegister
  {
    public $statement;
  
    public $dbConnection;
    public $MySQLConn;
    public $result;
    public $user;

    public $username;
    public $email;
    public $password;

    public $clientRegister;


    public function __construct($username , $email, $password)
    {


      $this->username = $username;
      $this->email    = $email;
      $this->password = $password;

      
    }

    public function storeUser($MySQLConnection)
    {

      $this->clientRegister = $MySQLConnection;


      #########################################
      ########## Prepare Statement  ###########
      #########################################

      $this->statement = $this->clientRegister->Prepare("CALL Register(?,?,?)");

      #########################################
      ########### Bind Parameters  ############
      #########################################

      $this->statement->bind_param("sss", $this->username , $this->email , $this->password);

      #########################################
      ########## execute Statement  ###########
      #########################################

      $this->result = $this->statement->execute();

      #########################################
      ########### Close Statement  ############
      #########################################

      $this->statement->close();

      ###############################################################
      ############# return object if execute is true  ###############
      ###############################################################

      if($this->result)
      {
          $this->statement = $this->clientRegister->Prepare("CALL RetrieveUser(?)");
          $this->statement->bind_param("s", $this->email);
          $this->statement->execute();
          $this->user = $this->statement->get_result()->fetch_assoc();
          $this->statement->close();

          return $this->user;

      }
      else
      {

          return FALSE;

      }


    }

  }

?>