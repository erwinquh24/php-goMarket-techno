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
	<title>Profil</title>
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
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/superfish.js"></script>
  <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
  <script type="text/javascript">if($(window).width()>1024){document.write("<"+"script src='js/jquery.preloader.js'></"+"script>");}	</script>
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
        <li><a class="icon-7" href="index-1.php"></a></li>
        <li><a class="icon-6" ></a></li>
      </ul>
    </div>
    <div class="container clearfix">
      <div class="row">
        <div class="span12">
          <div class="navbar navbar_">
            <div class="container">
              <h1 class="brand brand_"><a href="index.php"><img alt="" src="img/logo.jpg " width="16%"> </a>
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span> </a>
                <div class="nav-collapse nav-collapse_  collapse">
                 <ul class="nav sf-menu">
                  <li class="sub-menu"><a href="index.php">Beranda</a></li>
                  <li class="active"><a href="index-1.php">Pesan</a>
                  </li>
                  <li><!-- <a href="index-2.php"> --><a>Galeri</a>
                   <ul>
                    <!-- <li><a href="index-4.php">Gelang </a></li>
                    <li><a href="index-5.php">Kalung</a></li>
                    <li><a href="index-6.php">Gantungan</a></li>
                    <li><a href="index-7.php">Video</a></li>
                    <li><a href="index-8.php">Lainnya</a></li> -->
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
                            <div><input type="text" name="quantity" value="1" size="2" /></div>
                            
                            <a href="cart_update.php"><img src="img/templatemo_addtocart.png"></a>
                          
                        </div>
                      </li>
                  </ul>
                  </form>

EOT;
}
$products_item .= '</ul>';
echo $products_item;

?>
  <!--============================== content =================================-->
  <div class="container">
    <form>
      <label>Nama Lengkap :</label>
      <td><input type="text" name="nama_costumer" placeholder="nama" required/></td>
      <label>Alamat Lengkap :</label>
      <td><input type="text" name="alamat_costumer" placeholder="alamat" required/></td>
      <label>No.HP :</label>
      <td><input type="text" name="no_hp" placeholder="0822-1234-3211" required/></td>

      <p>
        <div class="art-layout-cell art-content">
          <div class="art-box art-post">
            <div class="art-box-body art-post-body">
              <div class="art-post-inner art-article">
                <div class="art-postcontent">
                  <div class="main_content">
                    <!-- <div class="panel_sepatu">
                      <img src="img/sayur.jpg">
                      <input type="text" name="sayur" value="Rp 12.000/kg" disabled>          
                      <div class="menu_content"></div>
                      <div class="judul_content">

                      </div>
                    </div>  --> 
                    <div class="product_box">
                      <h3>Sayur</h3>
                      <a href="productdetail.html"><img src="img/sayur.jpg" alt="Shoes 1" /></a>
                      <p>Nulla rutrum neque vitae erat condimentum eget malesuada.</p>
                      <p class="product_price">$ 100</p>
                      <a href="pemesanan.php"><img src="img/templatemo_addtocart.png"></a>
                      <a href="detail.php"><img src="img/templatemo_detail.png"></a>
                    </div>
                    <div class="product_box">
                      <h3>Telur</h3>
                      <a href="productdetail.html"><img src="img/telur.jpg" alt="Shoes 1" /></a>
                      <p>Nulla rutrum neque vitae erat condimentum eget malesuada.</p>
                      <p class="product_price">$ 100</p>
                      <a href="pemesanan.php"><img src="img/templatemo_addtocart.png"></a>
                      <a href="detail.php"><img src="img/templatemo_detail.png"></a>
                    </div>    

                    <div class="product_box">
                      <h3>Cabai</h3>
                      <a href="productdetail.html"><img src="img/cabe.jpg" alt="Shoes 1" /></a>
                      <p>Nulla rutrum neque vitae erat condimentum eget malesuada.</p>
                      <p class="product_price">$ 100</p>
                      <a href="pemesanan.php"><img src="img/templatemo_addtocart.png"></a>
                      <a href="detail.php"><img src="img/templatemo_detail.png"></a>
                    </div>
                    <div class="product_box">
                      <h3>Ikan</h3>
                      <a href="productdetail.html"><img src="img/ikan.jpg" alt="Shoes 1" /></a>
                      <p>Nulla rutrum neque vitae erat condimentum eget malesuada.</p>
                      <p class="product_price">$ 100</p>
                      <a href="pemesanan.php"><img src="img/templatemo_addtocart.png"></a>
                      <a href="detail.php"><img src="img/templatemo_detail.png"></a>
                    </div>      
                    <!-- <div class="panel_sandal">
                      <img src="img/telur.jpg">
                      <div class="menu_content2"></div>
                      <div class="judul_content2">

                      </div>
                    </div> -->

                    <!-- <div class="panel_sepatu2">
                      <img src="img/cabe.jpg">             
                      <div class="menu_content3"></div>
                      <div class="judul_content3">

                      </div>
                    </div>

                    <div class="panel_sandal2">
                      <img src="img/ikan.jpg" >
                      <div class="menu_content4"></div>
                      <div class="judul_content4">

                      </div>
                    </div> -->

                  </div>  
                </div>
                <div class="cleared"></div>
              </div>

              <div class="cleared"></div>
            </div>
          </div>
          <div class="art-box art-post">
            <div class="art-box-body art-post-body">
              <div class="art-post-inner art-article">
                <div class="art-postcontent">



                </div>
                <div class="cleared"></div>
              </div>

              <div class="cleared"></div>
            </div>
          </div>

          <div class="cleared"></div>
        </div>
                                        <!-- <div class="art-layout-cell art-sidebar2">
                            <div class="art-box art-block">
                              <div class="art-box-body art-block-body">
                                    <div class="art-bar art-blockheader">
                                      <h3 class="t">Belanja</h3>
                                    </div>
                                    <div class="art-box art-blockcontent">
                                      <div class="art-box-body art-blockcontent-body">
                                    <ul>
                                      <li><a href='./?pages=viewkeranjang'>Keranjang Belanja</a></li>
                                      <li><a href='./?pages=viewinvoice'>Invoice</a></li>
                                      <li><a href='./?pages=viewpromosi'>Promosi</a></li>
                                      <li><a href="./?pages=konfirmasi">Konfirmasi</a></li>
                                    </ul>                
                                                <div class="cleared"></div>
                                      </div>
                                    </div>
                                <div class="cleared"></div>
                              </div>
                            </div>
 
                            
                          </div> -->

                          <tbody>
                            <?php
                            $query = "SELECT * FROM pesanan";
                            $data = $db->prepare($query);
                            $data->execute();

                            $no = 1;
                            while($mhs = $data->fetch(PDO::FETCH_LAZY)){  
                              ?>
                              <tr>



                                <input required type="text" name="jumlah_barang" id="jumlah_barang" placeholder="jumlah barang"  value="<?php echo $mhs["x"]?>">
                                <input type="text" name="total" id="total" disabled>
                              </tr>
                              <?php 
                              $no++;
                            } 
                            ?>
                          </tbody>
                        </table>
                        <br/>
                        <td><input required="" type="text" name="keterangan" placeholder="masukkan keterangan"></td>
                      </p>

                      <input type="submit" name="submit" value="Pesan">
                    </form>
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