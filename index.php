<?php include_once "config/dbconnect.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar with Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: rgb(255, 255, 255);

        }

        .navbar-brand img {
            width: 250%;
            height: 70px;
            object-fit: cover;
        }

        .admin-btn {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
        }

        .form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>


    <nav class="navbar navbar-dark px-3 position-relative">
        <a class="navbar-brand" href="#">
            <img src="image/images.jpg" alt="Logo">
        </a>
        <a href="admin/login.php" class="btn btn-primary">Staff login</a>
        <!-- <div class="dropdown me-5">
            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Login
            </button>
            <ul class="dropdown-menu p-1">
                <li class="p-1"><a class="dropdown-item bg-secondary text-light rounded p-2 gap-1" href="admin/index.php">Staff login</a></li>
                
                <li class="p-1"><a class="dropdown-item bg-secondary text-light rounded p-2" href="admin/super_admin_login.php">Super Admin </a></li>
                
            </ul>
        </div> -->
        <!-- <a href="admin/index.php" class="btn btn-primary admin-btn">Admin Login</a> -->
    </nav>


    <div class="form-container">
        <h2>Kid's Registration</h2>
        <form method="post">
            <div class="mb-3">
                <label for="kidName" class="form-label">Kid's Name</label>
                <input type="text" class="form-control" name="kids_name" id="kidName" placeholder="Enter kid's name"
                    required>
            </div>
            <div class="mb-3">
                <label for="mobileNumber" class="form-label">Mobile Number</label>
                <input type="tel" class="form-control" name="kids_mobile" id="mobileNumber"
                    placeholder="Enter mobile number" required>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" name="kids_age" id="age" placeholder="Enter age" required>
            </div>
            <button type="submit" class="btn btn-success w-100" name="kids_submit">Submit</button>
        </form>
        <?php
        if (isset($_POST['kids_submit'])) {
            $kids_name = $_POST['kids_name'];
            $kids_mobile = $_POST['kids_mobile'];
            $kids_age = $_POST['kids_age'];

            $insert_kids = mysqli_query($connect, "INSERT INTO kids (kids_name,kids_mobile,kids_age) VALUE ('$kids_name','$kids_mobile','$kids_age')");
        }


        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>