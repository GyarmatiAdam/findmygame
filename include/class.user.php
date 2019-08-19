<?php
require_once "db_config.php";

class User{

//////////////////////// database connection in a construct function////////////////////////////////////////////////////////
    public $db;

    public function __construct(){
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if(mysqli_connect_errno()) {
            echo "Error: Could not connect to database.";
                exit;
        }
    }

///////////////// function for registration process /////////////////////////////////////////////////////////////////////
    public function reg_user($first_name, $last_name, $username, $dob, $password, $email){

        $password = md5($password);
        $sql="SELECT * FROM users 
        WHERE username='$username' 
        OR email='$email'";

//check if the username or email is available in database
        $check =  $this->db->query($sql) ;
        $count_row = $check->num_rows;

//if the username is not in the databes then insert to the table
        if ($count_row == 0){
            $sql1="INSERT INTO `users`(
                 `first_name`, 
                 `last_name`, 
                 `username`, 
                 `email`, 
                 `dob`, 
                 `pass`, 
                 `user_role`,
                 `user_status`) 
                 VALUES (
                 '$first_name',
                 '$last_name',
                 '$username',
                 '$email',
                 '$dob',
                 '$password',
                  3,
                  'Active')";
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot be inserted");
            return $result;
        }
        else { return false;}
    }

/////////////////to check email, username and role in login process /////////////////////////////////////////////////////
    public function check_login($email, $password){

        $password = md5($password);
        $sql2="SELECT user_id, user_role, user_status from users
        WHERE email='$email' 
        and pass='$password'
        ";

//checking if the email available in the table
        $result = mysqli_query($this->db, $sql2);
        $user_data = $result->fetch_assoc();
        $count_row = $result->num_rows;

// this login variable used for the sessions
//admin
        if ($user_data["user_role"] == 1 && $user_data["user_status"] == "Active") {
            $_SESSION['login'] = true;
            $_SESSION['admin'] = $user_data['user_id'];
            header("Location: admin.php");
            return true;
        }
//group user
        elseif ($user_data["user_role"] == 2 && $user_data["user_status"] == "Active"){
            $_SESSION['login'] = true;
            $_SESSION['group_user'] = $user_data['user_id'];
            header("Location: main_HomePage.php");
            return true;
        }
//user
        elseif ($user_data["user_role"] == 3 && $user_data["user_status"] == "Active"){
            $_SESSION['login'] = true;
            $_SESSION['user'] = $user_data['user_id'];
            header("Location: main_HomePage.php");
            return true;
        }

        else{
            return false;
        }
    }

///////////////////// just call this function to show the username on any page ////////////////////////////////////
    public function get_username($user_Name){
        $sqluname="SELECT username FROM users WHERE user_id = $user_Name";
        $result = mysqli_query($this->db,$sqluname);
        $user_data = mysqli_fetch_array($result);
        echo $user_data['username'];
    }
    public function get_userID($userID){
        $sqluname="SELECT user_id FROM users WHERE user_id = $userID";
        $result = mysqli_query($this->db,$sqluname);
        $user_data = mysqli_fetch_array($result);
        echo $user_data['user_id'];
    }

//starting the session
    public function get_session(){
        return $_SESSION['login'];
    }

//destroying the session
    public function user_logout() {
        unset($_SESSION['user']);
        unset($_SESSION['admin']);
        unset($_SESSION['group_user']);
        session_unset();
        session_destroy();
        header("Location: main_HomePage.php");
    }

    public function user_logout2() {
        unset($_SESSION['user']);
        unset($_SESSION['admin']);
        unset($_SESSION['group_user']);
        session_unset();
        session_destroy();
        header("Location: ../main_HomePage.php");
    }

    public function user_logout3() {
        unset($_SESSION['user']);
        unset($_SESSION['admin']);
        unset($_SESSION['group_user']);
        session_unset();
        session_destroy();
        header("Location: ../../main_HomePage.php");
    }

}//class User close