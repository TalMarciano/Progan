<?php
    session_start();
    require_once('init.php');
	class User{
            private $userName;
            private $isSignIn;
            public function getUserId(){
                return $this->userName;
            }
            public function getIsSignIn(){
                return $this->isSignIn;
            }
            public function __construct(){
            }
            private function setNewUser($userName, $signedIn){
                $this->userId = $userName;
                $this->isSignIn = $signedIn;
            }
            public function getProductPerCity($city){
                global $db; 
                global $session;
                if(!$db->get_connection()){ //NO CONNECTION TO DB
                    echo "connection db failed";
                    die("Connection Failed");
                }
                else{
                    $userName = $_SESSION['userName'];
                    $sql = "select p.productname as ProductName, COUNT(city) as countPerProduct 
                            from users u 
                            JOIN orders o on o.shipEmail = u.email 
                            JOIN orderProducts op on op.orderId = o.orderId 
                            JOIN products p on p.productId = op.productId 
                            where u.City = '" .$city ."' group by p.productid";
                    $result = $db->query($sql);
                    $tempJson=array();
                    if($result->num_rows > 0){
                       while($row = $result->fetch_assoc()){
                           $tempJson[] = json_encode($row);
                       }
                        $json = json_encode($tempJson);
                        return $json;
                    }
                    else{
                        echo "please contact us, and let us know that your orders details didn't load :(";
                    }
                }
            }
            public function getUserPerCity(){
               global $db; 
               global $session;
                if(!$db->get_connection()){ //NO CONNECTION TO DB
                    echo "connection db failed";
                    die("Connection Failed");
                }
                else{
                    $userName = $_SESSION['userName'];
                    $sql = "select city, COUNT(city) as CountPerCity from users GROUP by city";
                    $result = $db->query($sql);
                    $tempJson=array();
                    if($result->num_rows > 0){
                       while($row = $result->fetch_assoc()){
                           $tempJson[] = json_encode($row);
                       }
                        $json = json_encode($tempJson);
                        return $json;
                    }
                    else{
                        echo "please contact us, and let us know that your orders details didn't load :(";
                    }
                }
           }
            public function getUserOrders(){
                global $db;
                global $session;
                if(!$db->get_connection()){ //NO CONNECTION TO DB
                    echo "connection db failed";
                    die("Connection Failed");
                }
                else{
                    $userName = $_SESSION['userName'];
                    $sql = "select o.orderId, o.dateCreated, o.orderStatusId, o.totalPrice, o.shipEmail, op.productId,p.productName, op.price, op.quantity, os.orderStatusName from orders o join orderProducts op on op.orderid=o.orderid join products p on p.productid = op.productid join orderStatuses os on os.orderStatusId = o.orderStatusId where o.shipEmail='" .$userName ."'";
                    $result = $db->query($sql);
                    $tempJson=array();
                    if($result->num_rows > 0){
                       while($row = $result->fetch_assoc()){
                           $tempJson[] = json_encode($row);
                       }
                        $json = json_encode($tempJson);
                        return $json;
                    }
                    else{
                        echo "please contact us, and let us know that your orders details didn't load :(";
                    }
                }
            }
            
            //////////////////////////////////////////////////////////
            public function getUserDetails(){
                global $db;
                if(!$db->get_connection()){ //NO CONNECTION TO DB
                    echo "connection db failed";
                    die("Connection Failed");
                }
                else{
                    $userName = $_SESSION['userName'];
                    $sql = "select * from users where email ='" .$userName ."';";
                    $result = $db->query($sql);
                    if($result->num_rows > 0){
                        $result = $result->fetch_assoc();
                        $json = json_encode($result);
                        return $json;
                    }
                    else{
                        echo "please contact us, and let us know that your account details didn't load :(";
                    }
                }
            }
            public function checkUser(){
                global $db;
                if(!$db->get_connection()){ //NO CONNECTION TO DB
                    echo "connection db failed";
                    die("Connection Failed");
                }
                else{
                    $userEmail = filter_input(INPUT_POST, 'username');
                    $userEmail = strtoupper($userEmail); 
                    $userEmail = trim($userEmail);
                    $userPass = filter_input(INPUT_POST, 'pass');
                    $sql = "select * from userspassword where email='".$userEmail ."'";
                    $result = $db->query($sql);
                    if($result->num_rows > 0){
                        $result = $result->fetch_assoc();
                        if($userEmail == strtoupper($result['email'])){
                            if(md5($userEmail.md5($userPass)) == md5(strtoupper($result['email']).$result['password'])){ 
                                global $isSignInSuccess;
                                //global $session;
                                $isSignInSuccess = TRUE;
                                //$this->setNewUser($userEmail, TRUE);
                               // $session->login($userEmail, TRUE);
                            }
                        }
                    }
                }
            }  
            public function addNewUser(){
                global $db;
		        if(!$db->get_connection()){
                    die("Connection failed!");
		        }
		        else{
		            global $invalidRegister;
                    $userEmail = filter_input(INPUT_POST, 'username');
                    $tempPass = filter_input(INPUT_POST, 'pass');
                    $userPass = md5($tempPass);
                    $userFirstName = filter_input(INPUT_POST, 'firstname');
                    $userLastName = filter_input(INPUT_POST, 'lastname');
                    $address = filter_input(INPUT_POST, 'address');
                    $city = filter_input(INPUT_POST, 'city');
                    $country = filter_input(INPUT_POST, 'country');
                    $phone = filter_input(INPUT_POST, 'phone');
                    if(User::checkUserName($userEmail)){
        		        echo "<script type='text/javascript'>Swal.fire('Failed to register', 'Email is invalid.', 'error')</script>";
                    }
                    else if(User::checkPassword($userPass)){
        		        echo "<script type='text/javascript'>Swal.fire('Failed to register', 'Password is invalid.', 'error')</script>";
                    }
                    else if(User::checkNameAndLastName($userFirstName, $userLastName)){
        		        echo "<script type='text/javascript'>Swal.fire('Failed to register', 'Name or Last name is invalid.', 'error')</script>";
                    }
                    else if(User::checkAddress($address,$city,$country)){
        		        echo "<script type='text/javascript'>Swal.fire('Failed to register', 'Address is invalid.', 'error')</script>";
                    }
                    else{
                        $sql = "INSERT INTO users(email, firstname, lastname, Address1, Country, City, Phone, datecreated) 
                        values('" .$userEmail ."','" .$userFirstName ."','" .$userLastName ."','" .$address ."','" .$country ."','" .$city ."','" .$phone ."',now());";
                        $result = $db->query($sql);
                        $sql2 = "INSERT INTO userspassword (email, password) VALUES ('" .$userEmail ."','" .$userPass ."');";
                        $result2 = $db->query($sql2);
                        if(!$result || !$result2){
                            global $errorAddedUser;
                            $errorAddedUser = TRUE;
                            $invalidRegister = TRUE;
                        }
                        else{
                            $invalidRegister = FALSE;
                            global $userAddedSucessfuly;
                            $userAddedSucessfuly = TRUE;
                        }
                    }
                }
            }
               private static function checkAddress($address,$city,$country){
              //  $address = preg_match('%^[0-9]%', $address); 
                $address = preg_replace('/[0-9]+/', '', $address);
                $tempAddress = $address ." " .$city ." " .$country;
                echo $tempAddress;
                $googleUrl = "https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=".urlencode($tempAddress)."&inputtype=textquery&fields=formatted_address,name,geometry&key=AIzaSyBL7m3Cap8F49c7ANLndghCoihM0iPnPP4";
                $googleResult = file_get_contents($googleUrl);
                $result = json_decode($googleResult,true);
                print_r($result);
                $status = $result['status'];
                if($status != 'OK'){
                    return true;
                }
               }
            
            private static function checkNameAndLastName($first, $last){
                if(strlen($first) < 2 || strlen($last) < 2){
                    return TRUE; 
                }
            }
            private static function checkPassword($pass){
                if(strlen($pass) < 8){
                    return TRUE; 
                }
            }
            private static function checkUserName($userEmail){
                if(!filter_var($userEmail, FILTER_VALIDATE_EMAIL)){
                    return TRUE; 
                }
            }
	}
    $user = new User();
?>