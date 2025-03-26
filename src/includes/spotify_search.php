<?php
session_start();

// Pastikan ada access_token
if (!isset($_SESSION['spotify_access_token']) || $_SESSION['spotify_expires'] < time()) {
    $auth_response = file_get_contents("spotify_auth.php");
    $auth_data = json_decode($auth_response, true);
    $_SESSION['spotify_access_token'] = $auth_data['access_token'];
    $_SESSION['spotify_expires'] = time() + 3600;
}

$access_token = $_SESSION['spotify_access_token'] ?? '';

if (isset($_GET['q']) && $access_token) {
    $query = urlencode($_GET['q']);
    $search_url = "https://api.spotify.com/v1/search?q=$query&type=track&limit=20"; // Ubah limit di sini

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $search_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer " . $access_token
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    $search_data = json_decode($response, true);

    if (isset($search_data['error'])) {
        header('Content-Type: application/json');
        echo json_encode(["error" => "Gagal mengambil data dari API Spotify"]);
        exit;
    }

    $songs = [];

    if (!empty($search_data['tracks']['items'])) {
        foreach ($search_data['tracks']['items'] as $track) {
            $songs[] = [
                "uri" => $track['uri'],
                "name" => $track['name'],
                "artist" => $track['artists'][0]['name']
            ];
        }
    }

    header('Content-Type: application/json');
    echo json_encode($songs);
    exit;
}
?>