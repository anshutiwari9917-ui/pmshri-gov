<?php
include("conn.php");

// Ensure user is authenticated
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM user_admin WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("location:admin.php");
    exit;
}

// Fetch existing announcement details for the provided ID
if (isset($_GET['id'])) {
    $announcement_id = intval($_GET['id']);
    $query = "SELECT * FROM announcement_db WHERE id = $announcement_id";
    $announcement_result = mysqli_query($conn, $query);

    if ($announcement_result && mysqli_num_rows($announcement_result) > 0) {
        $announcement_data = mysqli_fetch_assoc($announcement_result);
    } else {
        echo "<script>alert('Announcement not found!'); window.location.href='annoucetable.php';</script>";
        exit;
    }
} else {
    header("location:annoucetable.php");
    exit;
}

// Update the announcement in the database
if (isset($_POST["submit"])) {
    $heading = mysqli_real_escape_string($conn, $_POST['header']);
    $announcement_news = mysqli_real_escape_string($conn, $_POST['announcement']);

    $update_query = "UPDATE announcement_db SET header = '$heading', annouce = '$announcement_news' WHERE id = $announcement_id";
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Announcement updated successfully!'); window.location.href='annoucetable.php';</script>";
    } else {
        echo "Error updating announcement: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Announcement</title>
  <?php include("allcss.php"); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php include("header.php"); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include("sidebar.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-center"><b>UPDATE ANNOUNCEMENT</b></h1>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <!-- Update Announcement Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Update Announcement</h3>
              </div>
              <form class="form-horizontal" method="POST" action="">
                <!-- Card Body -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="header">Announce Header</label>
                    <input type="text" name="header" class="form-control" id="header" placeholder="Enter header..." value="<?= htmlspecialchars($announcement_data['header']); ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="announcement">Announcement</label>
                    <input type="text" name="announcement" class="form-control" id="announcement" placeholder="Enter announcement..." value="<?= htmlspecialchars($announcement_data['annouce']); ?>" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <!-- Card Footer -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-info">Update</button>
                  <a href="annoucetable.php" class="btn btn-secondary">Cancel</a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("footer.php"); ?>
</div>
<!-- ./wrapper -->
<?php include("alljs.php");?>
</body>
</html>
