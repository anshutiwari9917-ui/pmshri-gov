<?php
include("conn.php");
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM user_admin WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("location:admin.php");
}
?>
<!-- annoce store in db -->
<?php
if (isset($_POST["submit"]))
{
    $achievements = $_POST['achieve'];
    $heading = $_POST['header'];

    $query = "INSERT INTO achievement_db (achieve,header) VALUES ('$achievements','$heading')";
    $data = mysqli_query($conn,$query);
    header("location:achievtable.php");
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
            <h1 class="m-0 text-center "><b>ADD ACHIEVEMENT</b></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-10">
            <!-- general form elements -->
            <!-- /.card -->
            <!-- Horizontal Form -->
           <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Achievement</h3>
              </div>
      <form class="form-horizontal" method="POST" action=""> 
        <!-- start card body -->
                <div class="card-body">
                  <div class="form-group ">
                  <div class="col-sm-12">
                    <label for="achieve" class="col-sm-2 col-form-label">Achievement Heading</label>
                    <input type="text" name="header" class="form-control" id="text1" placeholder="Enter heading....">
                    </div>
                    <div class="col-sm-12">
                    <label for="achieve" class="col-sm-2 col-form-label">Achievement </label>
                    <input type="text" name="achieve" class="form-control" id="text2" placeholder="Enter achievements....">
                    </div>
                  </div>
                </div>
                <!-- end.card-body -->
                <div class="card-footer text-center">
                  <button type="submit" name="submit" class="btn btn-info">Submit</button>
                </div>
                <!-- card-footer  -->
               </form> 
            </div> 
            <!-- /.card -->

          </div>
        </div>
        <!- /.row -->
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
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
