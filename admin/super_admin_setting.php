<?php include_once "../config/dbconnect.php";
session_start();
if (!isset($_SESSION['admin_username'])) {
    echo "<script>window.location.href='setting.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kidz FunStation Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .settings-card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            height: 180px;
        }

        .sidebar {
            background: white;
            height: 100vh;
            padding: 20px;
            color: white;
            border-right: 1px solid black;
        }

        .sidebar img {
            width: 100%;
            height: 100px;
            object-fit: cover;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 10px;
            text-decoration: none;
            border-radius: 7px;
            background: rgb(224, 46, 106);
            margin-bottom: 10px;
        }


        .sidebar a:hover {
            background: rgba(125, 2, 2, 0.78);
        }

        .content {
            padding: 50px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-2 sidebar text-left">
                <a href="index.php" style="padding: 0;"><img src="../image/images.jpg" alt="Logo"></a>
                <a href="index.php">Dashboard</a>
                <a href="add_session.php">Add Session</a>
                <a href="manage_checkout.php">Manage Checkouts</a>
                <a href="setting.php">Settings</a>
                <a href="logout.php">Logout</a>
                <p class="mt-5" style="font-size: 12px; ">Powered by <strong>Comestro</strong></p>
            </div>
            <div class="col-md-10 content">
                <h3>Kidz FunStation Settings</h3>
                <?php
                $call_setting = mysqli_query($connect, "SELECT * FROM setting WHERE id=1");
                $row = mysqli_fetch_assoc($call_setting);

                ?>
                <form action="" method="post">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="settings-card p-3">
                                <label>Hourly Charge</label>

                                <input type="text" class="form-control border-0 shadow-none bg-transparent fs-4"
                                    value="<?= $row['hourly_charge'] ?>" name="hourly_charge">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="settings-card p-3">
                                <label>Contact</label>
                                <input type="text" class="form-control border-0 shadow-none bg-transparent fs-4"
                                    value="<?= $row['contact'] ?>" name="contact">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="settings-card p-3">
                                <label>Business Name</label>
                                <input type="text" class="form-control border-0 shadow-none bg-transparent fs-4"
                                    value="<?= $row['buisness_name'] ?>" name="buisness_name">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="settings-card p-3">
                                <label>Email</label>
                                <input type="text" class="form-control border-0 shadow-none bg-transparent fs-4"
                                    value="<?= $row['email'] ?>" name="email">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- <form action="" method="post"> -->
                            <div class="settings-card p-3">
                                <label>Change Password</label>
                                <br><br>
                                <input type="password" class="form-control" placeholder="New password"
                                    name="input_password" required><br>
                                    
                            </div>
                            <?php
                            if (isset($_POST['update_details'])) {

                                $username = $_SESSION['admin_username'];
                                $input_password = sha1($_POST['input_password']);
                                $update_password = mysqli_query($connect, "UPDATE super_admin SET password='$input_password' where admin_username='$username'");
                            }

                            ?>
                            <!-- </form> -->

                        </div>
                        <div class="col-md-4">
                            <div class="settings-card p-3">
                                <label>GST (18%)</label>
                                <input type="text" class="form-control border-0 shadow-none bg-transparent fs-4"
                                    value="<?= $row['gst'] ?>" name="gst">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="settings-card p-3">
                                <label>Address</label>

                                <textarea class="form-control border-0 shadow-none bg-transparent fs-5" rows="3"
                                    style="resize: none;" name="address"><?= $row['address'] ?></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary fs-3" name="update_details">submit</button>
                    </div>
                </form>
                <?php
                if (isset($_POST['update_details'])) {
                    $hourly_charge = $_POST['hourly_charge'];
                    $contact = $_POST['contact'];
                    $buisness_name = $_POST['buisness_name'];
                    $email = $_POST['email'];
                    $gst = $_POST['gst'];
                    $address = $_POST['address'];



                    $update_details = mysqli_query($connect, "UPDATE setting SET hourly_charge='$hourly_charge', contact='$contact', buisness_name='$buisness_name', email='$email', gst='$gst', address='$address' WHERE id=1");

                    if ($update_details) {
                        echo "<script>window.location.href='setting.php';</script>";
                    }

                }

                ?>
            </div>
        </div>
    </div>
</body>

</html>