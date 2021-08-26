<?php 
session_start();
?>

    <fieldset style="width:40%;text-align: center;margin-left: 420;">
    <legend>ADMIN</legend>
    <?php 
        if(isset($_SESSION['username'])){
            echo "<h1> Welcome ".$_SESSION['username']."!</h1>";
        }
       ?>
    <p>Welcome to Admin Dashboard!</p>
    <a href="viewAdmin.php">Admin Profile</a>
    <br>
    <a href=" ">Volunteer Profile</a>
    <br>
    <a href="">User Profile</a>
    <br>
    <a href=" ">Donor Profile</a>
    <br>
    <a href=" ">Total Donation</a>
    <br>
    <a href=" ">Planted Trees</a>
    <br>
    <a href="Logout.php">Logout</a>
    </fieldset>

