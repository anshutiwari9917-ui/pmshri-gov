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
                            <h2>Principal Desk</h2>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><span>Principal</span></li>
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
            <div class="row justify-content-center align-items-center">
                <!-- Principal Image -->
               <div class="col-lg-4 col-md-6 col-12 text-center">
    <div class="principal-card">
        <div class="principal-img">
            <img src="assets/images/20240126_100133.jpg" alt="Principal Image">
        </div>
        <div class="principal-info">
            <h3>Mr. Subodh Chandra Semwal</h3>
            <!--<p>[Principal]</p>-->
        </div>
    </div>
</div>

                <!-- Principal Description -->
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="room-item">
                        <p style="text-align: justify; font-size: 16px; line-height: 1.8;">
                            Welcome to <strong>PM Shri Atal Utkrisht Government Inter College, Guptakashi, Rudraprayag</strong> – a beacon of learning and excellence nestled in the serene Himalayan region of Uttarakhand.
                            <br><br>
                            As the Principal of this esteemed CBSE-affiliated institution, I take immense pride in offering a nurturing environment where academic excellence meets holistic development.
                            <br><br>
                            Alongside our strong academic foundation, we offer a wide range of co-curricular and skill-based programs including <strong>NCC, NSS, Eco Club, Yoga, Physical Education, AI and Robotics, IT education</strong>, and <strong>Art and Craft Education</strong>.
                            <br><br>
                            We are committed to the all-round development of our students, providing them with opportunities to develop leadership, creativity, and technological skills.
                            <br><br>
                            Our school also ensures access to <strong>free education</strong>, <strong>regular free medical checkups</strong>, <strong>free educational tours within the state & also outside the state</strong>, the <strong>MDM Scheme</strong>, and <strong>bilingual instruction in both English and Hindi</strong> to cater to diverse learners.
                            <br><br>
                            At <strong>PM Shri Atal Utkrisht GIC Guptakashi</strong>, we believe in empowering every child with knowledge, values, and the confidence to shape a better tomorrow. Together with parents and the community, we strive to shape the future—one student at a time.
                            <br><br>
                            <strong>- Mr. Subodh Chandra Semwal</strong>
                        </p>
                    </div>
                </div>
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
 .principal-card {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    transition: 0.3s;
}

.principal-card:hover {
    transform: translateY(-5px);
}

.principal-img {
    width: 100%;
    height: 450px;
    overflow: hidden;
    border-radius: 10px;
}

.principal-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.principal-info h3 {
    margin-top: 15px;
    font-size: 20px;
    font-weight: 600;
}

.principal-info p {
    font-style: italic;
    color: #777;
    margin-bottom: 0;
}
</style>