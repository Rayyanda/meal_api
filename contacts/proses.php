<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
$time_now = date('H:i:s');
include "config.php";
$today = date('y-m-d');
if(isset($_POST['addComment'])){
    if($_POST['addComment'] == "valComment"){
        
        $username = trim($_POST['username']);
        $comment = $_POST['comment'];
        if(empty($username) == false && empty($comment) ==false){
            $query = "INSERT INTO meal_comment(id, username, comment, date,time) VALUES (null, '$username', '$comment', '$today','$time_now')";
            try {
                if($result = mysqli_query($conn,$query)){
                    header("Location:./");
                }else{
                    $_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
               <strong><i class="bi bi-exclamation-triangle-fill"></i> Failed !</strong> Something went wrong when we want to insert your comment. please insert again correctly.
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>';
                header('Location:./');
                }
            } catch (Exception $th) {
               $_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
               <strong><i class="bi bi-exclamation-triangle-fill"></i> Failed !</strong> Something went wrong when we want to insert your comment. please insert again correctly.
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>';
                header('Location:./');
            }
        }else{
            $_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
            <strong><i class="bi bi-exclamation-triangle-fill"></i> Failed !</strong> Maybe some of rows are empty. Please insert correctly.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            header('Location:./');
        }
    }
}