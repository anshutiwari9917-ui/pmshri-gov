<?php
include("conn.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = mysqli_query($conn, "SELECT * FROM news_db WHERE id = $id");
    $image = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {

    $id = intval($_POST['id']);
    $newshead = $_POST['newshead'];
    $news = $_POST['news'];

    $fileName = $_FILES['filename']['name'] ?? '';
    $fileTmp = $_FILES['filename']['tmp_name'] ?? '';
    $fileType = $_FILES['filename']['type'] ?? '';
    $fileSize = $_FILES['filename']['size'] ?? '';

    // If image uploaded
    if (!empty($fileName)) {

        $uploadDir = 'images/';
        $uploadPath = $uploadDir . basename($fileName);
        move_uploaded_file($fileTmp, $uploadPath);

        $stmt = $conn->prepare("UPDATE news_db 
            SET news_head=?, news=?, image_name=?, image_type=?, image_size=? 
            WHERE id=?");

        $stmt->bind_param("ssssii", $newshead, $news, $fileName, $fileType, $fileSize, $id);

    } else {
        // Only update text
        $stmt = $conn->prepare("UPDATE news_db 
            SET news_head=?, news=? 
            WHERE id=?");

        $stmt->bind_param("ssi", $newshead, $news, $id);
    }

    if ($stmt->execute()) {
        echo "<script>alert('Updated'); window.location.href='news_table.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
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
            <h1 class="m-0 text-center">UPDATE NEWS IMAGE</h1>
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
                <h3 class="card-title">Update</h3>
              </div>
              <form method="POST" action="" enctype="multipart/form-data">
                  
              <div class="card-body">
                  
<input type="hidden" name="id" value="<?= $image['id']; ?>">
              <div class="form-group">
                  <label for="filename">Filename</label>
                  <input type="file" name="filename" value="<?= htmlspecialchars($image['image_name']); ?>" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="newshead">News Head</label>
                  <input type="text" name="newshead" class="form-control" value="<?= htmlspecialchars($image['news_head']); ?>" required>
                </div>
                <div class="form-group">
                  <label for="news">News</label>
                  <input type="text" name="news" class="form-control" value="<?= htmlspecialchars($image['news']); ?>" required>
                </div>
                <div class="form-group">
                  <label for="filetype">Current Filetype</label>
                  <input type="text" class="form-control" value="<?= htmlspecialchars($image['image_type']); ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="filesize">Current Filesize</label>
                  <input type="text" class="form-control" value="<?= htmlspecialchars($image['image_size']); ?>" disabled>
                </div>
</div>
<div class="card-footer">
                <button type="submit" name="update" class="btn btn-success">Update</button>
                <a href="news_table.php" class="btn btn-secondary">Cancel</a>
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
