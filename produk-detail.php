<?php
    require "koneksi.php";
    

    if($_GET['nama'] == null){
        echo 'Data Kosong';
    }
    else{
        $nama = htmlspecialchars($_GET['nama']);
        $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama='$nama'"); 
        $produk = mysqli_fetch_array($queryProduk);
    }

    $queryProdukTerkait = mysqli_query($con,"SELECT * FROM produk WHERE kategori_id='$produk[kategori_id]' AND id!='$produk[id]' LIMIT 4");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online | Produk Detail</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
</head>
<body>
    <?php require "navbar.php";?>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                   <img src="image/<?php echo $produk['foto'] ?>" class="w-100" alt="">
                </div>
                <div class="col-md-6 offset-md-1">
                    <h1>Baju Anak</h1>
                    <p class="fs-8"><?php echo $produk['detail'] ?></p>
                    <p class="text-harga fs-3">Rp <?php echo $produk['harga'] ?></p>
                    <p class="fs-5"> Status Ketersediaan : <strong><?php echo $produk['ketersediaan_stok'] ?></strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5 warna2 ">
        <div class="container">
            <h2 class="text-center text-white">Produk Terkait</h2>

        <div class="row">
            <?php while($data=mysqli_fetch_array($queryProdukTerkait)){ ?>
            <div class="col-md-6 col-lg-3 mb-3">
                <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>">
                <img src="image/<?php echo $data['foto']; ?>" class="img-fluid img-thumbnail produk-detail-image" 
                alt="">
                   </a>
                </div>
           <?php } ?>
            </div>
        </div>
    </div>









<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="fontawesome/js/all.min.js"></script>
</body>
</html>