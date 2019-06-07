<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }
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
            public function logout(){
                session_destroy();
            }
            public function updateUserDetails(){
                global $db; 
                $userId = filter_input(INPUT_POST, 'userIdForUpdate');
                $firstName = filter_input(INPUT_POST, 'firstName');
                $lastName = filter_input(INPUT_POST, 'lastName');
                $email = filter_input(INPUT_POST, 'email');
                $isManager = filter_input(INPUT_POST, 'isManagerSelectedSend');
                $updateUserDetailsQuery = "update users SET firstName = '" .$firstName ."', lastName = '" .$lastName ."', email = '" .$email ."', isManager = " .$isManager ." where userId = " .$userId; 
                $result = $db->query($updateUserDetailsQuery); 
                if($result){
                    global $isupdated; 
                    $isupdated = true; 
                }
            }
            public function deleteUser(){
                global $db;
                $userId = $_POST['deleteUserId'];
                $userEmail = "select email from users where userId = " .$userId;
                $email = $db->query($userEmail);
                $email = $email->fetch_assoc();
                $deleteUser = "delete from users WHERE userId = " .$userId;
                $deleteFromUsers = $db->query($deleteUser);
                $deleteUserPassQuery = "DELETE FROM userspassword WHERE email ='" .$email['email'] ."'";
                $deleteUserPass = $db->query($deleteUserPassQuery);
                if($deleteFromUsers && $deleteUserPassQuery){
                    global $isDeleted;
                    $isDeleted = true;
                }
            }
            public function updateUserPasswordDashboard($email){
                global $db;
                $pass = filter_input(INPUT_POST, 'passwordInputChange');
                $sql = "Update userspassword SET password = '" .md5($pass) ."' where email ='" .$email ."'";
                $result = $db->query($sql);
                if($result){
                     echo "<script type='text/javascript'>
                    Swal.fire({
                      position: 'top-end',
                      type: 'success',
                      title: 'סיסמא שונתה בהצלחה!',
                      text: 'אתה מועבר לדאשבורד',
                      showConfirmButton: true,
                      timer: 6000
                    });
                 </script>";
                }
                else{
                    echo "<script type='text/javascript'>
                        Swal.fire({
                          position: 'center',
                          type: 'error',
                          title: 'שינוי הסיסמא נכשל';
                          text: 'אנא נסה שנית ',
                          showConfirmButton: true,
                          timer: 60000
                        });
                        </script>";
                    
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
                    $userEmail = $_POST['username'];
                    $email = $userEmail; 
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
                                $isSignInSuccess = TRUE;
                                $userDetails = "select * from users where email='".$userEmail ."'";
                                $return = $db->query($userDetails);
                                $return = $return->fetch_assoc();
                                $_SESSION['userEmail'] = $userEmail;
                                $_SESSION['isManager'] = $return['isManager'];
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
		            echo '<br> inside the else in add new user';
                    $firstName = filter_input(INPUT_POST, 'firstName');
                    $lastName = filter_input(INPUT_POST, 'lastName');
                    $userName = filter_input(INPUT_POST, 'userName');
                    $email = filter_input(INPUT_POST, 'email');
                    $isManager = filter_input(INPUT_POST, 'isManager');
                    $userIdGenerate = rand(1000, 100000);
                    $idSearch = true;
                    while($idSearch){
                        $idSearch = $db->query("select userId from users where userid = " .$userIdGenerate);
                        var_dump($idSearch);
                        if($idSearch->num_rows >= 1){
                            $userIdGenerate = rand(1000, 100000);
                        }
                        else{
                            $idSearch = false;
                        }
                    }
                    echo $idSearch;
                    $sql = "INSERT INTO users(firstName, lastName, email, isManager, datecreated,userId) 
                    values ('".$firstName."','".$lastName ."','".$email."',".$isManager.",now()," .$userIdGenerate .")";
                    echo 'insert new user query = '.$sql;
                    $userAdd = $db->query($sql);
                    echo '<br> user add = ';
                    var_dump($userAdd);
                    $passwordForSend = base_convert(uniqid('pass', true), 10, 36);
                    echo $passwordForSend;
                    $sql2 = "insert into userspassword (email, password) VALUES ('" .$email ."','" .md5($passwordForSend) ."')";
                    $usersPassword = $db->query($sql2);
                    if(!$userAdd && !$usersPassword){
                        global $errorAddedUser;
                        $errorAddedUser = TRUE;
                        $invalidRegister = TRUE;
                    }
                    else{
                        
                        $invalidRegister = FALSE;
                        global $userAddedSucessfuly;
                        $userAddedSucessfuly = TRUE;
                        /////////////////////////////
                        $proganEmail = "progangar@gmail.com";
                        $subject = "סיסמא לדאשבורד של פרוגן";
                        $text = "
                        היי,
                        " .$email ."
                        תודה על הרשמתך לדאשבורד של פרוגן.
                        אנו מאחלים לך הצלחה רבה בעבודתך החדשה.
                        סיסמא לכניסה למערכת
                        " .$passwordForSend .""
                        ."
                        לכל בעיה יש פתרון
                        הצלחה רבה ויום נפלא";
                    	$headers = 'From: progangar@gmail.com' . "\r\n" .
                                'Reply-To: progangar@gmail.com' . "\r\n" ;

                  		mail($email ,$subject , $text, $headers);
                  		//$subjectForCopy = "משתמש חדש במערכת - סיסמא הופקה בהצלחה";
                        //mail($proganEmail ,$subjectForCopy , $text, $headers);
                        ////////////////////////////
                    }
                }
            }
            public function resetUserPassword(){
                $userEmail = filter_input(INPUT_POST, 'forgotPasswordInput');
                global $db;
		        if(!$db->get_connection()){
                    die("Connection failed!");
		        }
		        else{
		            global $isresetWentGood;
		            $passwordForSend = base_convert(uniqid('pass', true), 10, 36);
		            $checkIfUserExistQuery = "select * from users where email = '" .$userEmail ."'"; 
		            $$checkIfUserExist = $db->query($checkIfUserExistQuery);
		            if($$checkIfUserExist->num_rows >=1){
    		            $sql = "UPDATE userspassword set password = '" .md5($passwordForSend) ."' where email ='" .$userEmail ."'";
    		            $result = $db->query($sql); 
    		            if($result){
    		                $isresetWentGood = true;
    		                $proganEmail = "progangar@gmail.com";
                            $subject = "סיסמא חדשה לפרוגן דאשבורד";
                            $text = "
                            היי,
                            סיסמא חדשה נוצרה למשתמש האישי שלך בפרוגן.
                            במידה ואינך ביקשת לאפס סיסמא זו, אנא דווח על כך לממונים
                            הסיסמא החדשה: 
                            " 
                            .$passwordForSend
                            ."
                            תודה והמשך יום טוב
                            פרוגן";
                            $headers = "From: " .$proganEmail;
                            mail($userEmail ,$subject , $text, $headers);
                            $subjectForCopy = "איפוס סיסמא למשתמש" .$userEmail ;
                            mail($proganEmail ,$subjectForCopy , $text, $headers);
    		            }
    		            else{
    		                $isresetWentGood = false;
    		            }
		            }
		        }
                
            }
            public function resetUserPasswordInUsers(){
                
                global $db;
		        if(!$db->get_connection()){
		            echo 'connection failed';
                    die("Connection failed!");
		        }
		        else{
		            $userId = filter_input(INPUT_POST, 'userIdForReset');
		            global $isPasswordChanges;
		            $passwordForSend = base_convert(uniqid('pass', true), 10, 36);
		            $checkIfUserExistQuery = "select * from users where userId = " .$userId ; 
		            $checkIfUserExist = $db->query($checkIfUserExistQuery);
		            if($checkIfUserExist->num_rows >=1){
		                $checkIfUserExist = $checkIfUserExist->fetch_assoc();
    		            $userEmail = $checkIfUserExist['email'];
    		            $sql = "UPDATE userspassword set password = '" .md5($passwordForSend) ."' where email ='" .$checkIfUserExist['email'] ."'";
    		            $result = $db->query($sql); 
    		            if($result){
    		                $isPasswordChanges = true;
    		                $proganEmail = "progangar@gmail.com";
                            $subject = "סיסמא חדשה לפרוגן דאשבורד";
                            $text = "
                            היי,
                            סיסמא חדשה נוצרה למשתמש האישי שלך בפרוגן.
                            במידה ואינך ביקשת לאפס סיסמא זו, אנא דווח על כך לממונים
                            הסיסמא החדשה: 
                            " 
                            .$passwordForSend
                            ."
                            תודה והמשך יום טוב
                            פרוגן";
                            $headers = "From: " .$proganEmail;
                            $isMailSent = mail($userEmail ,$subject , $text, $headers);
                            $subjectForCopy = "איפוס סיסמא למשתמש" .$userEmail ;
                            mail($proganEmail ,$subjectForCopy , $text, $headers);
    		            }
    		            else{
    		                $isPasswordChanges = false;
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
