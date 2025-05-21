import { footer_premium_menu, sidebar_genres_menu, sidebar_other_menu, sidebar_you_menu } from "./data.js";

function createSidebar() {
  const sidebar = document.getElementById("sidebar");
  const sidebar_you = `
    <section>
      <h4>You</h4>
      <ul>
        ${sidebar_you_menu
          .map(
            (d) => `<li class="button_ghost">
                    ${d.icon} ${d.title}
                  </li>`
          )
          .join("")}
      </ul>
      </section>
  `;
  const sidebar_genres = `
    <section>
      <h4>Choose Genres</h4>
      <ul>
        ${sidebar_genres_menu
          .map(
            (d) => `<li class="button_ghost">
                    ${d}
                  </li>`
          )
          .join("")}
      </ul>
      </section>
  `;
  const sidebar_others = `
    <section>
      <h4>Others</h4>
      <ul>
        ${sidebar_other_menu
          .map(
            (d) => `<li class="button_ghost">
                    ${d}
                  </li>`
          )
          .join("")}
      </ul>
      </section>
  `;
  sidebar.innerHTML = sidebar_you + sidebar_genres + sidebar_others;
}

createSidebar()

const num = 123.4

parseInt