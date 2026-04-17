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

// Fetch existing achievement details for the provided ID
if (isset($_GET['id'])) {
    $achievement_id = intval($_GET['id']);
    $query = "SELECT * FROM achievement_db WHERE id = $achievement_id";
    $achievement_result = mysqli_query($conn, $query);

    if ($achievement_result && mysqli_num_rows($achievement_result) > 0) {
        $achievement_data = mysqli_fetch_assoc($achievement_result);
    } else {
        echo "<script>alert('Achievement not found!'); window.location.href='achievtable.php';</script>";
        exit;
    }
} else {
    header("location:achievtable.php");
    exit;
}

// Update the achievement in the database
if (isset($_POST["submit"])) {
    $heading = mysqli_real_escape_string($conn, $_POST['header']);
    $achievements = mysqli_real_escape_string($conn, $_POST['achieve']);

    $update_query = "UPDATE achievement_db SET header = '$heading', achieve = '$achievements' WHERE id = $achievement_id";
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Achievement updated successfully!'); window.location.href='achievtable.php';</script>";
    } else {
        echo "Error updating achievement: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Achievement</title>
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
            <h1 class="m-0 text-center"><b>UPDATE ACHIEVEMENT</b></h1>
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
            <!-- Update Achievement Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Achievement</h3>
              </div>
              <form class="form-horizontal" method="POST" action="">
                <!-- Card Body -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="header">Achievement Heading</label>
                    <input type="text" name="header" class="form-control" id="header" placeholder="Enter heading..." value="<?= htmlspecialchars($achievement_data['header']); ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="achieve">Achievement</label>
                    <input type="text" name="achieve" class="form-control" id="achieve" placeholder="Enter achievement..." value="<?= htmlspecialchars($achievement_data['achieve']); ?>" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <!-- Card Footer -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-info">Update</button>
                  <a href="achievtable.php" class="btn btn-secondary">Cancel</a>
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
<?php include("alljs.php"); ?>
</body>
</html>
