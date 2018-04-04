<?php
    include_once 'header.php';
?>

<section class ="main-container">
    <div class="main-wrapper">
        <?php
            if(isset($_SESSION['u_uid'])){
                echo '<h2>Nutrition Plan</h2>';
            }
            else{
                echo '<h2>Please Login</h2>';
            }
        ?>
    </div>
</section>

<?php
    include_once 'footer.php';
?>