<?php include_once "../config/dbconnect.php";
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['admin_username'])) {
    echo "<script>window.location.href='login.php';</script>";
    // exit; 
}

?>

<style>
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

<div class="col-md-2 sidebar text-left">
    <a href="index.php" style="padding: 0;"><img src="../image/images.jpg" alt="Logo"></a>
    <a href="index.php"><i class="bi bi-database-dash me-1"></i>Dashboard</a>
    <a href="add_session.php"><i class="bi bi-person-plus-fill me-1"></i>Add Session</a>
    <a href="manage_checkout.php"><i class="bi bi-journal-text me-1"></i>Manage Checkouts</a>
    <a href="setting.php"><i class="bi bi-sliders me-1"></i>Settings</a>
    <a href="logout.php"><i class="bi bi-box-arrow-right me-1"></i>Logout</a>
    <p class="mt-5" style="font-size: 12px;">Powered by <strong>Comestro</strong></p>
</div>
