<?php

require('database.php');

class users
{
    private $fname;
    private $lname;
    private $password;
    private $email;
    private $icon;


    public static function fetch_users(){//the goal of this function is to return the users
        // in the data base as a array and if there is not data in the data base the users=null

        global $database;
        $result_set=$database->query("select * from users");
        $users=null;
        if (isset($result_set)){
            $i=0;
            if ($result_set->num_rows>0){
                while($row=$result_set->fetch_assoc()){
                    $user=new users();
                    $user->instantation($row);
                    $users[$i]=$user;
                    $i+=1;
                }
            }
        }
        return $users;
    }

    private function has_attribute($attribute){//the function return if the attribute is found in the user object(for example id)

        $object_properties=get_object_vars($this);
        return array_key_exists($attribute,$object_properties);
    }

    private function  instantation($user_array){// the function put in the object the value of the user array
        foreach ($user_array as $attribute=>$value){
            if ($result=$this->has_attribute($attribute))
                $this->$attribute=$value;
        }
    }

    public function find_user_by_pk($email){
        global $database;
        $error=null;
        $result=$database->query("select * from users where email='".$email."'");
        if (!$result)
            $error='Can not find the user.  Error is:'.$database->get_connection()->error;
        elseif ($result->num_rows>0){
            $found_user=$result->fetch_assoc();
            $this->instantation($found_user);
        }
        else
            $error="Can no find user by this email";

        return $error;

    }

    public function find_user($email,$password){
        global $database;
        $error=null;
        $result=$database->query("SELECT * FROM user WHERE email='".$email."' AND Password='".$password."'");
        if (!$result)
            $error='Can not find the user.  Error is:'.$database->get_connection()->error;
        elseif ($result->num_rows>0){
            $found_user=$result->fetch_assoc();
            $this->instantation($found_user);
        }
        else
            $error="Can no find user by this email";
        return $error;

    }


    public static function add_user($email,$fname,$lname,$password,$icon)
    {
        global $database;
        $error = null;
        $sql = "Insert into users(email,name,password,icon) values ('". $email . "','" . $first_name . "','" . $last_name . "','" . $password . "','" . $icon  . "')";
        $result = $database->query($sql);
        if (!$result)
            $error = 'Can not add user.  Error is:' . $database->get_connection()->error;
        else {
            $error = ' add user.';

        }
        return $error;
    }

    public function get_fname(){
        return $this->fname;
    }
     public function get_lname(){
        return $this->lname;
    }
    public function get_password(){
        return $this->password;
    }
    public function get_email(){
        return $this->email;
    }


}

?>