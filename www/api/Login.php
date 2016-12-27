<?php

  require_once('dependencies.php');

  class Login implements DataInterface
  {

    private $email;
    private $password;

    private $DB_password;

    private $statement;
	  private $result;

    private $clientLogin;

    private $response;

    public function __construct($email , $password)
    {

      $this->email = $email;
      $this->password = $password;

      // json response array
	    $this->response = array("error" => FALSE);

    }

    public function PlugginAPI($MySQLConnection)
	{

      $this->clientLogin = $MySQLConnection;

    #########################################
	  ########## Prepare Statement  ###########
	  #########################################

      $this->statement = $this->clientLogin->Prepare("CALL Login(?)");

    #########################################
	  ########### Bind Parameters  ############
	  #########################################

      $this->statement->bind_param("s",$this->email);

    #########################################
	  ########## execute Statement  ###########
	  #########################################

      if($this->statement->execute())
	  {  
				
		 $this->result = $this->statement->get_result()->fetch_assoc();

		 #########################################
		 ########### Close Statement  ############
		 #########################################

		 $this->statement->close();

     #########################################
		 ########## Verify user password #########
		 #########################################

       	 $this->DB_password = $this->result['user_password'];
       	 
       	 if($this->DB_password == $this->password)
      	 {
		        
    		        // user is found...
    				$this->response["error"] = FALSE;
    				$this->response["uid"] = $this->result["user_ID"];
    				$this->response["user"]["name"] =$this->result["username"];
    				$this->response["user"]["email"] = $this->result["user_email"];

    				echo json_encode($this->response);
     	 }

	     else 
	     {
  			    # code...    
  			    $this->response["error"] = TRUE;
  			    $this->response["error_msg"] = "Login credentials are wrong";

  			  	echo json_encode($this->response);
	        
	     }

      }

      else 
      {
        # code...
        echo "Failed to execute";
      }

    }
  }

 ?>
