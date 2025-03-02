<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Kidz Funstation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .session-card {
            background: rgba(2, 245, 245, 0.25);
            padding: 15px;
            border-radius: 2px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 300px;
            border: 1px solid black;
            margin-left: 0;

        }

        .top-buttons {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include_once "sidebar.php" ?>
            <div class="col-md-10 content">
                <div class="top-buttons mb-3">

                    <a href="add_session.php"><button class="btn btn-danger">Add Session</button></a>
                    <a href="index.php"><button class="btn btn-outline-secondary" name="refresh"><i class="bi bi-arrow-clockwise"></i>Refresh</button></a>


                </div>
                <?php $count_session = mysqli_num_rows(mysqli_query($connect, "select * from session where is_active=0")); ?>

                <h3>Realtime Sessions (<?= $count_session ?>)</h3>
                <div class="row ">
                    <?php
                    $calling_session = mysqli_query($connect, "SELECT * FROM session JOIN kids ON session.kids_id = kids.id WHERE session.is_active=0");
                    while ($sessionn = mysqli_fetch_array($calling_session)) { ?>

                        <?php
                        date_default_timezone_set("Asia/Kolkata");
                        // assign houw work
                        $assigned_hours = floatval($sessionn['assigned_hours']);
                        $assigned_in_hours = floor($assigned_hours); // isme se 1 ghat jayega
                        $extra_minutes = ($assigned_hours - $assigned_in_hours) * 60;  // ye bacha hu aminut hai jo decimal me tha ise *60 kiya
                    
                        $check_in_time = $sessionn['check_in_time'];

                        // echo "$assigned_hours";
                        // $current_time = $sessionn['formatted_time'];
                        // $update_time = $new_time = date('Y-m-d H:i:s', strtotime($current_time . ' +1 hour +30 minutes'));;
                        // echo "$update_time";
                    
                        // $check_in_time = $sessionn['formatted_time'];
                        $update_time = date(' H:i:s', strtotime($check_in_time . " +{$assigned_in_hours} hours +{$extra_minutes} minutes"));

                        $current_time = date("H:i:s");


                        $in_time = strtotime($current_time);
                        $out_time = strtotime($update_time);
                        $diffrence_time = $out_time - $in_time;

                        // in howr  
                        $dif_hour = floor($diffrence_time / 3600);

                        // in minut 
                        $dif_min = floor(($diffrence_time % 3600) / 60);

                        //in second
                        $dif_sec = $diffrence_time % 60;


                        // $sub_time = abs($update_time - $current_time);
                        // echo "$dif_hour";
                    
                        // echo "$current_time";
                        // echo "$diffrence_time";
                    

                        // echo $check_in_time;
                        // echo $update_time;
                    

                        // $end_time = 
                    

                        ?>


                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-2">
                            <div class="session-card">
                                <h5><?= $sessionn['kids_name'] ?></h5>
                                <p>📞 <?= $sessionn['kids_mobile'] ?></p>
                                <p>🕒 <?= date('H:i A', strtotime($check_in_time)) ?> </p>
                                <p>Time Left: <?= $dif_hour ?>h <?= abs($dif_min) ?>m <?= abs($dif_sec) ?>s</p>
                                <div class="d-flex justify-content-between">
                                    <!-- <span></span> -->
                                    <a href="index.php" class="text-black"
                                        style="text-decoration :none;"><?= $sessionn['assigned_hours'] ?> hour</a>
                                    <a href="recipt.php" class="text-black" style="text-decoration :none;">📚Receipt</a>
                                    <a href="?is_active=<?= $sessionn['check_in_time'] ?>" class="text-black"
                                        style="text-decoration :none;">Check-out</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    if (isset($_GET['is_active'])) {
                        date_default_timezone_set("Asia/Kolkata");
                        $check_out_time = date("Y-m-d H:i:s");
                        $id = $_GET['is_active'];
                        $update_query = mysqli_query($connect, "UPDATE session SET is_active=1, check_out_time='$check_out_time' WHERE check_in_time='$id' ");
                        if ($update_query) {
                            echo "<script>window.location.href='index.php';</script>";

                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>

    <head>
        <!-- <meta http-equiv="refresh" content="1"> -->
    </head>
</body>

</html>