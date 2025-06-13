<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Actor Film</title>
  <link rel="stylesheet" href="style.css" />   
</head>
<body>

  <h2>Actor Film</h2>
  <div class="cast-grid" id="cast-list"></div>

  <script>
    const id = "<?php echo $_GET['id'];?>";
    const castList = document.getElementById("cast-list");

    fetch(`https://api.themoviedb.org/3/movie/${id}/credits`,{
        headers : {
          accept: "application/json",
      Authorization:
        "Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyMTFkZmEyNjQ4ZmM1OTk0MTZkY2M5ODMwYWZmM2IxMyIsIm5iZiI6MTc0ODE5NjQzOC4yMTEsInN1YiI6IjY4MzM1YzU2MTNiOTFhMzdjYTJiNzIyMCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.9kmTunFIeMecPRfDvSa9Lyfl3lZ9W0LhVDg4K1lc8aE",
        }} ).then((event) => event.json()).then((data) => {
          console.log(data)
            data.cast.forEach(cast => {
              const item = document.createElement("div");
              item.className = "cast-item";

              item.innerHTML = `
                <div class="cast-photo" style="background-image: url('https://image.tmdb.org/t/p/original${cast.profile_path}')"></div>
                <a href="../photocast?path=${cast.profile_path}&job=${cast.character}" class="cast-info" style="text-decoration:none;">
                  <div class="actor-name">${cast.name}</div>
                  <div class="character-name">${cast.character}</div>
                </a>
              `;

              castList.appendChild(item);
            });
        })

  </script>
</body>
</html>
