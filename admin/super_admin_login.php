<?php include_once "../config/dbconnect.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right,rgb(7, 34, 62),rgb(45, 11, 99));
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-box {
            background: rgba(255, 255, 255, 0.2);
            padding: 30px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            color: white;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="login-box text-center w-25">
        <h2 class="mb-4">Super-Admin Login</h2>
        <form method="post" >
            <div class="mb-3">
                <label class="form-label">Super-Admin Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter username">
            </div>
            <div class="mb-3 position-relative">
                <label class="form-label">Super-Admin Password</label>
                <div class="input-group">
                    <input type="password" id="password" class="form-control" name="password" placeholder="Enter password">
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="login">Login</button>
        </form>
        <?php
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = sha1($_POST['password']);
            // $insert_username = mysqli_query($connect,"INSERT INTO super_admin (username,password) VALUE ('$username','$password')");
            $check_user = mysqli_query($connect,"SELECT * FROM super_admin where admin_username='$username' AND password='$password'");
            $num = mysqli_num_rows($check_user);
            if($num > 0 ){
                session_start();
                $_SESSION['admin_username'] = $username;
                echo "<script>window.location.href='index.php';</script>";

            }
        }

        ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
