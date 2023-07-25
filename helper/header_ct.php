<?php

session_start();
include "meal_api.php";
$categories = file_get_contents($url_list_category);
$categories = json_decode($categories,true);
$area = file_get_contents($url_list_area);
$area = json_decode($area,true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../../../cookies/crud_2022240029/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../cookies/crud_2022240029/fontawesome-free-6.4.0-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="../../../cookies/crud_2022240029/fontawesome-free-6.4.0-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../utensils-solid.svg" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <title>Meal</title>
</head>
<body>
    <div class="container-lg">
        <nav class="navbar bg-dark rounded navbar-expand-lg" data-bs-theme="dark" >
            <div class="container-fluid">
                <a class="navbar-brand" href="../">Meal</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </a>
                            <ul class="dropdown-menu">
                                <?php
                                    foreach ($categories['meals'] as $value) { ?>
                                        <li><a class="dropdown-item" href="../route.php?cc=<?= $value['strCategory']?>"><?= $value['strCategory']; ?></a></li>
                                 <?php } ?>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../route.php?o=lc">See detail of category</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown ">
                            <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                                Area
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right w-50" style="max-width: 100px;">
                                <?php foreach($area['meals'] as $value){ ?>
                                    <li><a class="dropdown-item" href="../route.php?area=<?= $value['strArea']; ?>"><?= $value['strArea']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>

                    </ul>
                    <form class="d-flex" role="search" method="post" action="../search/" >
                        <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</body>
</html>