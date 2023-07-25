<?php
include "../helper/header_ct.php";

include "../helper/meal_api.php";

$categories = file_get_contents($url_category);
$categories = json_decode($categories,true);
unset($_SESSION['last_search']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        function modal_details(name, strThumb, detail) {
            $('#modalHeader').html(`<h5 class="modal-title">${name}</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>`);
            $('#modalBody').html(`<img src="${strThumb}" alt="Gambar Produk"><h5 class="mb-1">${name}</h5><p>${detail}</p>`);
            $('#modalFooter').html(`<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button><a class="btn btn-outline-primary" href="#" >See all</a>`)
        }
    </script>
</head>
<body>
    <div class="container-lg">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" id="modalHeader" >
                    </div>
                    <div class="modal-body" id="modalBody">

                    </div>
                    <div class="modal-footer" id="modalFooter" >

                    </div>
                </div>
            </div>
        </div>
        <h5>List of Categories</h5>
        <?php
            $data = $categories['categories'];
            for ($i = 0; $i < count($categories['categories']); $i++) {
                if ($i % 4 == 0) {
                     echo '<div class="row">';
                }?>
                
                    <div class="col-md-3">
                        <div class="card mb-3 shadow-lg p-2">
                            <img src="<?=$data[$i]['strCategoryThumb']?>" class="img-thumbnail" alt="Gambar Produk">
                            <div class="card-body">
                                <h5 class="card-title"><?= $data[$i]['strCategory']?></h5>
                                <div class="card-text-m mb-2">
                                    <p class="card-text"><?= $data[$i]['strCategoryDescription'] ?></p>
                                </div>
                                <a href="list_of_category.php?category=<?= $data[$i]['strCategory'] ?>" class="btn btn-outline-primary" title="<?= $data[$i]['strCategoryDescription'] ?>" ><i class="fa-solid fa-list"></i> See the list in this category</a>
                            </div>
                        </div>
                    </div>
                
                <?php
                if ($i % 4 == 3 || $i == count($categories['categories']) - 1) {
                    echo '</div>';
                }
            }
        ?>
    </div>
    <?php include "../helper/footer.php"; ?>
</body>
</html>