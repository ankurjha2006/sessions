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
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include_once "sidebar.php" ?>
            <div class="col-md-10 content">
                <h3>Kidz FunStation Settings</h3>
                <?php
                $call_setting = mysqli_query($connect, "SELECT * FROM setting WHERE id=1");
                $row = mysqli_fetch_assoc($call_setting);

                ?>
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="settings-card p-3">
                            <label>Hourly Charge</label>
                            <h5>₹<?= $row['hourly_charge'] ?>.00</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="settings-card p-3">
                            <label>Contact</label>
                            <h5><?= $row['contact'] ?></h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="settings-card p-3">
                            <label>Business Name</label>
                            <h5><?= $row['buisness_name'] ?></h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="settings-card p-3">
                            <label>Email</label>
                            <h5><?= $row['email'] ?></h5>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="settings-card p-3">
                            <label>Change Password</label>
                            <input type="password" class="form-control " placeholder="New password"
                                name="input_password" ><br>

                        </div>


                    </div>
                    <div class="col-md-4">
                        <div class="settings-card p-3">
                            <label>GST (18%)</label>
                            <h5><?= $row['gst'] ?></h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="settings-card p-3">
                            <label>Address</label>
                            <h5><?= $row['address'] ?></h5>
                        </div>
                    </div>
                    
                    <a href="super_admin_setting.php" class="btn btn-primary btn-lg">Update Details</a>

                </div>
            </div>
        </div>
    </div>
</body>

</html>