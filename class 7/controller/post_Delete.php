<?php
session_start();
include_once'../database/env.php';
$id = $_GET['id'];
$query =" DELETE FROM posts WHERE id = '$id' ";
$delete_record = mysqli_query($conn,$query);

if($delete_record){
    
    $_SESSION['Success'] = 'Delete Your Post 😢';
    header("location:../all_post.php");
    echo "hello";
}else{
    echo " Sorry try again 😒";
};


