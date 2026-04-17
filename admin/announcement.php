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

    $heading = trim($_POST['header']);
    $annoucenews = trim($_POST['announcement']);

    // Validate inputs
    if (empty($heading) || empty($annoucenews)) {
        die("All fields are required");
    }

    // File upload handling
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

        $uploadDir = "images/assets/announce/";
        $filename = $_FILES['image']['name'];
        $filesize = $_FILES['image']['size'];
        $filetype = mime_content_type($_FILES['image']['tmp_name']);
        $filentmp = $_FILES['image']['tmp_name'];

        // Generate unique filename
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $newFileName = time() . "_" . uniqid() . "." . $ext;

        // Allowed types
        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];

        if (!in_array($filetype, $allowedTypes)) {
            die("Invalid file type");
        }

        if ($filesize > 2 * 1024 * 1024) { // 2MB limit
            die("File too large");
        }

        if (!move_uploaded_file($filentmp, $uploadDir . $newFileName)) {
            die("File upload failed");
        }

    } else {
        $newFileName = NULL;
        $filesize = NULL;
        $filetype = NULL;
    }

    // Prepared statement (secure)
    $stmt = $conn->prepare("INSERT INTO announcement_db (annouce, header, image_name, image_size, image_type) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssds", $annoucenews, $heading, $newFileName, $filesize, $filetype);

    if ($stmt->execute()) {
        header("Location: annoucetable.php");
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
            <h1 class="m-0 text-center "><b>ADD ANNOUNCEMENT</b></h1>
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
                <h3 class="card-title">Announcements</h3>
              </div>
      <form class="form-horizontal" method="POST" action=""> 
        <!-- start card body -->
                <div class="card-body">
                  <div class="form-group ">
                      <div class= "col-sm-12">
                  <div class="col-sm-6">
                    <label for="inputEmail3" class="col-sm-6 col-form-label">Announce Header </label>
                    <input type="text" name="header" class="form-control" id="text1" placeholder="Enter header....">
                    </div>
                  <div class="col-sm-6">
                    <label for="inputEmail3" class="col-sm-6 col-form-label">Announcement </label>
                    <input type="text" name="announcement" class="form-control" id="text2" placeholder="Enter annoucement....">
                    </div>
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
