<?php
// MEMBUAT KONEKSI DATABASE
$servername = "localhost";
$database = "kelompok4";
$username = " ";
$password = "passworddatabase";

// MEMULAI KONEKSI PHP KE DATABASE
$conn = mysqli_connect($servername, $username, $password, $database);

// CEK KONEKSI DATABASE TERHUBUNG ATAU TIDAK
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
echo "Koneksi berhasil";
mysqli_close($conn);

// DEKLARASI VARIABEL DI DATABASE

$NAMA = "";
$email = "";
$pesan = "";
$password = "";

if(isset($_POST['login'])){
    $NAMA   = $_POST['NAMA'];
    $password  = $_POST['password'];
    $pesan   = $_POST['pesan'];
    $email   = $_POST['email'];

    if($username == '' or $password == ''){
        $err .= "<li>Silakan masukkan username dan juga password.</li>";
    }else{
        $sql1 = "select * from login where username = '$username'";
        $q1   = mysqli_query($koneksi,$sql1);
        $r1   = mysqli_fetch_array($q1);

        if($r1['username'] == ''){
            $err .= "<li>Username <b>$username</b> tidak tersedia.</li>";
        }elseif($r1['password'] != md5($password)){
            $err .= "<li>Password yang dimasukkan tidak sesuai.</li>";
        }       
        
        if(empty($err)){
            $_SESSION['session_username'] = $username; //server
            $_SESSION['session_password'] = md5($password);

    
            header("location:kelompok4");
        }
    }
}
?>