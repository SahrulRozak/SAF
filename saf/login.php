<?php 
    session_start();
    include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Halaman Login</title>
</head>
<body>
<div class="container-fluid ps-md-0">
  <div class="row g-0">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4 "><b>Selamat Datang</b></h3>
              <p class="login-text">Silahkan login untuk mengakses dashboard admin <br><b>Semoga Harimu Menyenangkan</b></p>

              <!-- Sign In Form -->
              <form action="" method="POST">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="user" id="floatingInput" placeholder="Username" required>
                  <label for="floatingInput" class="user"> masukan Username</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password" required>
                  <label for="floatingPassword" class="pass">Masukan Password</label>
                </div>

                <div class="d-grid">
                  <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit" name="submit" value="login">Login</button>
                  <div class="text">
                    <a class="small" href="index.php">Halaman utama</a>
                  </div>
                </div>

              </form>
              
              <!-- start ofscript php -->
             <?php
                    if(isset($_POST['submit'])){

                        $user = $_POST['user'];
                        $pass = $_POST['pass'];

                        $cek =mysqli_query($conn,"SELECT * FROM pengguna WHERE username = '".$user."'");
                        if(mysqli_num_rows($cek) > 0){

                            $d = mysqli_fetch_object($cek);
                            if(md5($pass) == $d->password){
                                $_SESSION['status_login']   = true;
                                $_SESSION['uid']            = $d->id;
                                $_SESSION['uname']          = $d->namespace;
                                $_SESSION['ulevel']         = $d->level;

                                echo "<script>window.location = 'admin/index.php'</script>";

                            }else{
                                echo '<div class="alert alert-eror">Password salah</div>';
                            }

                        }else{
                            echo '<div class="alert alert-eror">Username tidak ditemukan</div>';
                        }
                    }

                ?>
                <!-- end of script php -->
                <p class="credit text-center">&copy;Suwaib Amiruddin Foundation | 2021.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


</body>
</html>