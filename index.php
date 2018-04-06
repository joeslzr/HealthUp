<?php
    include_once 'header.php';
?>

<section class ="main-container">
    <div class="main-wrapper">
        <?php
            if(isset($_SESSION['u_uid'])){
				$firstname = $_SESSION['u_first'];
				$lastname = $_SESSION['u_last'];
                echo "<h2>Welcome $firstname $lastname!</h2>";
            }
            else{
                echo '<h2>Please Login or Signup</h2>';
            }
        ?>
    </div>
</section>

<?php
    include_once 'footer.php';
?>