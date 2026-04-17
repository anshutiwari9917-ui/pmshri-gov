<?php
include("conn.php");
if (!empty($_SESSION["id"])) {
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM user_admin WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
} else {
  header("location:admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Access</title>
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
            <h1 class="m-0 text-center"><B>EVENTS NEWS DETAILS</B></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Event Details</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-success" onclick="window.location.href='event.php'">Add New Event</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>News Heading</th>
                      <th>Event News</th>
                        <th>Image</th>
                      <th>Action</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // Fetch data from the slider_image table
                    $eventResult = mysqli_query($conn, "SELECT * FROM event_db");
                    while ($event= mysqli_fetch_assoc($eventResult)) {
                          $id = $event['id']; // Use correct id for update and delete links
                          $events = $event['event'];
                          $heading = $event['header'];
                            $image = $event['image_name'];
                      ?>
                    <tr>
                    <td><?php echo $heading;?></td>
                        <td><?php echo $events;?></td>
                        <td><?php echo $image;?></td>
                        <td>
                          <a href='update_event.php?id=<?php echo $id;?>' class='btn btn-primary btn-sm'>Update</a>
                          <a href='delete_event.php?id=<?php echo $id;?>' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this file?\");'>Delete</a>
                        </td>
                        <td>
                        <?php
                                    if ($event['is_active'] == '0') { ?>
                                        <a class="btn btn-danger btn-rounded" href="#">Inactive</a>
                                    <?php } if ($event['is_active'] == '1') { ?>
                                        <a class="btn btn-info text-white btn-rounded" href="#">Active</a>
                                    <?php } ?>
                        </td>
                      </tr>
                   <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("footer.php"); ?>
</div>
<!-- ./wrapper -->
<?php include("alljs.php");?>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>
