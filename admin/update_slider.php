<?php
include("conn.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize input
    $result = mysqli_query($conn, "SELECT * FROM slider_image WHERE id = $id");
    $slider = mysqli_fetch_assoc($result);
}

if (isset($_POST['update']) && isset($_FILES['filename'])) {
    $uploadDir = 'images/'; // Directory to store uploaded files
    $fileTmp = $_FILES['filename']['tmp_name'];
    $fileName = basename($_FILES['filename']['name']);
    $fileType = $_FILES['filename']['type'];
    $fileSize = $_FILES['filename']['size'];
    $uploadPath = $uploadDir . $fileName;

    if (move_uploaded_file($fileTmp, $uploadPath)) {
        // Update the database record
        $stmt = $conn->prepare("UPDATE slider_image SET filename = ?, filetype = ?, filesize = ? WHERE id = ?");
        $stmt->bind_param("sssi", $fileName, $fileType, $fileSize, $id);

        if ($stmt->execute()) {
            echo "<script>alert('Record updated successfully'); window.location.href='slider.php';</script>";
        } else {
            echo "<script>alert('Error updating record: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('File upload failed');</script>";
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
            <h1 class="m-0 text-center">Slider Image</h1>
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
                  <input type="text" class="form-control" value="<?= htmlspecialchars($slider['filetype']); ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="filesize">Current Filesize</label>
                  <input type="text" class="form-control" value="<?= htmlspecialchars($slider['filesize']); ?>" disabled>
                </div>
</div>
<div class="card-footer">
                <button type="submit" name="update" class="btn btn-success">Update</button>
                <a href="table.php" class="btn btn-secondary">Cancel</a>
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
