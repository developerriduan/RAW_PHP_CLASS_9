<?php
include './database/env.php';
$requst = $_GET;
$id = $requst ["id"];
$query = "SELECT * FROM posts WHERE id = '$id' ";
$data = mysqli_query($conn, $query);
$post = mysqli_fetch_assoc($data);
// print_r($post);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Post</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-expand-lg bg-warning">
  <div class="container">
    <a class="navbar-brand" href="./index.php" >POST SYSTEM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav m-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Add Post</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link active " aria-current="page" href="./all_post.php">All Post</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
    <h2>Show Post</h2>
    <div class="card">
        <div class="card-header fs-5 bg-info" style="color:#d2dae2;color:#1e272e" >
            Post Title
           <h4 style="color:#ff3f34"> <?= $post['title']?></h4>
        </div>
        <div class="card-body fs-5" >
            Post Detaile
           <h5 style="color:#0984e3"> <?= $post['detail']?> </h5>
        </div>
        <div class="card-footer fs-5" style="background:#808e9b" >
            Author Name
            <h6 style="color:#d2dae2"><?= $post['author']?></h6>
        </div>
    </div>
   <div class="mx-auto " style="width: 200px; text-align: center;padding-top:15px" > <a href="./all_post.php"class =" mx-auto btn btn-lg btn-danger ">Back</a></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
<html>