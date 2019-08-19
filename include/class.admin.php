<?php
/************************************************************************
 * This page controll all the functions which used on the admin.php     *
 * or edit/delete users and categories table                            *
 ************************************************************************/
class Admin{

// database connection in a construct function
    public $db;

    public function __construct(){
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if(mysqli_connect_errno()) {
            echo "Error: Could not connect to database.";
                exit;
        }
    }

////////////////////////////  event table ////////////////////////////////////////////
    public function create_event(
        $fk_cat_id, 
        $event_name, 
        $event_type, 
        $event_desc, 
        $event_date, 
        $event_location){

           $sql="INSERT INTO events (
            fk_cat_id, 
            event_name, 
            event_type, 
            event_desc, 
            event_date, 
            event_location)
            VALUES(
            $fk_cat_id,
            '$event_name',
            '$event_type',
            '$event_desc',
            '$event_date',
            '$event_location')";

            $result = mysqli_query($this->db,$sql);
                return $result;

    }

//////////////////////////////////////// category table ////////////////////////////////////////
    //create category
    public function create_category($cat_type){

        $sql2="INSERT INTO categories (
        cat_type)
        VALUES
        ('$cat_type')";

        $result = mysqli_query($this->db,$sql2);
            return $result;

    }

/////////////////////////////// user table /////////////////////////////////////////////
    //add new admin on admin.php file--------------------------------------------------------------------
    public function create_admin($first_name, $last_name, $username, $dob, $password, $email){

        $password = md5($password);
        $sql="SELECT * FROM users 
        WHERE username='$username' 
        OR email='$email'";

    //check if the username or email is available in database
        $check =  $this->db->query($sql) ;
        $count_row = $check->num_rows;

    //if the username is not in the databes then insert into the table
        if ($count_row == 0){
            $sql5="INSERT INTO `users`(
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
                 1,
                'Active')";
            $result = mysqli_query($this->db,$sql5);
            return $result;
        }
        else { return false;}
    }


}//class Admin close