data.tracks.items.forEach((track) => {
  const option = document.createElement("option");
  let trackName = `${track.name} - ${track.artists[0].name}`;

  // Potong teks jika terlalu panjang
  if (trackName.length > 20) {
    trackName = trackName.substring(0, 20) + "...";
  }

  option.value = track.external_urls.spotify;
  option.textContent = trackName;
  dropdown.appendChild(option);
});
