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
if (isset($_POST["submit"])) {

    $events = trim($_POST['event']);
    $heading = trim($_POST['header']);

    if (empty($heading) || empty($events)) {
        die("All fields are required");
    }

    $uploadDir = "../images/event/";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

        $filename = $_FILES['image']['name'];
        $filesize = $_FILES['image']['size'];
        $filetype = mime_content_type($_FILES['image']['tmp_name']);
        $filentmp = $_FILES['image']['tmp_name'];

        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
        $allowedExt = ['jpg','jpeg','png','webp'];

        if (!in_array($filetype, $allowedTypes) || !in_array($ext, $allowedExt)) {
            die("Invalid file type");
        }

        if ($filesize > 2 * 1024 * 1024) {
            die("File too large");
        }

        $newFileName = uniqid("event_", true) . "." . $ext;

        if (!move_uploaded_file($filentmp, $uploadDir . $newFileName)) {
            die("File upload failed");
        }

    } else {
        $newFileName = "";
        $filesize = 0;
        $filetype = "";
    }

    $stmt = $conn->prepare("INSERT INTO event_db (event, header, image_name, image_size, image_type) VALUES (?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssis", $events, $heading, $newFileName, $filesize, $filetype);

    if ($stmt->execute()) {
        header("Location: eventable.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
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
            <h1 class="m-0 text-center "><b>ADD EVENTS</b></h1>
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
                <h3 class="card-title">Event</h3>
              </div>
      <form class="form-horizontal" method="POST" action=""> 
        <!-- start card body -->
                <div class="card-body">
                  <div class="form-group ">
                  <div class="col-sm-12">
                    <label for="event" class="col-sm-2 col-form-label">News Heading </label>
                    <input type="text" name="header" class="form-control" id="text1" placeholder="Enter Event News....">
                    </div>
                  <div class="col-sm-12">
                    <label for="event" class="col-sm-2 col-form-label">Event News </label>
                    <input type="text" name="event" class="form-control" id="text1" placeholder="Enter Event....">
                    </div>
                      <div class="row">
                          <div class="col-sm-12">
                               <label for="exampleInputFile">Select Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" name="image" id="exampleInputFile">
                      </div>
                    </div>
</div>                        
                        
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
