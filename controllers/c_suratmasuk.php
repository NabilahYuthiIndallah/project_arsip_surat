
<?php
include_once "c_koneksi.php";
class c_suratmasuk
{
    public function insert($id, $tanggal, $nomor, $asal, $perihal, $keterangan, $dokumen)
    {
        $conn = new c_koneksi();
        $query = "INSERT INTO suratmasuk VALUES ('$id', '$tanggal', '$nomor', '$asal', '$perihal', '$keterangan' , '$dokumen')";
        $data = mysqli_query($conn->conn(), $query);
    }

    public function read()
    {
        
            $conn = new c_koneksi();
            // perintah mengambil semua data dari suratmasuk dan mengurutkan sesuai data terbaru diatas
            $query = "SELECT * FROM suratmasuk ORDER BY id DESC";
            $data = mysqli_query($conn->conn(), $query);

            // mengubah query data menjadi objek
            while ($row = mysqli_fetch_object($data)) {
                // array kosong untuk menampung data objek
                $rows[] = $row;
            }
            // mengembalikan nilai
            
            return $rows;
            
    }

    public function edit($id)
    {
        $conn = new c_koneksi();

        // perintah mengambil data dari barng berdasarkan id
        $query = "SELECT * FROM suratmasuk WHERE id = $id";
        $data = mysqli_query($conn->conn(), $query);
        while ($row = mysqli_fetch_object($data)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function update($id, $tanggal, $nomor, $asal, $perihal, $keterangan, $dokumen)
    {
        $conn = new c_koneksi();
        // perintah untuk update data dari suratmasuk 
        $query = "UPDATE suratmasuk SET  tanggal='$tanggal',
        nomor='$nomor',asal='$asal', perihal='$perihal', keterangan='$keterangan', dokumen='$dokumen' WHERE id = $id";
        $data = mysqli_query($conn->conn(), $query);
    }

    public function delete($id)
    {
        $conn = new c_koneksi();

        // perintah untuk menghapus data dari suratmasuk berdasarkan id
        $query = "DELETE FROM suratmasuk WHERE id = $id";
        $data = mysqli_query($conn->conn(), $query);

        header("Location: ../views/suratmasuk.php");
    }
}
