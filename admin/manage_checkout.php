<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Sessions - Kidz FunStation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include_once "sidebar.php" ?>
            <div class="col-md-10 content">
                <h3>Checkout Sessions</h3>
                <div class="d-flex justify-content-between mb-3">
                    <form action="" method="get">
                        <div class="d-flex">
                            <input type="text" name="search_input" class="form-control w-70  rounded-end-0"
                                placeholder="Search by Kid's Name">
                            <button class="btn btn-primary rounded-start-0" style="border-radius: 0px 10px 10px 0px;"
                                name="search_kids">Search</button>
                        </div>
                    </form>
                    

                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Select date
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="">Today</a></li>
                            <li><a class="dropdown-item" href="">yesterday</a></li>
                            <li><a class="dropdown-item" href="#">This Week</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
                   

                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Session Name</th>
                            <th>Contact</th>
                            <th>Check-in Time</th>
                            <th>Assigned Hours</th>
                            <th>Check-out Time</th>
                            <th>Total Duration</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_GET['search_kids'])) {
                            $search_input = $_GET['search_input'];
                            $calling_session = mysqli_query($connect, "SELECT * FROM session JOIN kids ON session.kids_id = kids.id WHERE session.is_active=1 and kids_name LIKE '%$search_input%'");
                        } else {
                            $calling_session = mysqli_query($connect, "SELECT * FROM session JOIN kids ON session.kids_id = kids.id WHERE session.is_active=1");
                        }
                        while ($sessionn = mysqli_fetch_array($calling_session)) {
                            $check_in_time = $sessionn['check_in_time'];
                            $check_out_time = $sessionn['check_out_time'];

                            $in_time = strtotime($check_in_time);
                            $out_time = strtotime($check_out_time);

                            $dif_time = abs($out_time - $in_time);
                            $hours = floor($dif_time / 3600);
                            $minuts = floor(($dif_time % 3600) / 60);



                            ?>

                            <tr>
                                <td><?= $sessionn['kids_name'] ?></td>
                                <td><?= $sessionn['kids_mobile'] ?></td>
                                <td><?= $check_in_time ?></td>
                                <td><?= $sessionn['assigned_hours'] . ' ' . 'hour' ?></td>
                                <td><?= $check_out_time ?></td>
                                <td><?= $hours ?>h <?= $minuts ?>m</td>
                                <td><a href="recipt.php?recipt=<?= $sessionn['check_in_time'] ?>" class="text-black"
                                        style="text-decoration :none;">📚Receipt</a></td>
                            </tr>


                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>