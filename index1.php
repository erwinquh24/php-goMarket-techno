<?php
//require('Session.php');
include ('db\database.php');
require_once('dao\DaftarPesananDao.php');


$pesanan = new DaftarPesananDao();

$pilihan = '';
$datq = array();

if(isset($_POST['submit'])){
        // Simpan data yang di inputkan ke POST ke masing-masing variable
        // dan convert semua tag HTML yang mungkin dimasukkan untuk mengindari XSS
  $no=$_POST['no'];
  $nama_costumer = $_POST['nama_costumer'];
  $alamat_costumer = $_POST['alamat_costumer'];
  $no_hp = $_POST['no_hp'];
  $nama_barang = $_POST['nama_barang'];
  $jumlah_barang = $_POST['jumlah_barang'];
  $keterangan = $_POST['keterangan'];

  if($pesanan->input($no,$nama_costumer,$alamat_costumer,$no_hp,$nama_barang,$jumlah_barang,$keterangan)){
    $success = true;
    echo "berhasil";
  }else{
            // Jika gagal, ambil pesan error
    $error = $pesanan->getLastError();
    echo "gagal";
  }

  if ($pilihan <> '')
  {
    $datq = unserialize($pilihan);
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pesan</title>
  <meta charset="utf-8">
  <link rel="icon" href="img/favicon.ico" type="image/">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/" />
  <meta name="description" content="Your description">
  <meta name="keywords" content="Your keywords">
  <meta name="author" content="Your name">
  <link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />

  <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
  <link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
  <link rel="stylesheet" href="css/styles.css" type="text/css" media="screen">
  <link rel="stylesheet" href="css/styless.css" type="text/css" media="screen">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/superfish.js"></script>
  <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
  <script type="text/javascript">if($(window).width()>1024){document.write("<"+"script src='js/jquery.preloader.js'></"+"script>");}  </script>
  <script>    
   jQuery(window).load(function() { 
     $x = $(window).width();    
     if($x > 1024)
     {      
       jQuery("#content .row").preloader();    }       

       jQuery('.spinner').animate({'opacity':0},1000,'easeOutCubic',function (){jQuery(this).css('display','none')}); 
     }); 

   </script>

   <script src="code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
   <script type="text/javascript">
    $(document).ready(function(){
      $("#diskon").keyup(function(){ 
        var harga_barang  = parseInt($("#harga_barang").val());
        var jumlah_barang  = parseInt($("#jumlah_barang").val());
        var total = (harga_barang*jumlah_barang);
        $("#total").val(total); 
      }); 
    }); 
  </script> 
</head>

<body>
  <div class="spinner"></div>
  <!--============================== header =================================-->
  <header>
    <div class="container clearfix">
      <ul class="list-social pull-right">
        <li><a class="icon-7" href="index1.php"></a></li>
        <li><a class="icon-6" ></a></li>
      </ul>
    </div>
    <div class="container clearfix">
      <div class="row">
        <div class="span12">
          <div class="navbar navbar_">
            <div class="container">
              <h1 class="brand brand_"><a href="index.php"><img alt="" src="img/logo_go_market.jpg " width="16%"> </a>
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span> </a>
                <div class="nav-collapse nav-collapse_  collapse">
                 <ul class="nav sf-menu">
                  <li class="sub-menu"><a href="index.php">Beranda</a></li>
                  <li class="active"><a href="index1.php">Pesan</a>
                  </li>
                  <li><!-- <a href="index-2.php"> --><a>Kategori</a>
                   <ul>
                    <li><a href="#">Sayur </a></li>
                    <li><a href="#">Beras </a></li>
                    <li><a href="#">Ikan </a></li>
                    <li><a href="#">Buah </a></li>
                    <li><a href="#">Lainnya</a></li>
                  </ul>
                </li>
                <li><a href="index-3.php">Tentang Kami</a></li>
              </ul>
            </div>
          </h1>
        </div>
      </div>
    </div>
  </div>
</div>
</header>
<div class="bg-content"> 


  <!--============================== content =================================-->
  <div class="container">

  <div class="row">
    <div id="templatemo_main">
    <form class="navbar-form navbar-right" role="search" >
                    <div class="form-group" >
                        <input type="text" placeholder="Cari Produk..." class="form-control">                      
                    </div><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit" class="btn btn-primary">Cari</button>
                    
                </form>
                <br/>
                <br/>
        <div id="sidebar" class="float_l">
            <div class="sidebar_box"><span class="bottom"></span>
                <h3>Kategori</h3>   
                <div class="content"> 
                    <ul class="sidebar_list">
                        <!-- <li class="first"><a href="#">Sed eget purus</a></li> -->
                        <li><a href="#">Sayur</a></li>
                        <li><a href="#">Beras</a></li>
                        <li><a href="#">Ikan</a></li>
                        <li><a href="#">Buah</a></li>
                       <!--  <li class="last"><a href="#">Sed eget purus</a></li> -->
                    </ul>
                </div>
            </div>
            
        </div>
        
      <p>
<div id="content" class="float_l">
       <h1>Produk</h1>       
      <?php 
      $results =("SELECT `nama_barang`, `gambar`, `harga_barang` FROM `pesanan` ORDER BY no ASC");

      $data=$db->prepare($results);
      $data->execute();
      $products_item = '<ul class="products">';
      while($obj = $data->fetch(PDO::FETCH_LAZY))
      {
      $products_item .= <<<EOT
                  <form method="post" action="cart_update.php">
                    <ul class="thumbnails thumbnails-1 list-services">
                      <li class="span4">
                        
                          <div class="thumbnail thumbnail-1">
                            <h3>{$obj->nama_barang}</h3>
                            <a><img src="img/{$obj->gambar}" width="100%" alt=""/></a>
                            <p class="product_price">Rp {$obj->harga_barang}/kg</p>
                            <div><input type="text" name="product_qty" value="1" size="2" /></div>
                            <input type="hidden" name="type" value="add" />
                            <div><button type="submit" class="add_to_cart">Add</button></a></div>
                          
                        </div>
                      </li>
                  </ul>
                  </form>

EOT;
}
$products_item .= '</ul>';
echo $products_item;

?>

                </div>
                </div>
                </div>
                </div>
                </div>


                <!--============================== footer =================================-->
                <footer>
                  <div class="container clearfix">
                    <ul class="list-social pull-right">
                      <li><a class="icon-1"></a></li>
                      <li><a class="icon-3"></a></li>
                      <li><a class="icon-4"></a></li>
                    </ul>
                    <div class="privacy pull-left">Dikembangkan oleh GoMarket  <a href="http://www.del.ac.id/" target="_blank" rel="nofollow">Institut Teknologi DEL</a> </div>
                  </div>
                </footer>
                <script type="text/javascript" src="js/bootstrap.js"></script>
              </body>
              </html>