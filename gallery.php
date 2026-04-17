<?php
include("conn.php");
include("databse.php");
?>

<?php include("header.php"); ?>
<div class="wpo-breadcumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>School Gallery</h2>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><span>Gallery</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of wpo-breadcumb-section-->
        <!-- wpo-room-area-start -->
        <div class="wpo-room-area section-bg section-padding">
            <div class="container">
                <div class="room-wrap">
                    <div class="row">
                    <?php foreach ($gallery as $image): ?>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="room-item">
                                <div class="room-img">
                                    <img src="assets/images/<?php echo $image['imagename']; ?>" alt="image">
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- .room-area-start -->
       <!-- start of wpo-site-footer-section -->
       <?php include "footer.php" ?>
    <!-- end of wpo-site-footer-section -->

        
    </div>
    <!-- end of page-wrapper -->

    <!-- All JavaScript files
    ================================================== -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Plugins for this template -->
    <script src="assets/js/modernizr.custom.js"></script>
    <script src="assets/js/jquery.dlmenu.js"></script>
    <script src="assets/js/jquery-plugin-collection.js"></script>
    <!-- Custom script for this template -->
    <script src="assets/js/script.js"></script>
</body>


<!-- Mirrored from wpocean.com/html/tf/parador/room.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2024 06:21:27 GMT -->
</html>

<style>
 <?php include("style.css");?>
</style>