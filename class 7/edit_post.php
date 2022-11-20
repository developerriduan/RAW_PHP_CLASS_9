<?php
session_start();
include './database/env.php';
$id = $_GET['id'];
$query = "SELECT * FROM posts WHERE id = '$id' ";
$result = mysqli_query($conn,$query);
 
$post = mysqli_fetch_assoc($result );

// print_r($post);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-expand-lg bg-success">
  <div class="container">
    <a class="navbar-brand text-light" href="./index.php" >POST SYSTEM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav m-auto">
        <li class="nav-item">
          <a class="nav-link active text-light " aria-current="page" href="./index.php">Add Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-light " aria-current="page" href="./all_post.php">All Post</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container ">
        <div class="col-6 mx-auto mt-5 ">
    <div class="card">
        <div class="card_header bg-light rounded-2 text-center ">
            <strong class ="text-info fs-5">Edit Post</strong>
        </div>
        <div class="card_body">
         <form class="form-control" action="./controller/update_post.php" method="POST">
          <input type="hidden" name = "id" value="<?=$post['id']?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Post Tital</label>
                <input value="<?= $post['title']?>" type="text" name="title" class="form-control" id="exampleInputEmail1">
                <?php
                if(isset($_SESSION['errors']['title'])){
                  ?>
                 <span class="text-danger">
                <?php
                echo $_SESSION['errors']['title'];
                ?>
              </span>
              <?php
                }
               ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Post Detail</label>
               <textarea name="detail" class="form-control"><?=$post['detail']?></textarea>
                <?php
                if(isset($_SESSION['errors']['detail'])){
                  ?>
                 <span class="text-danger">
                <?php
                echo $_SESSION['errors']['detail'];
                ?>
              </span>
              <?php
                }
               ?>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author Name</label>
                <input type="text" name="author" class="form-control" id="author" value="<?=$post['author']?>">

                               <!-- ----------------- MY NEW CODE -->
               <?php
                if(isset($_SESSION['errors']['author'])){
                  ?>
                 <span class="text-danger">
                <?php
                echo $_SESSION['errors']['author'];
                ?>
              </span>
              <?php
                }
               ?>
                 <!-----------------------------------------  -->
            </div>
            <button type="submit" name="submit" value="submited" class="btn btn-primary btn-success  w-100">Updata</button>
         </form>   
        </div>
    </div>
    <div class="mx-auto " style="width: 200px; text-align: center;padding-top:15px" > <a href="./all_post.php"class =" mx-auto btn btn-lg btn-danger ">Back</a></div>
    </div>
</div>






<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

<?php

session_unset();

?>