<?php

  require_once('dependencies.php');

  class Delete implements DataInterface
  {
    
    public $statement;
  
    public $dbConnection;
    public $MySQLConn;

    public $result;

    public $email;

    public $clientDelete;


    public function __construct($email)
    {

      $this->email = $email;
      
    }

    public function PlugginAPI($MySQLConnection)
    {

      $this->clientDelete = $MySQLConnection;

      #########################################
      ########## Prepare Statement  ###########
      #########################################

      $this->statement = $this->clientDelete->Prepare("CALL DeleteUser(?)");

      #########################################
      ########### Bind Parameters  ############
      #########################################

      $this->statement->bind_param("s",  $this->email);

      #########################################
      ########## execute Statement  ###########
      #########################################

      $this->statement->execute();

      #########################################
      ########### Close Statement  ############
      #########################################

      $this->statement->close();


    }

  }

?>