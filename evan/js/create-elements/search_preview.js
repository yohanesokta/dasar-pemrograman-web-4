async function searchMovie(search) {
  return await fetch(`http://www.omdbapi.com/?apikey=3ec3e062&s=${search}`).then(
    (res) => res.json()
  );
}





function SearchPreview(text) {
  console.log(text)
  const search_backdrop = document.createElement("div")
  const search_preview = document.createElement("div");
  const search_input = `
    <label>
      <i class="fa-solid fa-magnifying-glass"></i>
      <input
        type="text"
        name="search_film"
        placeholder="Search movie" 
        autofocus
      />
    </label>
    <div class="search_content">
      <div class="warn_box">
        <p>No results found.</p>
      </div>
    </div>
  `;
  search_backdrop.classList.add("search_backdrop");
  search_preview.classList.add("search_preview");
  search_backdrop.append(search_preview)
  search_preview.innerHTML = search_input

  return search_backdrop
}




function showBackdrop() {
  document.body.appendChild(SearchPreview());
  
  const backdrop = document.getElementsByClassName("search_backdrop")[0];
  const input = backdrop.getElementsByTagName("input")[0];
  const search_content = document.getElementsByClassName("search_content")[0];

  input.oninput = async (e) => {
    const data = await searchMovie(e.target.value);
    if (data.Search) {
      search_content.innerHTML = `
        <div class="search_list_movie">
          ${data.Search.map(
            (movie) => `
              <figure class="poster_card">
                <img src="${movie.Poster}" alt="${movie.Title}">
                <figcaption>
                  <span class="poster_card_title">${movie.Title}</span>
                  <span class="poster_card_description">${movie.Year}</span>
                </figcaption>
              </figure>
            `
          ).join("")}
        </div>
      `;
    } else {
      search_content.innerHTML = `
        <div class="warn_box">
          <p>No results found.</p>
        </div>
      `;
    }
  };


  backdrop.addEventListener("click", (e) => {
    if (e.target === backdrop) {
      backdrop.remove()
    }
  });
}




const button_search = document.getElementById("button_search")
button_search.onclick = () => {
  showBackdrop()
}