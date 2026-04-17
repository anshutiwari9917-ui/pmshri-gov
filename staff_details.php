<?php
include("conn.php");
include("databse.php");
?>

<?php include("header.php"); ?>
	

<table class="styled-table">
    <thead>
      <tr>
        <th>SL No</th>
        <th>Name</th>
        <th>Designation</th>
        <th>Qualification</th>
      </tr>
    </thead>
     <tbody>
      <tr><td>1</td><td>Mr. SUBODH CHANDRA SEMWAL</td><td>PRINCIPAL</td><td>M.Sc.(CHEMISTRY) B.Ed.</td></tr>
      <tr><td>2</td><td>Mr. RAMESH CHANDRA</td><td>PGT</td><td>M.Sc.(PHYSICS) B.Ed.</td></tr>
      <tr><td>3</td><td>Mr. DILBAR SINGH</td><td>PGT</td><td>M.A.(HINDI) B.Ed.</td></tr>
      <tr><td>4</td><td>Mr. DIGAMBAR SINGH</td><td>PGT</td><td>M.A.(ECONOMICS) B.Ed.</td></tr>
      <tr><td>5</td><td>Mr. DINESH SINGH NEGI</td><td>PGT</td><td>M.Sc.(ENGLISH) B.Ed.</td></tr>
      <tr><td>6</td><td>Mr. SUBHASH SEMWAL</td><td>PGT</td><td>M.Sc.(MATHS) B.Ed.</td></tr>
      <tr><td>7</td><td>Mrs. RADHA DEVI</td><td>PGT</td><td>M.Sc.(BOTANY) B.Ed.</td></tr>
      <tr><td>8</td><td>Mr. KALAM SINGH NEGI</td><td>TGT</td><td>M.A.(GEOGRAPHY) B.Ed.</td></tr>
      <tr><td>9</td><td>Mr. MAHESH KUMAR CHAUHAN</td><td>TGT</td><td>M.A.(SANSKRIT) B.Ed.</td></tr>
      <tr><td>10</td><td>Mr. RAGHUNATH CHANDRA</td><td>TGT</td><td>M.Sc.(MATHS) B.Ed.</td></tr>
      <tr><td>11</td><td>Mr. PANKAJ BHATT</td><td>TGT</td><td>M.Sc.(MATHS) B.Ed.</td></tr>
      <tr><td>12</td><td>Mr. ARVIND KUMAR GAIROLA</td><td>TGT</td><td>M.Sc.(MATHS) B.Ed.</td></tr>
      <tr><td>13</td><td>Mr. TEERTH PRASAD SAJWAN</td><td>TGT</td><td>B.Sc. B.Ed.</td></tr>
      <tr><td>14</td><td>Mr. UMESH CHANDRA PUROHIT</td><td>TGT</td><td>M.A.(HINDI) B.Ed.</td></tr>
      <tr><td>15</td><td>Mr. MANBER SINGH NEGI</td><td>TGT</td><td>M.Sc.(ENGLISH) B.Ed.</td></tr>
      <tr><td>16</td><td>Miss. REENA</td><td>TGT</td><td>M.A.(HINDI) B.Ed.</td></tr>
      <tr><td>17</td><td>Mr. ANIL CHANDRA</td><td>TGT</td><td>M.P.ED.</td></tr>
      <tr><td>18</td><td>Mr. SOURABH SINGH NEGI</td><td>TGT (IT INSTRUCTOR)</td><td>DIPLOMA IN CS</td></tr>
      <tr><td>19</td><td>Mrs. SEEMA SATI</td><td>TGT (YOGA INSTRUCTOR)</td><td>M.A. YOGA</td></tr>
      <tr><td>20</td><td>Mrs. DEEKSHA TIWARI</td><td>LAB ASSISTANT</td><td>M.A. B.Ed.</td></tr>
      <tr><td>21</td><td>Mr. PREM BALLAV SIRSWAL</td><td>SENIOR ADMINISTRATIVE OFFICER</td><td>—</td></tr>
      <tr><td>22</td><td>Mr. KULDEEP SINGH RAOLA</td><td>JR. ASSIST.</td><td>—</td></tr>
      <tr><td>23</td><td>Mr. BASUDEV SINGH RAWAT</td><td>PEON</td><td>—</td></tr>
      <tr><td>24</td><td>Mr. KAILASH CHANDRA</td><td>PEON</td><td>—</td></tr>
    </tbody>
  </table>
        <!-- end wpo-newslatter-section -->
        <!-- start of wpo-site-footer-section -->
       <?php include ("footer.php");?>
        <!-- end of wpo-site-footer-section -->


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

    .styled-table {
        border-collapse: collapse;
        margin: 144px 0px 20px;
        font-size: 16px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        min-width: 800px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        width: 100%;
        text-align: center;
    }
    .styled-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: center;
    }
    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
        border: 1px solid #ddd;
    }
    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }
    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }
    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }

</style>