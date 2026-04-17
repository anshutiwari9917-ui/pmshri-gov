<?php
include("conn.php");
session_start();

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM user_admin WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("location:admin.php");
    exit();
}

/* FETCH DATA */
if (isset($_GET['id'])) {
    $edit_id = intval($_GET['id']);
    $res = mysqli_query($conn, "SELECT * FROM announcement_db WHERE id = $edit_id");
    $announce = mysqli_fetch_assoc($res);
} else {
    header("location: annoucetable.php");
    exit();
}

/* UPDATE */
if (isset($_POST["submit"])) {

    $id = intval($_POST['id']);
    $heading = trim($_POST['header']);
    $annoucenews = trim($_POST['announcement']);

    if (empty($heading) || empty($annoucenews)) {
        die("All fields are required");
    }

    $uploadDir = "../assets/images/announce/";

    // IMAGE UPDATE
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $filename = $_FILES['image']['name'];
        $filesize = $_FILES['image']['size'];
        $filetype = mime_content_type($_FILES['image']['tmp_name']);
        $tmp = $_FILES['image']['tmp_name'];

        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $newFileName = time() . "_" . uniqid() . "." . $ext;

        if (move_uploaded_file($tmp, $uploadDir . $newFileName)) {

            $stmt = $conn->prepare("UPDATE announcement_db 
                SET annouce=?, header=?, image_name=?, image_size=?, image_type=? 
                WHERE id=?");

            $stmt->bind_param("sssisi", $annoucenews, $heading, $newFileName, $filesize, $filetype, $id);

        } else {
            die("File upload failed");
        }

    } else {

        // NO IMAGE UPDATE
        $stmt = $conn->prepare("UPDATE announcement_db 
            SET annouce=?, header=? 
            WHERE id=?");

        $stmt->bind_param("ssi", $annoucenews, $heading, $id);
    }

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
              <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                <!-- Card Body -->
                <div class="card-body">
                    <input type="hidden" name="id" value="<?= $announce['id']; ?>">
                  <div class="form-group">
                    <label for="header">Announce Header</label>
                    <input type="text" name="header" class="form-control" id="header" placeholder="Enter header..." value="<?= htmlspecialchars($announce['header']); ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="announcement">Announcement</label>
                    <input type="text" name="announcement" class="form-control" id="announcement" placeholder="Enter announcement..." value="<?= htmlspecialchars($announce['annouce']); ?>" required>
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
