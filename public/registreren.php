<?php 
require_once ('header.php'); 
require_once ('userFunctions.php');  
$newUser = null;
if (isset($_POST['register'])) 
{
    $newUser = registerUser($_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['password']);
}

?>
    <div class="page registreren">
        <div class="container">
            <h1>Registreren</h1>
            <?php if ($newUser === 1){
            ?>
            <p>Nieuwe gebruiker succesvol toegevoegd!</p> 
            <?php }else{?>

           <div class="inputRow">
           <form action='#' method='POST'>
                <label for="firstName">Voornaam</label>
               <input type="text" name="firstname">
               <br><br>
               <label for="lastname">Achternaam</label>
               <input type="text" name="lastname">
               <br><br>
               <label for="Email">Email</label>
               <input type="email" name="email">
                <br><br>
               <label for="password">Wachtwoord</label>
               <input type="password" name="password">
               <br><br>
               <input type="submit" name="register" value="Registreer">

</form>
           <?php }?>
        </div>
    </div>
    
    <?php require_once ('footer.php'); 
    ?>