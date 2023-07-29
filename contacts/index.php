<?php 

include "../helper/header_ct.php";
include "../helper/meal_api.php";
include "config.php";
include "../helper/helper.php";
date_default_timezone_set('Asia/Jakarta');
$time_now = date('H:i:s');
unset($_SESSION['last_search']);
$query = "SELECT * FROM meal_comment";
$result = mysqli_query($conn,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Tempatkan script JavaScript untuk menampilkan toast di sini -->
    <script>
    // Cek apakah pesan error tersedia di session
    <?php if (isset($_SESSION['err_log'])) { ?>
        // Mengambil pesan error dari session
        var errorMessage = "<?php echo $_SESSION['err_log']; ?>";

        // Menampilkan toast menggunakan JavaScript
        // Pastikan Anda sudah memiliki element dengan ID "toast" di halaman Anda
        var toastElement = document.getElementById("toast");
        var toast = new bootstrap.Toast(toastElement);
        toastElement.innerText = errorMessage;
        toast.show();
    <?php
        // Hapus pesan error dari session agar tidak ditampilkan lagi pada reload berikutnya
        unset($_SESSION['err_log']);
    }
    ?>
    </script>
</head>
<body>
    <div class="container-lg">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mt-2 mb-2 shadow">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-address-book"></i> Contacts</h5>
                        <hr>
                        <div class="card-text">
                            <p>
                                My name is Dhihya Rayyanda and i am 19 years old. I am student at Darma Persada University.
                                 You can contact me at my social media below. Thank you for visiting my website.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-2">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-regular fa-user"></i> Social Media</h5>
                        <hr>
                        <div class="card-text">
                            <div class="responsive-table">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row" ><i class="bi bi-linkedin"></i></th>
                                            <td>Dhihya Rayyanda</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><i class="bi bi-facebook"></i></th>
                                            <td>Dhihya Rayyanda</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" ><i class="bi bi-instagram"></i></th>
                                            <td>r.yanda__</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" ><i class="bi bi-tiktok"></i></th>
                                            <td>Mr.Wh1te</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mt-2 mb-2 shadow">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-comment"></i> Your Comment</h5>
                        <hr>
                        <form action="proses.php" method="post" class="form mb-2" >
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Comment</label>
                                <textarea name="comment" id="exampleInputPassword1" class="form-control" cols="30" rows="4"></textarea>
                            </div>
                            <button type="submit" value="valComment" name="addComment" class="btn btn-primary">Add</button>
                        </form>
                        <?php if(empty($_SESSION['error'])){?>
                            <p></p>
                        <?php }else{
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow p-2">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-comments"></i> Comments</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <?php 
                                    
                                    if($result->num_rows > 0){
                                    foreach ($result as $key => $value) {?>
                                        <tr>
                                            <th scope="row" ><i class="fa-solid fa-circle-user"></i> <?= $value['username']; ?></th>
                                            <td>
                                                <p class="mt-0 p-0 mb-0" ><?= $value['comment']; ?></p>
                                                <span class="fw-light fs-6" ><?= time_ago($value['date']." ".$value['time']);?></span>
                                            </td>
                                        </tr>
                                    <?php }}else{ ?>
                                        <tr>
                                            <th scope="row" >None</th>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "../helper/footer.php"; ?>
    </div>
</body>
</html>