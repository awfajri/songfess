<?php
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sender = $conn->real_escape_string($_POST['sender']);
    $receiver = $conn->real_escape_string($_POST['receiver']);
    $message = $conn->real_escape_string($_POST['message']);
    $song_url = $conn->real_escape_string($_POST['song_url']);

    $sql = "INSERT INTO songfess (sender, receiver, message, song_url) VALUES ('$sender', '$receiver', '$message', '$song_url')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Songfess</title>
    <link rel="stylesheet" href="css/form.css">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/logo-hitam.png" type="image/x-icon">
<script>
const CLIENT_ID = '256ed70938184db7a0aacb88daa8b9a3';
const CLIENT_SECRET = '94aec0f4b9c34695a27145665e877b0d';

// Fungsi untuk mendapatkan token akses dari Spotify
async function getSpotifyToken() {
    const response = await fetch('https://accounts.spotify.com/api/token', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': 'Basic ' + btoa(CLIENT_ID + ':' + CLIENT_SECRET)
        },
        body: 'grant_type=client_credentials'
    });

    const data = await response.json();
    return data.access_token;
}

// Fungsi untuk mencari lagu berdasarkan input user
async function searchSpotify() {
    const query = document.getElementById('search-song').value;
    if (query.length < 2) return; // Cegah pencarian jika input terlalu pendek

    const token = await getSpotifyToken();

    const response = await fetch(`https://api.spotify.com/v1/search?q=${query}&type=track&limit=20`, {
        headers: { 'Authorization': `Bearer ${token}` }
    });

    const data = await response.json();
    const dropdown = document.getElementById('song_dropdown');
    dropdown.innerHTML = '<option value="">Pilih Lagu</option>'; // Reset isi dropdown

    data.tracks.items.forEach(track => {
        const option = document.createElement('option');
        option.value = track.external_urls.spotify;
        option.textContent = `${track.name} - ${track.artists[0].name}`;
        dropdown.appendChild(option);
    });
}

// Fungsi untuk memasukkan lagu yang dipilih ke dalam input hidden
function selectSong() {
    const selectedSong = document.getElementById('song_dropdown').value;
    document.getElementById('song_url').value = selectedSong;
}
</script>
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
    <h1>kirim SonGffFesnya dong kids</h1>
    <div class="card">
        <h2>Message Deletion Not Available</h2>
        <p>Lu klo mau songffess yg bener bener aja ya, soalnya gmw gw hapus, kneapa? mlzz.</p>
    </div>
<form action="form.php" method="POST" class="songfess-form">
    <label for="sender">From:</label>
    <input type="text" id="sender" name="sender" required>

    <label for="receiver">To:</label>
    <input type="text" id="receiver" name="receiver" required>

    <label for="message">Message:</label>
    <textarea id="message" name="message" required></textarea>

    <label for="search-song">Search Song:</label>
    <input type="text" id="search-song" placeholder="Type a song name..." onkeyup="searchSpotify()">

    <label for="song_dropdown">Select Song:</label>
    <select id="song_dropdown" onchange="selectSong()">
        <option value="">Pilih Lagu</option>
    </select>

    <!-- Hidden input to store the selected song URL -->
    <input type="hidden" id="song_url" name="song_url">

    <button type="submit">Submit Songfess</button>
</form>
    <footer class="footer">
        <h4>© 2024 | Formatiics</h4>
    </footer>
</body>
</html>