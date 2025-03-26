<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Songfess</title>
    <link rel="stylesheet" href="src/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/logo-hitam.png" type="image/x-icon">
</head>
<body style="background-image: url(assets/bg.png);">
    <nav class="navbar">
        <div class="navbar-left">
            <img src="assets/logo-hitam.png" alt="Logo" class="logo">
            <span class="navbar-title">Formatiics</span>
        </div>
        <div class="navbar-right">
            <a href="index.php" class="nav-link">Home</a>
            <a href="src/browse.php" class="nav-link">Browse</a>
            <a href="src/form.php" class="nav-link">Submit</a>
        </div>
    </nav>
    <div class="Kontent utama">
        <h1>If you have feelings that are difficult to express, there are many ways to let them out.</h1>
        <p>express it all through a song.</p>
        <div class="button-group">
            <a href="src/form.php" class="button button-1">tell ur story</a>
            <a href="https://www.instagram.com/f.informatiics" class="button button-2">visit us in other place</a>
            <a href="https://linktr.ee/f.formatiics?utm_source=linktree_admin_share" class="button button-3">get to know us</a>
        </div>
    </div>
    <div class="card-container">
        <div class="card card-message">
            <h2>Share your message</h2>
            <p>Choose a song and write a heartfelt message to someone special.</p>
            <a href="src/form.php" class="button button-share">Create Message</a>
        </div>
        <div class="card card-browse">
            <h2>Browse Messages</h2>
            <p>Find messages that were written for you. Search by your name to discover heartfelt dedications.</p>
            <a href="src/browse.php" class="button button-2">Browse Message</a>
        </div>
        <div class="card card-detail">
            <h2>Detail Message</h2>
            <p>You can click on any message card to read the full story and listen to the chosen song!</p>
        </div>
    </div>
    <h1>songfffess yang terkirim</h1>
    <div id="songfess-list">
        <?php
        include 'src/includes/db.php';

        $sql = "SELECT * FROM songfess ORDER BY id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $spotify_url = str_replace('open.spotify.com', 'open.spotify.com/embed', $row['song_url']);
                $receiver = htmlspecialchars($row['receiver']);
                if (strlen($receiver) > 20) {
                    $receiver = substr($receiver, 0, 20) . '...';
                }

                echo "<div class='songfess-item'>";
                echo "<a href='src/detail.php?id=" . $row['id'] . "' class='songfess-link'></a>";
                echo "<h2>To: <strong>" . $receiver . "</strong></h2>";
                echo "<p>" . htmlspecialchars($row['message']) . "</p>";
                echo "<iframe src='" . htmlspecialchars($spotify_url) . "' width='250' height='80' frameborder='0' allowtransparency='true' allow='encrypted-media'></iframe>";
                echo "</div>";
            }
        } else {
            echo "<p>No songfess found.</p>";
        }
        ?>
    </div>
    <script>
        const songfessList = document.getElementById('songfess-list');

        function scrollList() {
            songfessList.scrollBy({
                left: 1,
                behavior: 'auto'
            });

            if (songfessList.scrollLeft + songfessList.clientWidth >= songfessList.scrollWidth) {
                songfessList.scrollLeft = 0;
            }
        }

        setInterval(scrollList, 20); // Sesuaikan interval waktu sesuai kebutuhan
    </script>
    <footer class="footer">
        <h4>© 2024 | Formatiics</h4>
    </footer>
</body>
</html>