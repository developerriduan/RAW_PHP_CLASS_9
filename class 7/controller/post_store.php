<?php
session_start();
include '../database/env.php';

if(isset($_POST['submit'])){

$errors = [];

$requst = $_POST;
$title = $requst['title'];
$detail = $requst['detail'];
$author = $requst['author'];

// print_r($requst);
// exit();

if(empty($title)){
   $msg = " Enter You Title π ?";
   $errors ['title'] = $msg;

  }elseif (strlen($title)>20){
    $msg = "cross the limit ?";
    $errors ['title'] = $msg;
  }
  if(empty($detail)){
    $msg = "Enter You Detail π ?";
    $errors ['detail'] = $msg;
  }
  if(empty($author)){
    $msg = "Enter You Author Nameπ ?";
    $errors ['author'] = $msg;
  }

if(count($errors)>0){
    //** HEADER REDIRECTION;
    $_SESSION['errors'] = $errors;
    $_SESSION['old_data'] = $requst;


    header("location: ../index.php");
}else{
  $query = "INSERT INTO posts (title, detail, author) VALUES ('$title','$detail','$author')";


  $store = mysqli_query($conn,$query);

  if($store){
    header("location: ../index.php");
    $_SESSION['Success'] = "Your Post Added Successfuly π";
  }else{
    echo "error";
  }
}
 }else{
    echo "Click Submit Button π! ";
 }
