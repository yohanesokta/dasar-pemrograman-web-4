<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Photocast Film</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <h1>Photocast Film</h1>
  <div class="carousel" aria-label="Photocast Film Carousel">
    <div class="slides">
      <div class="slide" aria-hidden="false">
        <img src="https://image.tmdb.org/t/p/original<?php echo $_GET['path']?>" alt="Actor Tidak Menampilkan Wajahnya"/>
      </div>
    </div>
  </div>
  <p align="center"><?php echo $_GET['job']; ?></p>

</body>
</html>