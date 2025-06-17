import { sidebar_menus } from "../data.js";

export default function Sidebar() {
  const sidebar = document.getElementById("sidebar");
  const sidebar_you = `
    <section>
      <h3>You</h3>
      <div>
        ${sidebar_menus.you
          .map(
            (d) =>
              `<a href="${d.path}" class="button button_ghost">${d.icon} ${d.title}</a>`
          )
          .join("")}
      </div>
      </section>
  `;
  const movie_list = `
    <section>
      <h3>Movie List</h3>
      <div>
        ${sidebar_menus.movie_list
          .map(
            (d) =>
              `<a href="${d.path}" class="button button_ghost">${d.icon}${d.title}</a>`
          )
          .join("")}
      </div>
      </section>
  `;
  const discover = `
    <section>
      <h3>Discover</h3>
      <div>
        ${sidebar_menus.discover
          .map(
            (d) =>
              `<a href="${d.path}" class="button button_ghost">
              ${d.name}
            </a>`
          )
          .join("")}
      </div>
      </section>
  `;
  const trending = `
    <section>
      <h3>Category</h3>
      <div>
        ${sidebar_menus.trending
          .map(
            (d) =>
              `<a href="${d.path}" class="button button_ghost">
              ${d.name}
            </a>`
          )
          .join("")}
      </div>
      </section>
  `;
  const sidebar_others = `
    <section>
      <h3>Others</h3>
      <div>
        ${sidebar_menus.others
          .map(
            (d) =>
              `<a href="${d.path}" class="button button_ghost">
              ${d.name}
            </a>`
          )
          .join("")}
      </div>
      </section>
  `;

  const developer = `
    <section>
      <h3>Developers</h3>
      <div>
        ${sidebar_menus.developer
          .map(
            (d) =>
              `<a href="${d.path}" class="button button_ghost">
              ${d.name}
            </a>`
          )
          .join("")}
      </div>
      </section>
  `;
  
  sidebar.innerHTML = sidebar_you + movie_list + trending + discover + sidebar_others + developer;
}
