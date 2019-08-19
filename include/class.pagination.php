<?php
/************************************************************************
 * This page contains Pagination class.                                 *
 * This group of code can be used within any page, to paginate the      *   
 * page content. Just include the file, and the class.                  *
 ************************************************************************/

class Pagination{

//count the number of all values
    function Paginate($values,$per_page){
    $total_values = count($values);
//get the current page
    if(isset($_GET['page'])){
    $current_page = $_GET['page'];
    }else{
//pages start with number 1
    $current_page = 1;
    }
//define the number of the content on each page
    $counts = ceil($total_values / $per_page);
    $param1 = ($current_page - 1) * $per_page;
    $this->data = array_slice($values,$param1,$per_page);

//number of pages are ascending
    for($x=1; $x<= $counts; $x++){
    $numbers[] = $x;
    }
    return $numbers;
    }
//fetch the datas that will be displayed
    function fetchResult(){
    $resultsValues = $this->data;
    return $resultsValues;
    }

}//class Pagination close tag
?>