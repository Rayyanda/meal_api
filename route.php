<?php

if(isset($_GET['cc'])){
    header("Location:categories/list_of_category.php?category=".$_GET['cc']);
}
if(isset($_GET['o'])){
    if($_GET['o'] == "lc" ){
        header('Location:categories/');
    }
}
if(isset($_GET['area'])){
    header("Location:areas/?area=".$_GET['area']);
}
