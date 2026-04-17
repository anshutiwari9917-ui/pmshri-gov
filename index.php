<?php
include("conn.php");
include("databse.php");
?>

<?php include("header.php"); ?>
<?php

if (isset($_POST['submit'])) {
    $name  = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $query = mysqli_real_escape_string($conn, $_POST['query']);

    $sql = "INSERT INTO contact_form (name, phone, query) 
            VALUES ('$name', '$phone', '$query')";

    mysqli_query($conn, $sql);
}
?>

<section class="wpo-hero-slider">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php
            if ($result) {
                
                while ($data = mysqli_fetch_assoc($result)) {
                
                    echo '<div class="swiper-slide">';
                    echo '<div class="slide-inner slide-bg-image" style="background-image: url(\'admin/images/' . htmlspecialchars($data['filename']) . '\');">';
                    echo '<!-- <div class="gradient-overlay"></div> -->';
                    echo '</div> <!-- end slide-inner -->';
                    echo '</div> <!-- end swiper-slide -->';
                }
            } else {
                echo '<p>No images found</p>';
            }
            ?>
        </div> <!-- end swiper-wrapper -->

        <!-- Swiper controls -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

<?php
// Close connection
$conn->close();
?>
        <!-- end of wpo-hero-slide-section-->
         <br>
         <br>
         <!--content-->
         

             <!-- wpo-destination-area-start -->
        <div class="wpo-destination-area">
            <div class="container">
                <div class="destination-wrap">
                    <div class="row event">
                    <div class="col-lg-4 col-md-6 col-12">
                    <div class="achievement-section">
    <h2>
        <img src="assets/images/annouc.webp" alt="Achiever Icon" class="img">
        Announcements
    </h2>
    <div class="announcement-carousel-wrapper">
       <div class="announcement-carousel">
<?php
if ($announce->num_rows > 0) {
    while ($row = $announce->fetch_assoc()) {
        $img = !empty($row["image_name"]) ? 'assets/images/announce/'.$row["image_name"] : '';
        
        echo '<div class="announcement-item" data-img="'.$img.'">';
        echo '<h3>' . htmlspecialchars($row["header"]) . '</h3>';
        echo '<p>' . htmlspecialchars($row["annouce"]) . '</p>';
        echo '</div>';
    }
} else {
    echo '<p>No announcements available.</p>';
}
?>
</div>
<div id="imgModal" class="img-modal">
    <span class="close-btn">&times;</span>
    <img class="modal-content" id="modalImg">
</div>

    </div>
</div>
</div>

<div class="col-lg-4 col-md-6 col-12">
    <div class="achievement-section">
        <h2>
            <img src="assets/images/achiever.webp" alt="Achiever Icon" class="img" >
            Achievement
        </h2>
        <div class="announcement-carousel-wrapper">
        <div class="announcement-carousel">
            <?php
            if ($achieve->num_rows > 0) {
                while ($row = $achieve->fetch_assoc()) {
                    echo '<div class="announcement-item">';
                    echo '<h3>' . htmlspecialchars($row["header"]) . '</h3>';
                    echo '<p>' . htmlspecialchars($row["achieve"]) . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No achievement available.</p>';
            }
            ?>
        </div>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-6 col-12">
    <div class="achievement-section">
        <h2>
            <img src="assets/images/event.webp" class="img" alt="Achiever Icon">
            Events
        </h2>
        <div class="announcement-carousel-wrapper">
        <div class="announcement-carousel">
            <?php
            if ($event->num_rows > 0) {
                while ($row = $event->fetch_assoc()) {
                    echo '<div class="announcement-item">';
                    echo '<h3>' . htmlspecialchars($row["header"]) . '</h3>';
                    echo '<p>' . htmlspecialchars($row["event"]) . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No events available.</p>';
            }
            ?>
        </div>
        </div>
    </div>
</div>

                    </div>
                </div>
            </div>
        </div>
        <section class="wpo-pricing-section section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="wpo-section-title-s2">
                    <img src="assets/images/logo3.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="wpo-pricing-wrap">
            <div class="row event">
                <?php foreach ($fixed as $image): ?>
                    <div class="col col-lg-4 col-md-6 col-12">
                        <div class="wpo-pricing-item">
                            <div class="wpo-pricing-top">
                                <div class="wpo-pricing-img">
                                    <img src="../admin/images/fixed/<?php echo $image['imagename']; ?>" alt="image">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

        <!-- end wpo-fun-fact-section -->
       
        <section class="wpo-blog-section section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="wpo-section-title-s2">
                    <h2>Latest News</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page.</p>
                </div>
            </div>
        </div>

        <!-- Swiper -->
        <div class="swiper myNewsSlider">
            <div class="swiper-wrapper">

                <?php foreach ($news as $content): ?>
                <div class="swiper-slide">
                    <div class="wpo-blog-item">
                        <div class="wpo-blog-img">
                            <img src="admin/images/<?php echo $content['image_name']; ?>" alt="news image">
                        </div>
                        <div class="wpo-blog-content">
                            <div class="wpo-blog-content-top">
                                <div class="b-top">
                                    <div class="b-top-inner">
                                        <h2>
                                            <a href="blog.html"><?php echo $content['news_head']; ?></a>
                                        </h2>
                                        <p><?php echo substr($content['news'], 0, 100); ?>...</p>
                                    </div>
                                </div>
                                <a class="b-btn" href="blog.html">Read More..</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>

            <!-- Navigation -->
         
            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>



 <section class="wpo-form-section section-padding contact-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">

                <div class="contact-card">
                    <div class="wpo-section-title-s2 text-center mb-4">
                        <h2>Contact School Related Queries</h2>
                       
                    </div>

                    <form method="post" action="" class="contact-form">
                        
                        <div class="form-group mb-3">
                            <input type="text" name="name" placeholder="Enter your name......." required>
                            <label>Your Name</label>
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" name="phone" placeholder="Enter your phone number......" pattern="[0-9]{10}" required>
                            <label>Phone Number</label>
                        </div>

                        <div class="form-group mb-3">
                            <textarea name="query" rows="4" placeholder="Enter your queries........" required></textarea>
                            <label>Your Query</label>
                        </div>

                        <button type="submit" name="submit" class="submit-btn">
                            Send Message
                        </button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</section>


        
        <!-- end wpo-blog-section -->
        <!-- start wpo-newslatter-section -->
        <section class="wpo-newslatter-section section-padding">
            <div class="n-shape">
                <img src="assets/images/nshape1.png" alt="">
            </div>
            <div class="n-shape2">
                <img src="assets/images/nshape2.png" alt="">
            </div>
        </section>
        <!-- end wpo-newslatter-section -->
        <!-- start of wpo-site-footer-section -->
       <?php include ("footer.php");?>
        <!-- end of wpo-site-footer-section -->

    </div>
    <!-- end of page-wrapper -->

    <!-- All JavaScript files
    ================================================== -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Plugins for this template -->
    <script src="assets/js/modernizr.custom.js"></script>
    <script src="assets/js/jquery-plugin-collection.js"></script>
    <!-- Custom script for this template -->
    <script src="assets/js/script.js"></script>
   

</body>

</html>

<style>
 <?php include("style.css");?>
</style>
<script>
    <?php include("script.js");?>
</script>