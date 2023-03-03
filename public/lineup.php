<?php 
      require_once ('header.php');
      require_once ('../src/databaseFunctions.php');
    
      $lineup = db_getData("SELECT * FROM lineup");

?>
    <div class="page lineup">
        <div class="container">
            <h1>Line-up</h1>
            <div class="artists">
            <?php
         while ($artist = mysqli_fetch_assoc($lineup)) {
            echo '<div class="artist"> <img src="' . IMAGE_FOLDER . "/" . $artist['artistImage'] . '" alt="">
                <h2>' . $artist['artistName'] . '</h2>
            </div>';
        }
        ?>
            </div>
        </div>
    </div>
    <?php 
     require_once ('footer.php');?>
      