<?php

include "../helper/header_ct.php";

include "../helper/meal_api.php";

if(isset($_GET['area'])){

    $url_detail = $url_detail_area.$_GET['area'];
    $list = file_get_contents($url_detail);
    $list= json_decode($list,true);
    unset($_SESSION['last_search']);
    //echo $url_detail;
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
   
</head>
<body>
    <div class="container-lg">
    <a href="../" class="btn btn-outline-primary mb-2 mt-2"><i class="fa-solid fa-arrow-left"></i> Back</a>
    <h5>List of Meal from <?= $_GET['area'];  ?></h5>
        <?php
            $data = $list['meals'];
            for ($i = 0; $i < count($list['meals']); $i++) {
                if ($i % 4 == 0) {
                     echo '<div class="row">';
                }
                echo '
                    <div class="col-md-3">
                        <div class="card mb-4 shadow-lg">
                            <img src="' . $data[$i]['strMealThumb'] . '" alt="Gambar Produk">
                            <div class="card-body">
                                <h5 class="card-title">' . $data[$i]['strMeal'] . '</h5>
                                
                                <a href="../meals/?idMeal='.$data[$i]['idMeal'].'" class="btn btn-outline-primary" >See Details</a>
                            </div>
                        </div>
                    </div>
                ';
            
                if ($i % 4 == 3 || $i == count($list['meals']) - 1) {
                    echo '</div>';
                }
            }}
        ?>
    </div>
    <?php include "../helper/footer.php"; ?>
</body>
</html>