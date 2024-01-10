
<?php
include_once "../controllers/c_suratmasuk.php";
$suratmasuk = new c_suratmasuk();

if ($_GET["aksi"] == "tambah") {
    $id = $_POST["id"];
    $tanggal = $_POST["tanggal"];
    $nomor = $_POST["nomor"];
    $asal = $_POST["asal"];
    $perihal = $_POST["perihal"];
    $keterangan = $_POST["keterangan"];


    $tipe = array('png', 'jpg');
    $dokumen = $_FILES["dokumen"]["name"];

    $x = explode('.', $dokumen);

    $ekstensi = strtolower(end($x));

    $ukuran = $_FILES["dokumen"]["size"];

    $tmp = $_FILES["dokumen"]["tmp_name"];

    if (in_array($ekstensi, $tipe) == true) {
        if ($ukuran <= 1044070) {
            move_uploaded_file($tmp, '../assets/img/' . $dokumen);
            $suratmasuk->insert($id, $tanggal, $nomor, $asal, $perihal, $keterangan, $dokumen);
            if ($suratmasuk) {
                echo "<script> alert('Data berhasil di tambahkan!');
                document.location.href = '../views/suratmasuk.php';
                </script>";
            }
        } else {
            echo "<script> alert('ukuran file terlalu besar')</script>";
        }
    }else {
        echo "<script> alert('Tolong masukan file dengan ekstensi (png / jpg)')</script>";
    }

} elseif ($_GET["aksi"] == "edit") {
    $id = $_POST["id"];
    $tanggal = $_POST["tanggal"];
    $nomor = $_POST["nomor"];
    $asal = $_POST["asal"];
    $perihal = $_POST["perihal"];
    $keterangan = $_POST["keterangan"];

    $tipe = array('png', 'jpg');
    $dokumen = $_FILES["dokumen"]["name"];

    $x = explode('.', $dokumen);

    $ekstensi = strtolower(end($x));

    $ukuran = $_FILES["dokumen"]["size"];

    $tmp = $_FILES["dokumen"]["tmp_name"];

    if (in_array($ekstensi, $tipe) == true) {
        if ($ukuran <= 1044070) {
            move_uploaded_file($tmp, '../assets/img/' . $dokumen);
            $suratmasuk->update($id, $tanggal, $nomor, $asal, $perihal, $keterangan, $dokumen);
            if ($suratmasuk) {
                echo "<script> alert('Data berhasil di edit!');
                document.location.href = '../views/suratmasuk.php';
                </script>";
            }
        } else {
            echo "<script> alert('ukuran file terlalu besar')</script>";
        }
    }else {
        echo "<script> alert('Tolong masukan file dengan ekstensi (png / jpg)')</script>";
    }


    if ($suratmasuk) {
        echo "<script> alert('Data berhasil di ubah');
        document.location.href = '../views/suratmasuk.php';
        </script>";
    }
} elseif ($_GET["aksi"] == "delete") {
    $id = $_GET["id"];
    $suratmasuk->delete($id);
}
