<?php
session_start();
if(isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}
require 'koneksi.php';
$error = false;
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['login'] = true;
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
        $_SESSION['role'] = $row['role'];
        header("Location: index.php");
        exit;
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - Aplikasi Buku Tamu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body{background:linear-gradient(180deg,#4e73df 10%,#224abe 100%);font-family:'Nunito',sans-serif;height:100vh;display:flex;align-items:center;}
        .login-container{max-width:450px;margin:0 auto;}
        .card{border:none;border-radius:1rem;box-shadow:0 0.5rem 2rem rgba(0,0,0,0.3);}
        .card-body{padding:2rem;}
        .form-control{border-radius:0.5rem;padding:0.75rem 1rem;}
        .btn-primary{border-radius:0.5rem;padding:0.75rem;font-weight:700;background:#4e73df;border:none;}
        .btn-primary:hover{background:#2e59d9;}
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-book fa-3x text-primary mb-3"></i>
                        <h4 class="font-weight-bold">Aplikasi Buku Tamu</h4>
                        <p class="text-muted">Silakan login untuk melanjutkan</p>
                    </div>
                    <?php if($error): ?>
                    <div class="alert alert-danger">Username atau password salah!</div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt mr-2"></i>Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
