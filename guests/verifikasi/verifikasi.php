<?php
require_once '../../function.php';

if(isset($_POST["submit"])){
     echo "<script>  
                alert('barang berhasil dipesan.');
                document.location.href = '../../guests.php'
            </script> ";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../footer/fonts/icomoon/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../footer/css/bootstrap.min.css">
    
    <!-- Style CSS -->
    <link rel="stylesheet" href="../../footer/css/style.css">
</head>
<body>
    <!-- navbar -->
    <div class="row" >
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding: 12px;">
            <div class="container-fluid">
            <a class="navbar-brand" href="../../guests.html">FansFruits</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav-text" id="navbarNavAltMarkup" >
                <div class="navbar-nav">
                
                <a class="nav-link" href="#">Instagram</a>
                <a class="nav-link" href="#">Facebook</a>

                </div>
            </div>
            </div>
        </nav>
    </div>

    <!-- Form pemesanan  -->
    <div class="row" style="justify-content: center; margin-top: 2%;">
        <div class="card" style="width: 50%;">
            <div class="card-body">
                <div>
                    <form class="row g-3" method="POST">
                        <?php
                            $data=query("SELECT * FROM orderan");
                            foreach ($data as $row) {
                                $row["nama"];
                                $row["nama_baju"];
                                $row["jumlah"];
                                $row["size"];
                                $row["alamat"];
                                $row["total"];
                            }
                        ?>
                        
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="" value="<?=$row["nama"]?>">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Nama Pesanan</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="" value="<?=$row["nama_baju"]?>">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Jumlah Pesanan</label>
                            <input type="number" class="form-control" id="inputAddress" placeholder=""  value="<?=$row["jumlah"]?>">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Size</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder=""  value="<?=$row["size"]?>">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="" value="<?=$row["alamat"]?>">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Total Harga</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="" value="<?=$row["total"]?>">
                        </div>
                        
                        </div>
                        <div class="col-12" style="display: flex;justify-content: end; ">
                        <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>


    <!-- footer -->
    <footer class="footer-48201" style="margin-top: 10%;">
    
        <div class="container" >
        <div class="row">
            <div class="col-md-4 pr-md-5">
            <a href="#" class="footer-site-logo d-block mb-4">FansFruits</a>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi quasi perferendis ratione perspiciatis accusantium.</p>
            </div>
            <div class="col-md">
            <ul class="list-unstyled nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            </div>
            <div class="col-md">
            <ul class="list-unstyled nav-links">
                <li><a href="#">Clients</a></li>
                <li><a href="#">Team</a></li>
                <li><a href="#">Career</a></li>
                <li><a href="#">Testimonials</a></li>
                <li><a href="#">Journal</a></li>
            </ul>
            </div>
            <div class="col-md">
            <ul class="list-unstyled nav-links">
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms &amp; Conditions</a></li>
                <li><a href="#">Partners</a></li>
            </ul>
            </div>
            <div class="col-md text-md-center">
            <ul class="social list-unstyled">
                <li><a href="#"><span class="icon-instagram"></span></a></li>
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-pinterest"></span></a></li>
                <li><a href="#"><span class="icon-dribbble"></span></a></li>
            </ul>
            <p class=""><a href="#" class="btn btn-tertiary">Contact Us</a></p>
            </div>
        </div> 

        <div class="row ">
            <div class="col-12 text-center">
            <div class="copyright mt-5 pt-5">
                <p><small>&copy;FansFruits 2022-2023.</small></p>
            </div>
            </div>
        </div> 
        </div>
        
    </footer>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

            <script src="../../footer/js/jquery-3.3.1.min.js"></script>
            <script src="../../footer/js/popper.min.js"></script>
            <script src="../../footer/js/bootstrap.min.js"></script>
</body>
</html>