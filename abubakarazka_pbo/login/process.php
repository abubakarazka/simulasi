<?php 

$conn = mysqli_connect('localhost', 'root', '', 'laptop');

$username = $_POST["username"];
$password = $_POST["password"];

$query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

$cek = mysqli_num_rows($query);

if($cek > 0){
    $data = mysqli_fetch_array($query);
    
    if($data["roles"] == "admin"){
        session_start();

        $_SESSION["username"] = $data["username"];
        $_SESSION["nama_user"] = $data["nama_user"];
        $_SESSION["roles"] = $data["roles"];
        header("Location: ../admin/index.php");
    }else if($data["roles"] == "customer"){
        session_start();

        $_SESSION["username"] = $data["username"];
        $_SESSION["nama_user"] = $data["nama_user"];
        $_SESSION["roles"] = $data["roles"];
        header("Location: ../index.php");
    }
}else{
    echo '
        <script type="text/javascript">
            alert("Akun tidak ditemukan");
            window.location: "index.php";
        </script>
    ';
}





?>