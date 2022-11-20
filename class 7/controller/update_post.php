<?php
session_start();

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $detail = $_POST['detail'];
    $author = $_POST['author'];
        //errors
        $errors = [];
    if(empty($title)){
        $errors ['title'] = "please enter your title";
    }
    if(empty($detail)){
        $errors ['detail'] = "please enter your detail";
    }
    if(empty($author)){
        $errors ['author'] = "please enter your author name";
    }

        if(count($errors) == 0 ){    
        // update process
            include '../database/env.php';
            $query = " UPDATE posts SET 
            title ='$title',
            detail ='$detail', 
            author ='$author'
            WHERE id = '$id'";
            $update = mysqli_query($conn, $query);
            $_SESSION['Success'] = " Your Post Updated Successfully 😃.";
            header("location: ../all_post.php");
        }else{
            $_SESSION['errors'] = $errors;
            header("location: ../edit_post.php?id=$id");
        }      

}

?>

<?php
