<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Songfess</title>
    <link rel="stylesheet" href="css/browse.css">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/logo-hitam.png" type="image/x-icon">
</head>
<body style="background-image: url(../assets/bg.png);">
<nav class="navbar">
    <div class="navbar-left">
        <img src="../assets/logo-hitam.png" alt="Logo" class="logo">
        <span class="navbar-title">Formatiics</span>
    </div>
    <div class="navbar-right">
        <a href="../index.php" class="nav-link">Home</a>
        <a href="browse.php" class="nav-link">Browse</a>
        <a href="form.php" class="nav-link">Submit</a>
    </div>
</nav>
<h1>Browse Songfess</h1>
<form method="GET" action="">
    <input type="text" name="recipient" placeholder="Enter recipient's name" required>
    <button type="submit">Search</button>
</form>
<div id="songfess-list">
    <?php
    include 'includes/db.php';

    if (isset($_GET['recipient'])) {
        $recipient = $conn->real_escape_string($_GET['recipient']);
        $query = "SELECT * FROM songfess WHERE receiver LIKE '%$recipient%'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $spotify_url = str_replace('open.spotify.com', 'open.spotify.com/embed', $row['song_url']);
                echo "<div class='songfess-item'>";
                echo "<a href='detail.php?id=" . $row['id'] . "' class='songfess-link'>";
                echo "<h2></strong> To: <strong>" . htmlspecialchars($row['receiver']) . "</strong></h2>";
                echo "<p>" . htmlspecialchars($row['message']) . "</p>";
                echo "<iframe src='" . htmlspecialchars($spotify_url) . "' width='250' height='80' frameborder='0' allowtransparency='true' allow='encrypted-media'></iframe>";
                echo "</a>";
                echo "</div>";
            
            }
        } else {
            echo "<p>No songfess found.</p>";
        }
    }
    ?>
</div>
</body>
</html>