<?php
session_start();
include("connDatabase/connection.php");

if(isset($_POST['communityId'])){
    $communityId=$_POST['communityId'];

    $sqldeletecommunity="DELETE from community where com_id='$communityId'";
    $sqldeletecommunity_run=mysqli_query($connection,$sqldeletecommunity);
    
    if($sqldeletecommunity_run){
        echo 'success';

    }
    else{
        echo 'error';

    }
}



































?>