<?php
require_once("./header.php");

require_once('../src/databaseFunctions.php');
require_once('./userFunctions.php');

$tickets = db_getData("SELECT * FROM tickets");

$user = null;
if (isset($_POST['login'])) {
    $user = getUser($_POST['email'], $_POST['password']);
}
?>
<div class="page tickets">
    <div class="container">
        <h1>Tickets bestellen</h1>

        <div class="ticketList">
            <?php if ($user !== "No user found" && $user !== null) { ?>

                <!-- Buy ticket form -->
                <form action="orderConfirmation.php" method="POST">
                    <div class="inputRow">
                        <?php while ($userData = $user->fetch_assoc()) { ?>
                            <label for="userID">Gebruikers ID</label>
                            <input type="number" name="userID" value="<?php echo $userData['id'] ?>">
                        <?php } ?>  

                    </div>

                    <div class="inputRow">
                        <label for="ticketSelect">Tickets</label>
                        <select name="ticketSelect">
                            <?php while ($ticket = $tickets->fetch_assoc()) { ?>
                                <option value="<?php echo $ticket["id"]; ?>"><?php echo $ticket["name"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="inputRow">
                        <label for="amount">Hoeveelheid</label>
                        <input type="number" name="amount" id="">
                    </div>

                    <input type="submit" name="order" value="Bestellen">
                </form>

            <?php } else { ?>

                <!-- Login form -->
                <form action="#" method="POST">
                    <div class="inputRow">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="">
                    </div>

                    <div class="inputRow">
                        <label for="password">Wachtwoord</label>
                        <input type="password" name="password" id="">
                    </div>

                    <input type="submit" name="login" value="Login">
                </form>

            <?php } ?>

        </div>


    </div>
</div>
<?php include("./footer.php"); ?>