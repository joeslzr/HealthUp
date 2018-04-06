<?php
    include_once 'header.php';
    include_once 'includes/dbh.inc.php'
?>

<section class ="main-container">
    <div class="main-wrapper">
        <?php
            if(isset($_SESSION['u_uid'])){
				$firstname = $_SESSION['u_first'];
                $id = $_SESSION['u_id'];
				$sql = "SELECT * FROM workoutroutine WHERE UserID = $id";
                $result = mysqli_query($conn,$sql) or die("Bad Query: $sql");
                
                echo "<h2>$firstname's Workout Routine's</h2>";
                
                echo '<form id="form" action="" method="post">';
                echo '<select name="workout" class="ddList">';
                echo "<option value='default'>Please Select a Plan</option>";
                echo "<option value='new'>Create New</option>";
                while($row = mysqli_fetch_assoc($result)){
                    $rowname = $row['Name'];
                    $rowvalue = $row['WorkoutID'];
                    echo "<option value='$rowvalue'>" . $rowname . "</option>";
                }
                echo '</select>';
                echo '<input type="submit" value="Select">';
                echo '</form>';
                
                $value = $_POST['workout'] ?? 'default';
                                
                if($value == "default"){
                }else if($value == "new"){
                    echo "TO BE ADDED.";
                }else{
                    echo "<h2>Workout Details for Plan:</h2>";
                    echo "<h2>$rowname</h2>";
                    echo "<table border='1'>";
                    echo "<tr><td>Excercises</td><td>Targeted Body Part</td><td>Sets</td><td>Reps</td></tr>";
                    $sql = "SELECT e.name, e.bodyPart, c.sets, c.reps FROM `exercise` AS e, `consistsof` AS c WHERE c.UserID = $id AND c.Workout_Id = '$value' AND c.exerciseId = e.ID";
                    $result = mysqli_query($conn,$sql) or die("Bad Query: $sql");
                    while($row = mysqli_fetch_assoc($result)){
                          $name = $row['name'];
                          $bodyPart = $row['bodyPart'];
                          $sets = $row['sets'];
                          $reps = $row['reps'];
                          echo "<tr><td>$name</td><td>$bodyPart</td><td>$sets</td><td>$reps</td></tr>";
                    }
                    echo "</table>";
                }  
            }
            else{
				header("Location: index.php?error=notloggedin");
                //echo '<h2>Please Login</h2>';
            }
        ?>
    </div>
</section>

<?php
    include_once 'footer.php';
?>