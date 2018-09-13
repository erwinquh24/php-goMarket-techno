<?php
include ('db\db_user.php');
// require ".\model\User.php";

class UserDao
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
  session_start();
}
}

public function findAll()
{
  $stmt = $this->connection->prepare("SELECT * FROM login");
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_CLASS, 'login');
  return $stmt->fetchAll();
}


// Registrasi belajar baru
public function register($nama, $username, $password)
{
  try
  {
    // buat hash dari password yang dimasukkan
    $hashPasswd = password_hash($password, PASSWORD_DEFAULT);

    //Masukkan belajar baru ke database
    $query = $this->connection->prepare("INSERT INTO login(nama, username, password) VALUES(:nama, :username, :pass)");
    $query->bindParam(":nama", $nama);
    $query->bindParam(":username", $username);
    $query->bindParam(":pass", $hashPasswd);
    $query->execute();
    header("location: login.php");
    return true;
  }catch(PDOException $e){
    // Jika terjadi error
    if($e->errorInfo[0] == 23000){
      //errorInfor[0] berisi informasi error tentang query sql yg baru dijalankan
      //23000 adalah kode error ketika ada data yg sama pada kolom yg di set unique
      $this->error = "username sudah ada";
      return false;
    }else{
      echo $e->getMessage();
      return false;
    }
  }
}


//belajar belajar
public function login($username, $password)
{
  try
  {
    // Ambil data dari database
    $query = $this->connection->prepare("SELECT * FROM login WHERE username = :username");
    $query->bindParam(":username", $username);
    $query->execute();
    $data = $query->fetch();

    // Jika jumlah baris > 0
    if($query->rowCount() > 0){
      // jika password yang dimasukkan sesuai dengan yg ada di database
      if(password_verify($password, $data['password'])){
        $_SESSION['user_session'] = $data['id'];
        return true;
      }else{
        $this->error = "username atau Password Salah";
        return false;
      }
    }else{
      $this->error = "username atau Password Salah";
      return false;
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}

// Cek apakah belajar sudah belajar
public function isLoggedIn(){
  // Apakah user_session sudah ada di session
  if(isset($_SESSION['user_session']))
  {
    return true;
  }
}

// Ambil data belajar yang sudah belajar
public function getUser(){
  // Cek apakah sudah belajar
  if(!$this->isLoggedIn()){
    return false;
  }

  try {
    // Ambil data belajar dari database
    $query = $this->connection->prepare("SELECT * FROM login WHERE id = :id");
    $query->bindParam(":id", $_SESSION['user_session']);
    $query->execute();
    return $query->fetch();
  } catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}

// Logout belajar
public function logout(){
  // Hapus session
  session_destroy();
  // Hapus user_session
  unset($_SESSION['user_session']);
  return true;
}

// Ambil error terakhir yg disimpan di variable error
public function getLastError(){
  return $this->error;
}
}




?>
