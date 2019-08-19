<?php
error_reporting(0);
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'findmygame');

    // initialize variables
    $group_id = 0;
    $group_name = "";
    $cat_type = "";
    $group_desc = "";
    $vacancy_desc = "";
    $vacancy_number = "";
    $update = false;

    if (isset($_POST['save'])) {
        $group_name = $_POST['group_name'];
        $cat_type = $_POST['cat_type'];
        $group_desc = $_POST['group_desc'];
        $vacancy_desc = $_POST['vacancy_desc'];
        $vacancy_number = $_POST['vacancy_number'];
        mysqli_query($db, "INSERT INTO groups (group_name, group_desc, vacancy_desc, vacancy_number, fk_cat_id)VALUES ('$group_name', '$group_desc', '$vacancy_desc', '$vacancy_number',$cat_type)"); 
        $_SESSION['msg'] = "Group saved"; 
        header('location: ../see_group.php');
    }

// Update records 

    if (isset($_POST['update'])) {
    $group_id = $_POST['group_id'];
    $group_name = $_POST['group_name'];
    $cat_type = $_POST['cat_type'];
    $group_desc = $_POST['group_desc'];
    $vacancy_desc = $_POST['vacancy_desc'];
    $vacancy_number = $_POST['vacancy_number'];

    mysqli_query($db, "UPDATE groups SET group_name='$group_name', group_desc='$group_desc', vacancy_desc='$vacancy_desc', vacancy_number='$vacancy_number' WHERE group_id=$group_id");
    $_SESSION['msg'] = "Group updated!"; 
    header('location: ../see_group.php');
}
// Delete record 

if (isset($_GET['del'])) {
    $group_id = $_GET['del'];
    mysqli_query($db, "DELETE FROM groups WHERE group_id=$group_id");
    $_SESSION['msg'] = "Group deleted!"; 
    header('location: ../see_group.php');
}

// Retrieve recods
    $results = mysqli_query($db, "SELECT groups.group_id, groups.fk_cat_id, groups.group_name, groups.group_desc, groups.vacancy_number, groups.vacancy_desc, categories.cat_type FROM groups INNER JOIN categories ON groups.fk_cat_id = categories.cat_id");
?>