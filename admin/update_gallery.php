<?php
include("conn.php"); // Include your database connection file

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM user_admin WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("location:admin.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Fetch image details from the database
    $query = "SELECT * FROM gallery_db WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $image = mysqli_fetch_assoc($result);
    } else {
        echo "No record found!";
        exit;
    }
}

if (isset($_POST['update']) && isset($_FILES['filename'])) {
    $filename = $_FILES['filename']['name'];
    $filesize = $_FILES['filename']['size'];
    $filetype = $_FILES['filename']['type'];
    $filetmp = $_FILES['filename']['tmp_name'];

    // Move the uploaded file to the images directory
    if (move_uploaded_file($filetmp, "images/" . $filename)) {
        // Update the record in the database
        $query = "UPDATE gallery_db SET imagename = '$filename', imagetype = '$filetype', imagesize = '$filesize' WHERE id = $id";
        if (mysqli_query($conn, $query)) {
            header("Location: gallerytable.php"); // Redirect to the gallery table page
            exit;
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        echo "Error uploading file.";
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
  <?php include("header.php"); ?>
  <?php include("sidebar.php"); ?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-center">STATIC IMAGE UPDATE</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Image</h3>
              </div>
              <form method="POST" action="" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="filename">Filename</label>
                  <input type="file" name="filename" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="filetype">Current Filetype</label>
                  <input type="text" class="form-control" value="<?= htmlspecialchars($image['imagetype']); ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="filesize">Current Filesize</label>
                  <input type="text" class="form-control" value="<?= htmlspecialchars($image['imagesize']); ?>" disabled>
                </div>
</div>
<div class="card-footer text-center">
                  <button type="submit" name="update" class="btn btn-success">Update</button>
                  <a href="gallerytable.php" class="btn btn-secondary">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include("footer.php"); ?>
  </div>
  <?php include("alljs.php"); ?>
</body>
</html>
