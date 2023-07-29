<?php 

include "../helper/header_ct.php";
include "../helper/meal_api.php";

$ingredients = file_get_contents($url_ingredients);
$ingredients = json_decode($ingredients,true);
unset($_SESSION['last_search']);
$name = "";
$desc = "";
$data = $ingredients['meals'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>
    <div class="container-lg">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mt-2 shadow-lg bg-dark " data-bs-theme="dark" >
                    <div class="card-body p-1">
                        <h5 class="card-title text-center" ><i class="fa-solid fa-circle-info"></i> About This Website</h5>
                        <hr>
                        <div class="card-text p-2">
                            <p>
                                This is WEB is build by <code>PHP</code>, <code>HTML</code>, <code>CSS</code>, <code>Javascript</code> and i get the data from <code>API</code> <a href="https://www.themealdb.com" target="_blank" >The MealDB</a>.
                                I also using <a href="https://getbootstrap.com/" target="_blank">Bootstrap 5</a> to make the view is good.
                                This is my first web that using <code>API</code>. I'm very excited to try another <code>API</code> and another framework like <code>Laravel</code> and <code>ReactJs</code>.
                                I will share in my social media when i have make web using <code>Laravel</code> or using <code>ReactJs</code> because i think both framework is very useful.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mt-2 mb-2 bg-dark shadow-lg" data-bs-theme="dark">
                    <div class="card-body">
                        <h5 class="text-center card-title" ><i class="fa-solid fa-chart-simple"></i> Top Ingredients</h5>
                        <hr>
                        <div id="carouselExampleIndicators" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://www.themealdb.com/images/ingredients/<?= $data[0]['strIngredient'];?>.png" class="d-block w-100" alt="...">
                                    <hr>
                                    <div class="text-white text-center">
                                        <h5><?= $data[0]['strIngredient'];?></h5>
                                        <hr>
                                        <p><?= strstr($data[0]['strDescription'],".",true);?>.</p>
                                    </div>
                                </div>
                                <?php for ($i=1; $i < 15; $i++) {
                                    $name = $data[$i]['strIngredient']; 
                                    $desc = strstr($data[$i]['strDescription'],".",true); ?>
                                    <div class="carousel-item">
                                        
                                        <img src="https://www.themealdb.com/images/ingredients/<?= $data[$i]['strIngredient'];?>.png" class="d-block w-100" alt="...">
                                        <hr>
                                        <div class="text-white text-center">
                                            <h5><?= $data[$i]['strIngredient'];?></h5>
                                            <hr>
                                            <p><?= strstr($data[$i]['strDescription'],".",true);?>.</p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mt-2 mb-2 shadow-lg bg-dark" data-bs-theme="dark">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-address-card"></i> About Me</h5>
                        <hr>
                        <div class="card-text">
                            <p>My name is Dhihya Rayyanda and i am 19 years old. I am student at Darma Persada University.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "../helper/footer.php"; ?>
</body>
</html>