<?php 
date_default_timezone_set("Asia/makassar");
//koneksi ke database
$conn=mysqli_connect("localhost","root","", "db_buah");

if(!isset($conn)){
    echo "koneksi gagal!!!";
}


function query($query){
  global $conn;
  $result=mysqli_query($conn,$query) or die (mysqli_error($conn));
  $rows=[];

  foreach($result as $row){
    $rows[]=$row;
  }
  return $rows;
}

function upload(){
  $nama_file = $_FILES['gambar']['name'];
  $tipe_file = $_FILES['gambar']['type'];
  $ukuran_file = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmp_file =$_FILES['gambar']['tmp_name'];

  // ketika tdk ada gambar dipilih
  // if($error == 4){
  //   echo "<script>
  //           alert('Pilih Gambar Terlebih Dahulu!');
  //         </script>";
  //   return false;
  // }

  $ext=pathinfo($nama_file,PATHINFO_EXTENSION);
  $nama_file_baru = uniqid().'.'.$ext;
  //cek tipe file
  if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
    //cek ukuran file max 5Mb=5000000

    if($ukuran_file > 500000){
      echo "<script>
              alert('Ukuran gambar terlalu besar!');
            </script>";
      return false;
    }

    $folder =__DIR__."/img/".$nama_file_baru ;
    //upload jika lolos pengecekan
    move_uploaded_file($tmp_file, $folder);
  }else{
    echo "<script>
            alert('File yang dipilih bukan gambar!');
          </script>";
    return false;
  }

  return $nama_file_baru;
}


function tambahproduct($data){
  global $conn;
  $buah=$data["nama_buah"];
  $stok=$data["stok"];
  $harga=$data["harga"];
  $satuan=$data["satuan"];
  
  $gambar = upload();
  if(!$gambar){
    return false;
  }

  $query="INSERT INTO tb_product VALUES ('','$buah','$stok', '$harga', '$satuan' ,'$gambar')";
  mysqli_query($conn,$query);//jalankan query
  return $query;
}

function update($data){
  global $conn;
  $id=mysqli_real_escape_string($conn, $_POST["id_buah"]);
  $buah=mysqli_real_escape_string($conn, $data["nama_buah"]);
  $stok=mysqli_real_escape_string($conn, $data["stok"]);
  $harga=mysqli_real_escape_string($conn, $data["harga"]);
  $satuan=mysqli_real_escape_string($conn, $data["satuan"]);
  $gambar_lama=mysqli_real_escape_string($conn, $data["gambar_lama"]);
  
  $gambar = upload();

  if(!$gambar){
    $gambar = $gambar_lama;
  }else{
    if(file_exists("../img/$gambar_lama")){
      unlink('../img/'.$gambar_lama);

    }
  }
  $query="UPDATE tb_product SET nama_buah='$buah', stok='$stok', harga='$harga', satuan='$satuan', gambar='$gambar' 
                            WHERE id_buah=$id ";
  
  mysqli_query($conn,$query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function hapus($id){
  global $conn;
  $id = htmlspecialchars($_GET["id"]);
  $file=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM tb_product WHERE id_buah=$id "));
  $gambar = $file["gambar"];
  
  if(file_exists("../img/$gambar")){
    unlink('../img/'.$gambar);
    
    $query = "DELETE FROM tb_product WHERE id_buah=$id ";
    // var_dump($query);die;
    mysqli_query($conn,$query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
  }
  
}

function pesan($data){
  global $conn;

  $tanggal=date('Y/m/d H:i:s');
  $harga=$_GET["harga"];
  $buah=$_GET["buah"];
  $nama     = htmlspecialchars( $data["nama_pemesan"] );
  $jumlah  = htmlspecialchars( $data["jumlah_pesanan"] );
  $alamat  = htmlspecialchars( $data["alamat"] );
  $total=$jumlah*$harga;
  // var_dump($total);die;
  $query = "INSERT INTO tb_pesanan VALUES ('', '$nama', '$alamat', '$buah', '$jumlah', '$total','$tanggal')";
  // var_dump($query);die;
  mysqli_query($conn, $query)or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);


}


?>