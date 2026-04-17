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

// Fetch existing event details for the provided ID
if (isset($_GET['id'])) {
    $event_id = intval($_GET['id']);
    $query = "SELECT * FROM event_db WHERE id = $event_id";
    $event_result = mysqli_query($conn, $query);

    if ($event_result && mysqli_num_rows($event_result) > 0) {
        $event_data = mysqli_fetch_assoc($event_result);
    } else {
        echo "<script>alert('Event not found!'); window.location.href='eventable.php';</script>";
        exit;
    }
} else {
    header("location:eventable.php");
    exit;
}

// Update the event in the database
if (isset($_POST["submit"])) {
    $heading = mysqli_real_escape_string($conn, $_POST['header']);
    $events = mysqli_real_escape_string($conn, $_POST['event']);

    $update_query = "UPDATE event_db SET header = '$heading', event = '$events' WHERE id = $event_id";
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Event updated successfully!'); window.location.href='eventable.php';</script>";
    } else {
        echo "Error updating event: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Event</title>
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
            <h1 class="m-0 text-center"><b>UPDATE EVENT</b></h1>
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
            <!-- Update Event Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Event</h3>
              </div>
              <form class="form-horizontal" method="POST" action="">
                <!-- Card Body -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="header">Event Heading</label>
                    <input type="text" name="header" class="form-control" id="header" placeholder="Enter Event News..." value="<?= htmlspecialchars($event_data['header']); ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="event">Event News</label>
                    <input type="text" name="event" class="form-control" id="event" placeholder="Enter Event..." value="<?= htmlspecialchars($event_data['event']); ?>" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <!-- Card Footer -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-info">Update</button>
                  <a href="eventable.php" class="btn btn-secondary">Cancel</a>
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
