<?php 

include "../controllers/c_login.php";



$login = new c_login();

try {
    if($_GET["aksi"] == "register") {
        $id = $_POST["id"];
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $role = $_POST["role"];
        $photo = $_POST["photo"];
    
        $password = password_hash($password, PASSWORD_DEFAULT);
    
        $login->register($id=0, $nama, $email, $password, $role);
        if($login) {
            echo "<script> alert('akun berhasil register');
            document.location.href = '../index.php';
            </script>";
        }
    }elseif ($_GET["aksi"] == "login") {
        $email = $_POST["email"];
        $pass = $_POST["pass"];

        if($email != $pass) {
            echo "<script> alert('Password/Email SALAH!');
            document.location.href = '../index.php';
            </script>";
        }
        
        $login->login($email, $pass);
    }elseif ($_GET["aksi"] == "logout") {
        $login->logout();
    }
} catch (Exception $e) {
    echo $e->getMessage();
}






?>