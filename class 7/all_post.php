<?php
session_start();
$query = "SELECT * FROM posts";
include './database/env.php';
$data =  mysqli_query ($conn,$query); 
$posts = mysqli_fetch_all($data,1);
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

<nav class="navbar navbar-expand-lg style=" style="background-color: #0dcaf0;">
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
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./all_post.php">All Post</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Success MESS IN UPDATA PAGE -->
<?php
if(isset($_SESSION['Success'])){
  ?>
  <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" style = "position :absolute; bottom:20px; right:20px; border-color: #0d6efd  ">
  <div class="toast-header">
    <strong class="me-auto text-success">POST SYSTM</strong>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body text-primary">
      <?=$_SESSION['Success']?>
  </div>
</div>
<?php
};
?>


<div class="container mt-5">
    <h2>All Post</h2>

    <table class=" table table-responsive table-success table-striped">
        <tr>
            <th>#</th>
            <th>Post Title</th>
            <th>Post Detail</th>
            <th>Author</th>
            <th>Action</th>
        </tr>

        <?php
        foreach ($posts as $key => $post)
{
          ?>
          <tr>
          <td><?= ++$key ?></td>
          <td><?= $post['title']?></td>
          <td><?= strlen($post['detail']) > 50 ? substr ( $post['detail'],0,50) .' ...' : $post['detail']?></td>
          <td><?= $post['author']?></td>

          <td>
              <div class="btn-group">
                  <a href="./show_post.php?id=<?= $post['id']?> "class =" btn btn-sm btn-primary ">Show</a>
                  <a href="./edit_post.php?id=<?= $post['id']?> "class =" btn btn-sm btn-success ">Edit</a>
                  <a href="./controller/post_Delete.php?id=<?= $post['id']?>" class =" btn btn-sm btn-danger ">Delete</a>

              </div>
          </td>
      </tr>
      <?php
        }
        ?>


    </table>
    <div class="mx-auto " style="width: 200px; text-align: center;padding-top:15px" > <a href="./index.php"class =" mx-auto btn btn-lg btn-warning ">Back</a></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
<html>
  <?php
session_unset();