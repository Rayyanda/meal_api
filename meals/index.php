<?php
include "../helper/header_ct.php";

include "../helper/meal_api.php";

if(isset($_GET['idMeal'])){
    $url_detail = $url_detail_meal.$_GET['idMeal'];
    $meal = file_get_contents($url_detail);
    $meal = json_decode($meal,true);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    <div class="container-lg ">
    <?php 
        $go_to = "";
        if(isset($_SESSION['last_search'])){
            $go_to = "../search/";
        }else{
            if(isset($_SESSION['last_cora'])){
                if($_SESSION['last_cora'] == "areas"){
                    $go_to = "../" . $_SESSION['last_cora'] ."/?area=" .$_SESSION['last_cora_v'];
                }
                if($_SESSION['last_cora'] == "categories"){
                    $go_to = "../".$_SESSION['last_cora']."/list_of_category.php?category=".$_SESSION['last_cora_v'];
                }
            }
        } 
    ?>
        <a href="<?= $go_to ?>" class="btn btn-outline-primary mt-2"><i class="fa-solid fa-arrow-left"></i> Back</a>
        <div class="row">
            <?php foreach ($meal['meals'] as $value) {?>
            <div class="col-lg-6">
                <div class="card mb-1 p-2 mt-2 shadow">
                    <div class="card-body">
                        <h4 class="mb-1" ><?= $value['strMeal']; ?></h4>
                        <hr>
                        <img class="img-thumbnail rounded img-fluid"  src="<?= $value['strMealThumb'] ?>" alt="meal">
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow mb-1 mt-2">
                    <div class="card-body">
                        <h5 class="mb-1" ><i class="fa-solid fa-circle-info"></i> Details</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table" style="width:inherit;" >
                                <tbody>
                                    <tr>
                                        <th scope="row" >Name</th>
                                        <td>:</td>
                                        <td><?= $value['strMeal'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Category</th>
                                        <td>:</td>
                                        <td><?= $value['strCategory']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Area</th>
                                        <td>:</td>
                                        <td><?= $value['strArea']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Drink Alternate</th>
                                        <td>:</td>
                                        <td><?= $value['strDrinkAlternate']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tags</th>
                                        <td>:</td>
                                        <td> <?= $value['strTags']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Source</th>
                                        <td>:</td>
                                        <td><a target="_blank" href="<?= $value['strSource']; ?>"><?= $value['strSource']; ?></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow p-2">
                    <div class="card-body">
                        <h5 class="mb-1" >Tutorials <i class="fa fa-book" aria-hidden="true"></i></h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <!-- <th scope="row" >Video</th>
                                        <td>:</td> -->
                                        <td>
                                            <?php if($value['strYoutube'] != "" || $value['strYoutube'] != null ){ 
                                                $url_video = $value['strYoutube']; 
                                                try {
                                                    $oembed_url = "https://www.youtube.com/oembed?url=".urlencode($url_video);
                                                    if($response = file_get_contents($oembed_url."&format=json&maxwidth=422&maxheight=237")){
                                                        
                                                        $json_data = json_decode($response,true);
                                                        $embed_code = $json_data['html'];
                                                        if($embed_code != null){
                                                            echo $embed_code;
                                                        }else{
                                                            echo "This file is not exist";
                                                        }
                                                    }else{
                                                        echo "This Video is not available";
                                                    }
                                                } catch (Throwable $th) {
                                                    echo "This Video is not available. Something error ";
                                                }
                                                ?>
                                            <?php }else{ ?>
                                                Unkown Video Source
                                            <?php }?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Ingredients :</h5>
                                            <?php for ($i=1; $i <= 20; $i++) { 
                                                if($value["strIngredient".$i] == ""){
                                                    break;
                                                }
                                                echo '<img width="50px" src="https://www.themealdb.com/images/ingredients/'. $value["strIngredient".$i] . '.png" alt=""> '. $value["strIngredient".$i] . " (". $value["strMeasure".$i]."), ";
                                            }?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Instructions :</h5>
                                            <div class="instruct">
                                                <?= $value['strInstructions']; ?>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }  ?>
    </div>
    <?php include "../helper/footer.php"; ?>
</body>
</html>