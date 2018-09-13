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
        <li><a class="icon-7" href="cart_update.php"></a></li>
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
    <div id="templatemo_main">
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
        <div id="content" class="float_r">
            <h1>Daftar Pesanan</h1>
            <table width="680px" cellspacing="0" cellpadding="5">
                      <tr bgcolor="#ddd">
                            <th width="220" align="left">Gambar </th> 
                            <th width="180" align="left">Nama Barang </th> 
                            <th width="100" align="center">Jumlah Barang </th> 
                            <th width="60" align="right">Harga </th> 
                            <th width="60" align="right">Total </th> 
                            <th width="90"> </th>
                            
                      </tr>
                        <tr>
                            <td><img src="img/beras1.jpg" alt="image 1" /></td> 
                            <td>Beras</td> 
                            <td align="center"><input type="text" value="1" style="width: 20px; text-align: right" /> </td>
                            <td align="right">Rp 10000 </td> 
                            <td align="right">Rp 10000 </td>
                            <td align="center"> <a href="#"><br />Remove</a> </td>
                        </tr>
                        <!-- <tr>
                            <td><img src="images/product/02.jpg" alt="image 2" /> </td>
                            <td>Second Red Shoes</td> 
                            <td align="center"><input type="text" value="1" style="width: 20px; text-align: right" />  </td>
                            <td align="right">$80  </td>
                            <td align="right">$80 </td>
                            <td align="center"> <a href="#"><img src="images/remove_x.gif" alt="remove" /><br />Remove</a>  </td>
                        </tr>
                        <tr>
                            <td><img src="images/product/03.jpg" alt="image 3" /> </td>
                            <td>Hendrerit justo</td> 
                            <td align="center"><input type="text" value="1" style="width: 20px; text-align: right" />  </td>
                            <td align="right">$60  </td>
                            <td align="right">$60 </td>
                            <td align="center"> <a href="#"><img src="images/remove_x.gif" alt="remove" /><br />Remove</a>  </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="right"  height="30px">Have you modified your basket? Please click here to <a href="shoppingcart.html"><strong>Update</strong></a>&nbsp;&nbsp;</td>
                            <td align="right" style="background:#ddd; font-weight:bold"> Total </td>
                            <td align="right" style="background:#ddd; font-weight:bold">$240 </td>
                            <td style="background:#ddd; font-weight:bold"> </td>
                        </tr> -->
                    </table>
                    <div style="float:right; width: 215px; margin-top: 20px;">
                    
                    <p><a href="checkout.html">Konfirmasi Pemesanan</a></p>
                    <p><a href="javascript:history.back()">Kembali Belanja</a></p>
                        
                    </div>
            </div>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
      <!-- <p>
        <div class="art-layout-cell art-content">
          <div class="art-box art-post">
            <div class="art-box-body art-post-body">
              <div class="art-post-inner art-article">
                <div class="art-postcontent">
                  <div class="main_content">
            <h1>Daftar Pesanan</h1>
        <form method="post">
        <table class=tabel border="1">
        <tr>
        <th>
            Nama Barang</th>
             <th>
            Jumlah Barang</th>
            <th>Aksi</th></tr>
            <tr>
            <td><!-- <input required type="text" name="nama_barang" placeholder="IPK" value="<?php echo $data['nama_barang'] ?>"/> --> <!-- <label value="<?php echo $data['nama_barang'] ?>"></label><br></td> -->
            <!-- <td> --><!--  <input required type="text" name="jumlah_barang" placeholder="IPK" value="<?php echo $data['jumlah_barang'] ?>"/> --><!-- <label value="<?php echo $data['jumlah_barang'] ?>"></label> <br></td> -->
           <!--  <td><a href="#">Hapus</a></td></tr>
            </table>
            <table class=tabel>
            <br/>
            <tr>
            <td>Nama Costumer </td> <td>: </td><td><input required type="text" name="nama_costumer" placeholder="Nama Costumer" /> <br></td>
            </tr>
            <tr>
            <td>Alamat Costumer </td><td>: </td> <td> <input required type="text" name="alamat_costumer" placeholder="Alamat Costumer" /> <br></td>
            </tr>
            <tr>
            <td>No. Hp </td> <td>: </td> <td><input required type="text" name="no_hp" placeholder="0812-1234-4311" /> <br></td>
            </tr>
            <tr>
            <td>Keterangan </td> <td>: </td> <td><input required type="text" name="keterangan" placeholder="Keterangan" /> <br></td>
            </tr>
            </table>
        </form>
        <button type="submit" name="submit"><a href="index1.php">< < Tambah Barang</a></button>
        <button type="submit" name="submit" > Pesan </button> -->
        




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