<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kotak">
        <h3>Toko laptop</h3>
        <h4>Hallo selamat datang, silahkan login  ya!</h4>
        <form action="" method="post">
            <label for="nama_user">nama user</label><br />
            <input type="text" name="nama_user" id="nama_user" class="form-control"><br /> <br />
            <label for="username">Username</label><br />
            <input type="text" name="username" id="username" class="form-control"><br /> <br />
            <label for="password">Password</label><br />
            <input type="password" name="password" id="password" class="form-control"><br /> <br />

            <div class="form-check">
  <input class="form-check-input" type="radio" name="roles" id="roles" value="admin">
  <label class="form-check-label" for="roles">
    ADMIN
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="roles" id="roles" checked value="customer">
  <label class="form-check-label" for="roles" value="customer">
    CUSTOMERS
  </label>
</div>
<br>

            <button><a href="login/index.php">register</a></button>
        </form>
    </div>
</body>
</html>