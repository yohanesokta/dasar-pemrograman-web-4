/*
DATA

1. Data project: berisikan nama dan deskripsi project akhir. Dan bagian halaman yang saya kerjakan.
*/
const project = {
  name: "Web Film (nonton.aja)",
  desc: "nonton.aja adalah sebuah web yang menyediakan berbagai film dan series.",
  img: "./assets/nonton-aja.png",
  job: [
    {
      page: "Upcoming Film",
      desc: "Menampilkan list film yang akan rilis.",
    },
    {
      page: "Series Film",
      desc: "Menampilkan berbagai series (film/tv/series).",
    },
    {
      page: "Top Seller",
      desc: "List film yang sering dibeli.",
    },
    {
      page: "Top Rating",
      desc: "Rating pada tiap film/tv/series.",
    },
    {
      page: "Kids Mode",
      desc: "Mode untuk anak - anak.",
    },
  ],
};

/*
DOM MANIPULATION

1. Mengambil tag <main id="main">.
2. Membuat element untuk tugas akhir.
3. Mouting element pada HTML.
4. Membuat Modal.
*/

// mengambil tag main dengan id "main".
const main = document.querySelector("main#main");

// membuat element display gambar web project
const display_img = `
  <section id="project_preview">
    <h2><h2>Project Akhir</h2></h2>
    <img src="${project.img}" alt="${project.name} image" title="${project.name}" class="img-thumbnail modal_toggle">
  </section>
`;

// membuat element project preview
const project_preview = `
  <section id="project_preview">
    <h3>${project.name}</h3>
    <p>${project.desc}</p>
  </section>
`;

// membuat element project job
const project_job = `
  <section id="project_job">
    <h3>Bagian Job</h3>
    <div>
      ${project.job
        .map(
          (j) => `
        <div class="card">
          <span class="card_title">${j.page}</span>
          <p class="card_desc">${j.desc}</p>
        </div>
      `
        )
        .join("")}
    </div>
  </section>
`;

// mounting element pada tag <main>
main.innerHTML = display_img + project_preview + project_job;

// mengambil element <img> untuk dijadikan modal
const modal_toggle = document.querySelectorAll(".modal_toggle");

// memberi even pada tiap element yang memeiliki class ".modal_toggle"
modal_toggle.forEach((mt) => {
  mt.addEventListener("click", (e) => {
    const modal_backdrop = document.createElement("div");
    const modal_img = document.createElement("img");

    modal_backdrop.classList.add("modal_backdrop");
    modal_img.classList.add("modal_img");

    modal_img.setAttribute("src", e.target.src);
    modal_img.setAttribute("alt", e.target.alt);
    modal_img.setAttribute("title", e.target.alt);

    modal_backdrop.append(modal_img);

    document.body.classList.toggle("overlay_visible");
    document.body.append(modal_backdrop);

    modal_backdrop.addEventListener("click", (e) => {
      document.body.removeChild(e.target);
      document.body.classList.toggle("overlay_visible");
    });
  });
});
