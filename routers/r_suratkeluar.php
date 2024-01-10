
<?php
include_once "../controllers/c_suratkeluar.php";
$suratkeluar = new c_suratkeluar();

if ($_GET["aksi"] == "tambah") {
    $id = $_POST["id"];
    $nomor = $_POST["nomor"];
    $tanggal = $_POST["tanggal"];
    $perihal = $_POST["perihal"];
    $tujuan = $_POST["tujuan"];

    $tipe = array('png', 'jpg');
    $dokumen = $_FILES["dokumen"]["name"];

    $x = explode('.', $dokumen);

    $ekstensi = strtolower(end($x));

    $tmp = $_FILES["dokumen"]["tmp_name"];

    if (in_array($ekstensi, $tipe) == true) {
            move_uploaded_file($tmp, '../assets/img/' . $dokumen);
            $suratkeluar->insert($id, $nomor, $tanggal, $perihal, $tujuan, $dokumen);
            if ($suratkeluar) {
                echo "<script> alert('Data berhasil di tambahkan!');
                document.location.href = '../views/suratkeluar.php';
                </script>";
            }
    }else {
        echo "<script> alert('Tolong masukan file dengan ekstensi (png / jpg)')</script>";
    }

} elseif ($_GET["aksi"] == "edit") {
    $id = $_POST["id"];
    $nomor = $_POST["nomor"];
    $tanggal = $_POST["tanggal"];
    $perihal = $_POST["perihal"];
    $tujuan = $_POST["tujuan"];
    
    $tipe = array('png', 'jpg');
    $dokumen = $_FILES["dokumen"]["name"];

    $x = explode('.', $dokumen);

    $ekstensi = strtolower(end($x));

    $ukuran = $_FILES["dokumen"]["size"];

    $tmp = $_FILES["dokumen"]["tmp_name"];

    if (in_array($ekstensi, $tipe) == true) {
        if ($ukuran <= 1044070) {
            move_uploaded_file($tmp, '../assets/img/' . $dokumen);
            $suratkeluar->update($id, $nomor, $tanggal, $perihal, $tujuan, $dokumen);
            if ($suratkeluar) {
                echo "<script> alert('Data berhasil di tambahkan!');
                document.location.href = '../views/suratkeluar.php';
                </script>";
            }
        } else {
            echo "<script> alert('ukuran file terlalu besar')</script>";
        }
    }else {
        echo "<script> alert('Tolong masukan file dengan ekstensi (png / jpg)')</script>";
    }
} elseif ($_GET["aksi"] == "delete") {
    $id = $_GET["id"];
    $suratkeluar->delete($id);
}
