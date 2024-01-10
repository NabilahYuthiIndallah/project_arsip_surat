<?php 

session_start();
include_once "c_koneksi.php";
class c_login {
    public function register($id=0, $nama, $email, $password, $role) {

        $conn = new c_koneksi();
        
            $query = "INSERT INTO users VALUES ('$id', '$nama', '$email', '$password', '$role', '')";
            $data = mysqli_query($conn->conn(), $query);
        
    }

    public function login($email=null, $pass=null) {
        $conn = new c_koneksi();

        // jika tombol login di tekan maka jalankan perintah dibawah nya
        if(isset($_POST['login'])) {
            // perintah untuk memanggil semua data berdasarkan dari email yang di input kan oleh user
            $sql = "SELECT * FROM users WHERE email = '$email'";

            $query = mysqli_query($conn->conn(), $sql);

            // merubah data menjadi array assosiatif
            // array asosiatif adalah array yang index nya memiliki nama
            $data = mysqli_fetch_assoc($query);

            // untuk mengecek apakah query select data berhasil atau tidak
            if ($data) {
                // mengecek password apakah sama atau tidak antara yang di inputkan oleh user sama atau tidak dengan database
                if (password_verify($pass, $data['password'])) {
                    if ($data['role'] == "admin") {
                        // membuat variabel session yang nantinya akan digunakan pada halaman home admin
                        $_SESSION['data'] = $data;
                        $_SESSION['role'] = $data['role'];

                        // jika login berhasil maka pindah ke home.php
                        header("Location: ../views/home_admin.php");
                        exit;
                    }elseif($data['role'] == 'sekretaris') {
                        $_SESSION['data'] = $data;
                        $_SESSION['role'] = $data['role'];

                        header("Location: ../views/home_sekretaris.php");
                        exit;
                    }
                }else {
                    echo "<script>alert('Login gagal !!! Silahkan cek email dan password');
                    windows.location='../index.php';
                    </script>";
                }
            }else {
                echo "<script>alert('Login gagal !!! Silahkan cek email dan password');
                    windows.location='../index.php';
                    </script>";
            }
        }
    }

    public function logout() {
        session_destroy();

        // menghapus/menghancurkan session
        header("Location: ../index.php");
        exit;
    }
}

?>
