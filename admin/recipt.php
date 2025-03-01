<?php include_once "../config/dbconnect.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .receipt {
            background: white;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .receipt h5 {
            text-align: center;
            font-weight: bold;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
    </style>
</head>

<body>
    <div class="receipt">
        <h5>Kidz FunStation</h5>
        <p class="text-center">Panorama Rameshwaram, 1st floor, Shop No 208,<br>Near Tanishq Showroom, Line Bazar,
            Purnea (Bihar)</p>
        <p><strong>GST No:</strong> 10CNPCA1183R1Z6</p>
        <p><strong>Phone:</strong> 7763972896</p>
        <p><strong>Email:</strong> kidzfunstation@gmail.com</p>
        <hr>
        <?php
        if (isset($_GET['recipt'])) {
            $time = $_GET['recipt'];
            $call_user = mysqli_query($connect, "SELECT * FROM session JOIN kids ON session.kids_id = kids.id WHERE session.check_in_time='$time'  ");
            $user_detail = mysqli_fetch_assoc($call_user);
            $gst = $user_detail['include_gst']; ?>




            <p><strong>Kid's Name:</strong> <?= $user_detail['kids_name'] ?></p>
            <p><strong>Assigned Hours:</strong> <?= $user_detail['assigned_hours'] ?> Hour</p>
            <p><strong>Check-In Time:</strong> <?= $user_detail['check_in_time'] ?></p>
            <hr>
            <h6>Receipt Details:</h6>
            <?php
            if ($gst == 0) { ?>
                <p>Base Amount : <span class="float-end">₹<?= $user_detail['total_cost'] ?></span></p>
                <p>Discount (30%): <span class="float-end">-₹<?= $user_detail['total_cost'] * 0.30 ?></span></p>
                <hr>
                <p><strong>Total Cost:</strong> <span class="float-end">₹ <?= $user_detail['total_cost'] * 0.70 ?>.00</span></p>
                <hr>

            <?php } else { ?>
                <p>Base Amount (Excl. GST): <span class="float-end">₹<?= $user_detail['total_cost'] * 0.88 ?></span></p>

                <p>CGST (9%): <span class="float-end">₹<?= $user_detail['total_cost'] * 0.09 ?></span></p>
                <p>SGST (9%): <span class="float-end">₹<?= $user_detail['total_cost'] * 0.09 ?></span></p>
                <p>Discount (30%): <span class="float-end">-₹<?= $user_detail['total_cost'] * 0.30 ?></span></p>
                <hr>
                <p><strong>Total Cost:</strong> <span class="float-end">₹ <?= $user_detail['total_cost'] * 0.70 ?>.00</span></p>
                <hr>
            <?php } ?>
        <?php } ?>
        <p class="text-center">Thank you for visiting Kidz FunStation!<br>Visit Again!</p>
        <div class="btn-group">
            <button class="btn btn-pink" onclick="window.print()">Print Receipt</button>
            <button class="btn btn-dark" onclick="history.back()">Go Back</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>