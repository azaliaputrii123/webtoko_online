<?php
      require "koneksi.php";
      
      $queryProduk = mysqli_query($con,"SELECT id, nama, harga,foto,detail FROM produk LIMIT 6 ");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Baju Online | Home </title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">

</head>
<body>
<?php require "navbar.php"; ?>

   <div class="container-fluid banner d-flex align-items-center">
    <div class="container text-center text-white">
        <h1>Toko Online Fashion</h1>
        <h3>Mau Cari Apa?</h3>
   <div class="col-md-8 offset-md-2">
    <form method="get" action="produk.php">
    <div class="input-group input-group-lg my-5">
        <input type="text" class="form-control" placeholder="Nama Produk" aria-label="" aria-describedby="basic-addon2" name="keyword">
        <button type="submit"class="btn warna2 text-white">Telusuri</button>
              </div>
           </form>
        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container text-center">
        <h3>Kategori Terlaris<h3>

        <div class="row mt-5">
            <div class="col-md-4 mb-3">
                <div class="highlighted-kategori kategori-baju-pria d-flex justify-content-center align-items-center">
                    <h4 class="text-white"><a href="produk.php?kategori=Baju Pria">Baju Pria </a></h4>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="highlighted-kategori kategori-baju-wanita d-flex justify-content-center align-items-center">
                <h4 class="text-white"><a href="produk.php?kategori=Baju Wanita">Baju Wanita </a></h4>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="highlighted-kategori kategori-baju-anak d-flex justify-content-center align-items-center">
                <h4 class="text-white"><a href="produk.php?kategori=Baju Anak">Baju Anak </a></h4>
                </div>
            </div>
        </div>
    </div>
</div>
             <div class="container-fluid warna3 py-5">
                <div class="container text-center text-white">
                    <h3>Tentang Kami </h3>
                    <p class="fs-6 mt-3">
                       Selamat datang di <strong>Azal</strong> Fashion, destinasi terbaik Anda untuk gaya dan tren terkini. 
                       Kami adalah rumah bagi koleksi pakaian pria dan wanita yang menawarkan kombinasi sempurna antara gaya,
                       kenyamanan, dan harga yang terjangkau. Di <strong> Azal Fashion </strong> , kami memahami bahwa pakaian adalah cara Anda mengekspresikan diri. Oleh karena itu, kami berkomitmen untuk menyediakan pilihan yang beragam, mulai dari pakaian kasual yang santai hingga pakaian formal yang elegan, sehingga Anda dapat menemukan sesuatu yang sesuai dengan kepribadian dan gaya hidup Anda. Kami selalu memperbarui koleksi kami untuk mencerminkan tren terbaru di dunia fashion, sehingga Anda dapat selalu tampil trendy dan up-to-date. Baik Anda mencari pakaian untuk kesempatan khusus atau hanya membutuhkan tambahan untuk lemari pakaian Anda, kami memiliki segala yang Anda butuhkan.</p>
                </div>
             </div>

             <div class="container-fluid py-5">
                <div class="container text-center">
                    <h3>Produk</h3>

                    <div class="row mt-5">
                        <?php while($data = mysqli_fetch_array($queryProduk)){  ?>
                        <div class="col-sm-6 col-md-4 mb-3">
                        <div class="card h-100">
                            <div class="img-box">
                            <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                            <h5 class="card-title"><?php echo $data['nama']; ?></h5>
                            <p class="card-text text-truncate"><?php echo $data['detail']; ?></p>
                            <p class="card-text text-harga"><?php echo $data['harga']?></p>
                            <a href="produk.php" class="btn warna3">Lihat Detail</a>
                                 </div>
                            </div>
                        </div>
                    <?php } ?>
                   </div>
                   <button class="btn btn-outline-warning mt-3" id="buttonProduk"><a href="produk.php">See More </a></button>
              </div>
         </div>

         <?php require "footer.php"; ?>
         
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>