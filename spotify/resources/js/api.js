// Fetch data from the API endpoint
console.log("test");

fetch('https://api.example.com/your-endpoint')
  .then(response => response.json())
  .then(data => {
    // Once data is fetched, handle it here
    renderData(data);
  })
  .catch(error => {
    console.error('Error fetching data:', error);
  });

// Function to render the fetched data
function renderData(data) {
  // Access the 'items' array containing the artists
  const artists = data.artists.items;

  // Get the HTML element where you want to display the data
  const view = document.getElementById('your-view-element');

  // Create HTML content to display artists
  let htmlContent = '<ul>';

  // Loop through each artist and create list items to display their names
  artists.forEach(artist => {
    htmlContent += `<li>
      <img src="${artist.images[0].url}" alt="${artist.name}" />
      <h3>${artist.name}</h3>
      <p>Genres: ${artist.genres.join(', ')}</p>
      <p>Followers: ${artist.followers.total}</p>
      <a href="${artist.external_urls.spotify}" target="_blank">Spotify Link</a>
    </li>`;
  });

  htmlContent += '</ul>';

  // Set the HTML content to the view element
  view.innerHTML = htmlContent;
}
