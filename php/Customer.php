<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require_once('init.php');
	class Customer{
        public function __construct(){
        }
        
        public function addNewCustomer(){
            global $db;
	        if(!$db->get_connection()){
                die("Connection failed!");
	        }
	        else{
                $firstName = filter_input(INPUT_POST, 'firstName'); 
                $lastName = filter_input(INPUT_POST, 'lastName'); 
                $customerId = filter_input(INPUT_POST, 'customerId'); 
                $phone = filter_input(INPUT_POST, 'phone');
                $email = filter_input(INPUT_POST, 'email');
                $sql = "INSERT INTO customers(firstName, lastName, customerId, phone, email, dateCreated) values ('".$firstName."','".$lastName."', '".$customerId."', '".$phone."','".$email."',now())";
                $result = $db->query($sql);
                global $isCustomerAddedSuccessfully;
                if($result ){
                    echo '<meta http-equiv="refresh" content="0">';
                }
            }
        }
        public function deleteCustomer(){
            global $db; 
            if(!$db->get_connection()){
                die("Connection failed!");
	        }
	        else{
	            $customerId = filter_input(INPUT_POST, 'deleteCustomerId'); 
                $sql = "delete from customers where customerId ='" .$customerId ."'";
                echo $sql;
                $result = $db->query($sql);
                echo 'result = ' .$result;
                var_dump($result);
                if($result){
                    echo '<meta http-equiv="refresh" content="0">';
                }
                else{
                    return false;
                }
            }
        }
        public function updateCustomer(){
            global $db; 
            if(!$db->get_connection()){
                die("Connection failed!");
	        }
            else{
                $firstName = filter_input(INPUT_POST, 'firstName'); 
                $lastName = filter_input(INPUT_POST, 'lastName'); 
                $customerId = filter_input(INPUT_POST, 'customerIdForUpdate'); 
                $phone = filter_input(INPUT_POST, 'phone');
                $email = filter_input(INPUT_POST, 'email');
                $sql = "UPDATE customers SET firstName = '" .$firstName ."', lastName = '" .$lastName ."', email ='" .$email ."', phone = '" .$phone ."' where customerId = '" .$customerId ."'";
                $result = $db->query($sql); 
                if($result){
                    echo '<meta http-equiv="refresh" content="0">';
                }
            }

        }
        function checkIfUserExist($customerEmail){
            global $db;
            if(!$db->get_connection()){
                die("Connection failed!");
	        }
	        else{
                $sql = "select * from customers where email ='" .$customerEmail ."'";
                $result = $db->query($sql);
                if($result->num_rows >= 1){
                    return true;
                }
                else{
                    return false;
                }
            }
        }
	}
    $customer = new Customer();  
    
?>
