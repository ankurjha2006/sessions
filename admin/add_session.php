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

        .form-container {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include_once "sidebar.php" ?>
            <div class="col-md-10 content">
                <br><br>
                <div class="form-container">


                    <h3 class="text-center text-primary mb-4">Kids Fun Session</h3>
                    <form method="post">
                        <!-- Kids Name -->
                        <!-- <div class="mb-3">
                            <label class="form-label">Kids Name</label>
                            <input type="text" class="form-control" placeholder="Enter Kid's Name" required>
                        </div> -->

                        <!-- Kids Mobile Number -->
                        <div class="mb-3">
                            <label class="form-label">Mobile Number</label>
                            <input type="tel" class="form-control" name="kids_mobile" placeholder="Enter Mobile Number"
                                required>
                        </div>
                        <?php
                        if (isset($_POST['session_submit'])) {
                            $kids_mobile = $_POST['kids_mobile'];
                            $check_no = mysqli_query($connect, "SELECT * FROM kids where kids_mobile='$kids_mobile'");
                            $mo_no = mysqli_fetch_assoc($check_no);



                            if (!$mo_no) {
                                // echo "<script>alert('mo no not exist')</script>";
                                header("Location: add_session.php");


                                exit();
                            } else {
                                $kids_mobile_no = $mo_no['kids_mobile'];
                                $kids_id = $mo_no['id'];
                            }
                            // $kids_id = $mo_no['id'];
                        


                        }

                        ?>

                        <!-- Kids Age -->
                        <!-- <div class="mb-3">
                            <label class="form-label">Kids Age</label>
                            <input type="number" class="form-control" placeholder="Enter Age" required min="1">
                        </div> -->

                        <!-- Time Selection -->
                        <div class="mb-3">
                            <label class="form-label">Select Time</label>
                            <select class="form-select" name="session_time">
                                <option value="0.5">30 Minutes</option>
                                <option value="1">1 Hour</option>
                                <option value="1.5">1.5 Hours</option>
                                <option value="2">2 Hours</option>
                            </select>
                        </div>

                        <!-- GST Option -->
                        <div class="mb-3 form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="gstToggle" value="1" name="gst">
                            <label class="form-check-label" for="gstToggle">Include GST</label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" name="session_submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                    <?php
                    $call_setting = mysqli_query($connect, "SELECT * FROM setting WHERE id=1");
                    $row = mysqli_fetch_assoc($call_setting);
                    $hour_cost = $row['hourly_charge'];


                    ?>
                    <?php
                    if (isset($_POST['session_submit'])) {
                        $session_time = $_POST['session_time'];
                        $cost = $session_time * $hour_cost ;
                        $gst = isset($_POST['gst']) ? $_POST['gst'] : 0;
                        // if ($session_time == 0.5) {
                        //     $cost = 300;
                        // } elseif ($session_time == 1) {
                        //     $cost = 500;
                        // } elseif ($session_time == 1.5) {
                        //     $cost = 700;
                        // } else {
                        //     $cost = 850;
                        // }
                        $insert_session = mysqli_query($connect, "INSERT INTO session (kids_id,check_out_time,assigned_hours,total_cost,include_gst) VALUE ('$kids_id','0','$session_time','$cost','$gst')");

                        if ($insert_session) {
                            // echo "session started";
                            echo "<script>window.location.href='index.php';</script>";
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>