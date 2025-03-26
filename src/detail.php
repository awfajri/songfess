<?php
date_default_timezone_set('Asia/Jakarta');
include 'includes/db.php';

if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $query = "SELECT * FROM songfess WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $spotify_url = str_replace('open.spotify.com', 'open.spotify.com/embed', $row['song_url']);
        $spotify_image_url = "https://i.scdn.co/image/ab67616d0000b273" . substr(md5($row['song_url']), 0, 32); // Placeholder image URL
    } else {
        echo "No songfess found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Songfess</title>
    <link rel="stylesheet" href="css/detail.css">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/logo-hitam.png" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
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
<div class="detail-container">
    <h1>Hello, <?php echo htmlspecialchars($row['receiver']); ?></h1>
    <p>There's someone sending you a song, they want you to hear this song that maybe you'll like :)</p>
    <iframe id="spotify-iframe" src="<?php echo htmlspecialchars($spotify_url); ?>" width="300" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
    <img id="spotify-placeholder" src="<?php echo htmlspecialchars($spotify_image_url); ?>" width="300" height="80" style="display: none;">
    <p>Also, here's a message from <?php echo htmlspecialchars($row['sender']) ?>:</p>
    <p><?php echo htmlspecialchars($row['message']); ?></p>
    <p>Sent on: <?php echo htmlspecialchars($row['created_at']); ?></p>
</div>
<footer class="footer">
        <h4>© 2024 | Formatiics</h4>
</footer>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const detailContainer = document.querySelector('.detail-container');
    const spotifyIframe = document.getElementById('spotify-iframe');
    const spotifyPlaceholder = document.getElementById('spotify-placeholder');

    detailContainer.addEventListener('click', function() {
        // Ganti iframe dengan gambar placeholder
        spotifyIframe.style.display = 'none';
        spotifyPlaceholder.style.display = 'block';

        html2canvas(detailContainer, {
            scale: 6, // Meningkatkan skala untuk kualitas gambar yang lebih baik
            useCORS: true // Menggunakan CORS untuk menangani konten lintas domain
        }).then(function(canvas) {
            // Kembalikan iframe setelah screenshot diambil
            spotifyIframe.style.display = 'block';
            spotifyPlaceholder.style.display = 'none';

            const link = document.createElement('a');
            link.href = canvas.toDataURL('image/png');
            link.download = 'songfess-card.png';
            link.click();
        });
    });
});
</script>
</body>
</html>