<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require ('init.php');
    class Session{
        private $isSignIn;
        private $userName;
        public function __construct() {
            $this->checkLogin();
        }
        public function checkLogin(){
            if(isset($_SESSION['userName'])){
                return TRUE;
            }
            else{
                return FALSE;
            }
            
        }
        public function login($userName, $signIn){
            $_SESSION['userName'] = $userName; 
            $_SESSION['isSignIn'] = $signIn;
            $this->userName = $userName;
            $this->isSignIn = $signIn;

        }
        public function logout(){
            unset($_SESSION['userName']);
            unset( $_SESSION['isSignIn']);
            unset($this->userId);
            unset($this->isSignIn);
            session_destroy();
        }
        public function getSignIn(){
            return $this->isSignIn;
        }
        public function setSignIn(){
            $this->isSignIn = TRUE;
        }
        public function getUserName(){
            return $this->userName;
        }
    }
    $session = new Session();
?>

