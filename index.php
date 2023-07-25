<?php
include "./helper/helper.php";
include "./helper/header.php";
unset($_SESSION['last_search']);
include "helper/meal_api.php";
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$categories = file_get_contents($url_category);
$categories = json_decode($categories,true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="container-lg">
        <div class="row login text-center">
            <div class="col-lg-12  text-white ">
                <div class="first">
                    <h1 class="mb-1 display-1" >Welcome</h1>
                    <p class="mt-1 mb-1" >This web is using free <code>API</code> to show many foods</p>
                    <p class="" >You can find various foods from various regions of the world, including detailed food and tutorials on how to make it</p>
                    <p>Your Device : <?= $user_agent; ?></p>
                </div>
            </div>
        </div>
        <div class="row mt-1">
            <p class="text-center mt-1 mb-1 fs-1" >Category</p>
            <hr>
            <?php
                $data = $categories['categories'];
                for ($i = 0; $i < 4; $i++) {?>
                    <div class="col-lg-3">
                        <div class="card mb-2 shadow-lg p-2">
                            <img src="<?=$data[$i]['strCategoryThumb']?>" class="img-thumbnail" alt="Gambar Produk">
                            <div class="card-body">
                                <h5 class="card-title"><?= $data[$i]['strCategory']?></h5>
                                <div class="card-text-m mb-2">
                                    <p class="card-text"><?= $data[$i]['strCategoryDescription'] ?></p>
                                </div>
                                <a href="categories/list_of_category.php?category=<?= $data[$i]['strCategory'] ?>" class="btn btn-outline-primary" title="<?= $data[$i]['strCategoryDescription'] ?>" >See all include this category</a>
                            </div>
                        </div>
                    </div>
            <?php }?>
            <div class="row text-center">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <a href="categories/" class="btn btn-primary">See More Category <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php include "helper/footer.php"; ?>
</body>
</html>