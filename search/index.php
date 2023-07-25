<?php

include "../helper/meal_api.php";
include "../helper/header_ct.php";
if($_SERVER['REQUEST_METHOD'] == "POST" || isset($_SESSION['last_search'])){
    $search="";
    if(isset($_POST['search']) || isset($_SESSION['last_search'])){

        $search = !empty($_POST['search'])?$_POST['search']:$_SESSION['last_search'];
        $_SESSION['last_search'] = $search;
        $url_search = $url_search_api.$search;
        $result_search = file_get_contents($url_search);
        $result_search = json_decode($result_search,true);
        

?>

<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    <div class="container-lg">
        <div class="row text-center">
            <div class="col-lg-12">
                <hr>
                <h3>Result for "<?= $search ?>"</h3>
                <hr>
            </div>
        </div>
        <div class="row align-items-center">
        <?php
            $data = $result_search['meals'];
            if($result_search['meals'] != null){
            for ($i = 0; $i < count($result_search['meals']); $i++) {
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
            
                if ($i % 4 == 3 || $i == count($result_search['meals']) - 1) {
                    echo '</div>';
                }
            }
            }else{
                echo '<div class="card text-center">
                        <div class="card-header">
                            <i class="fa-solid fa-circle-info"></i> Information</div>
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Cannot found ' . $search . '</h5>
                            <p class="card-text">Please back to menu or categories to see all the category</p>
                            <a href="../" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="card-footer text-body-secondary">
                            <h5>Thank you</h5>
                        </div>
                    </div>';
            }
        }else{
                echo "<h5>Unknown Category is selected</h5>";
            }
        }else{
            echo "no post";
        }
        ?>
        </div>
    </div>
    <?php include "../helper/footer.php"; ?>
</body>
</html>