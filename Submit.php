<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Promo</title>
</head>
<body>
    <h1>VERIFY PROMO</h1>
    <div>
        <h2>Artwork</h2>
        <img src="<?php echo $_SESSION['artwork']; ?>" alt="Artwork" style="max-width: 600px;">
        <h3>Promo Thumbnail</h3>
        <img src="<?php echo $_SESSION['artwork-thumbnail']; ?>" alt="Promo Thumbnail" style="max-width: 100px;">
        <h3>Promo Artist:</h3>
        <p><?php echo $_SESSION['artist']; ?></p>
        <h3>Promo Title:</h3>
        <p><?php echo $_SESSION['title']; ?></p>
        <h3>Record Label:</h3>
        <p><?php echo $_SESSION['label']; ?></p>
        <h3>Catalogue Number:</h3>
        <p><?php echo $_SESSION['catno']; ?></p>
        <h3>Campaign Genre:</h3>
        <p><?php echo $_SESSION['genre']; ?></p>
        <h3>Promo Send Date:</h3>
        <p><?php echo $_SESSION['promo-send-date']; ?></p>
        <h3>Release Description:</h3>
        <p><?php echo $_SESSION['description']; ?></p>
    </div>
    <div>
        <h2>Tracks</h2>
        <?php
        for ($i = 1; $i <= $_SESSION['tracks']; $i++) {
            echo "<p>Track $i: {$_POST['artist'.$i]} - {$_POST['title'.$i]} ({$_POST['mix'.$i]}) [{$_POST['genre'.$i]}]</p>";
        }
        ?>
    </div>
    <form action="store_data.php" method="post">
        <input type="submit" value="Submit">
    </form>
</body>
</html>
