<?php
include ('db\database.php'); 
// require ".\model\Karyawan.php"; 


class DaftarPesananDao
{
  private $connection;
  private $db;

  public function __construct(PDO $connection = null)
  {
    $this->connection = $connection;
    if ($this->connection === null)
    {
      $this->connection = new PDO
      (
        'mysql:host=localhost;dbname=belajar',
        'root',
        ''
        );
      $this->connection->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
        );
    }
  }

  public function findAll()
  {
    $stmt = $this->connection->prepare('
      SELECT * FROM pesanan'
      );
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Karyawan');
    return $stmt->fetchAll();
  }

  public function update()
  {  
  $query = "UPDATE `pesanan` SET `nama_barang`=$_POST[nama_barang],`harga_barang`=$_POST[harga_barang] WHERE nama_barang=$_POST[nama_barang]";  //[nama] >> merupakan nama di URL nya, bukan di databasenya
                                //dan harus sesuai dengan <td><a href="delete.php?nama=... pada kelas Template.php
  $data = $db->prepare($query);
  $data->execute();
  
  header("location: index.php"); //me-
  }

  public function input($nama_costumer,$alamat_costumer,$no_hp,$nama_barang,$jumlah_barang,$keterangan)
  {
    try{
      $query = $this->connection->prepare("INSERT INTO `data_pesanan`(`no`, `nama_costumer`, `alamat_costumer`, `no_hp`, `nama_barang`, `jumlah_barang`, `keterangan`) VALUES (:no,:nama_costumer,:alamat_costumer,:no_hp,:nama_barang,:jumlah_barang,:keterangan)");
      $query->bindParam(":no", $no);
      $query->bindParam(":nama_costumer", $nama_costumer);
      $query->bindParam(":alamat_costumer", $alamat_costumer);
      $query->bindParam(":no_hp", $no_hp);
      $query->bindParam(":nama_barang", $nama_barang);
      $query->bindParam(":jumlah_barang", $jumlah_barang);
      $query->bindParam(":keterangan", $keterangan);
      $query->execute();

      header("location: index-1.php");
    }catch(PDOException $e){

      if($e->errorInfo[0] == 23000){

        $this->error = "username sudah digunakan!";
        return false;
      }else{
        echo $e->getMessage();
        return false;
      }

    }
  }



}


?>
