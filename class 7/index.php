<?php
session_start();
include './database/env.php';


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

<nav class="navbar navbar-expand-lg"  style="background-color:#6f42c1;">
  <div class="container"> 
    <a class="navbar-brand text-light" href="./index.php"  >POST SYSTEM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav m-auto">
        <li class="nav-item">
          <a class="nav-link active text-light " aria-current="page" href="#">Add Post</a>
        </li>
      <?php
      
      $query="select * from posts";
      $data_post = mysqli_query($conn,$query);
      if(mysqli_num_rows($data_post)>0){
        ?>
        <li class="nav-item">
        <a class="nav-link active text-light" aria-current="page" href="./all_post.php">All Post</a>
       </li>
       <?php
      }
      ?>
      </ul>
    </div>
  </div>
</nav>

<?php
if(isset($_SESSION['Success'])){
  ?>
  <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" style = "position :absolute; bottom:20px; right:20px; border-color: #0d6efd  ">
  <div class="toast-header">
    <strong class="me-auto text-success"> <a href="./home_page.php"> POST SYSTM </a> </strong>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body text-primary">
  Your Post Add Successfully 😍.
  </div>
</div>
<?php
};
?>



<div class="container ">
        <div class="col-6 mx-auto mt-5 ">
    <div class="card">
        <div class="card_header  text-center " style="color:#fd7e14;">
            <strong class ="fs-4">Add Post</strong>
        </div>
        <div class="card_body">
         <form class="form-control" action="./controller/post_store.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Post Tital</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="<?= isset($_SESSOIN['old_data']['title'])?$_SESSION['old_data']['title']  : '' ?>">
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
               <textarea name="detail" class="form-control"><?= isset($_SESSOIN['old_data']['detail'])?$_SESSION['old_data']['detail']  : '' ?></textarea>
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
                <input type="text" name="author" class="form-control" id="author" value="<?= isset($_SESSOIN['old_data']['author'])?$_SESSION['old_data']['author']  : '' ?>">


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


            </div>
            <button type="submit" name="submit" value="submited" class="btn btn-primary w-100">Submit</button>
         </form>   
        </div>
    </div>
    </div>
</div>






<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

<?php

session_unset();

?>