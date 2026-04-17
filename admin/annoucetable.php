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
            <h1 class="m-0 text-center"><B>ANNOUNCEMENT DETAILS</B></h1>
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
                <h3 class="card-title">File Details</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-success" onclick="window.location.href='announcement.php'">Add New Annoucement</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Heading</th>
      <th>Announcement News</th>
      <th>Image</th>
      <th>Action</th>
      <th>Status</th>
    </tr>
  </thead>

  <tbody>
    <?php
    $announceResult = mysqli_query($conn, "SELECT * FROM announcement_db");

    while ($announce = mysqli_fetch_assoc($announceResult)) {

        $id = $announce['id'];
        $heading = $announce['header'];
        $announcement = $announce['annouce'];
        $image = $announce['image_name']; // ✅ fixed column
    ?>
    
    <tr>
      <td><?= htmlspecialchars($heading); ?></td>
      <td><?= htmlspecialchars($announcement); ?></td>

      <!-- IMAGE -->
      <td>
        <?php if (!empty($image)) { ?>
          <img src="../assets/images/announce/<?= $image; ?>" width="80">
        <?php } else { ?>
          No Image
        <?php } ?>
      </td>

      <!-- ACTION -->
      <td>
        <a href="update_annonce.php?id=<?= $id; ?>" class="btn btn-primary btn-sm">Update</a>
        <a href="deleteannonce.php?id=<?= $id; ?>" 
           class="btn btn-danger btn-sm"
           onclick="return confirm('Are you sure you want to delete this record?');">
           Delete
        </a>
      </td>

      <!-- STATUS -->
      <td>
        <?php if ($announce['is_active'] == 1) { ?>
          <span class="btn btn-success btn-sm">Active</span>
        <?php } else { ?>
          <span class="btn btn-danger btn-sm">Inactive</span>
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
