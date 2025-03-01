<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kidz FunStation Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="settings-card p-3">
                            <label>Hourly Charge</label>
                            <h5>₹500.00</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="settings-card p-3">
                            <label>Contact</label>
                            <h5>9608297530</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="settings-card p-3">
                            <label>Business Name</label>
                            <h5>Kidz FunStation</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="settings-card p-3">
                            <label>Email</label>
                            <h5>kidzfunstation@gmail.com</h5>
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
                            <h5>10CNCPA1818RZ6</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="settings-card p-3">
                            <label>Address</label>
                            <h5>Panchsara Famethiswar, 1st Floor, Shop No 208, Near Tanishq Showroom, Line Bazar, Purnea
                                (Bihar)</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="settings-card p-3 d-flex align-items-center ">
                            <!-- <label>Address</label> -->
                            <a href="super_admin_setting.php" class="btn btn-primary btn-lg">Update Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>