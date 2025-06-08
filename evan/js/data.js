import { config } from "../../app_config.js";

const brand_logo = document.querySelector(".brand_logo");

brand_logo.href = config["APP_URL "];
console.log(brand_logo)

export const sidebar_menus = {
  you: [
    {
      title: "History",
      icon: `<i class="fa-solid fa-clock-rotate-left"></i>`,
    },
    {
      title: "Favorite Movies",
      icon: `<i class="fa-solid fa-thumbs-up"></i>`,
    },
    {
      title: "Family Share",
      icon: `<i class="fa-solid fa-share-nodes"></i>`,
    },
    {
      title: "Watch Later",
      icon: `<i class="fa-solid fa-clock"></i>`,
    },
    {
      title: "Downloads",
      icon: `<i class="fa-solid fa-download"></i>`,
    },
  ],
  movie_list: [
    {
      title: "Now Playing",
      icon: `<i class="fa-solid fa-clapperboard"></i>`,
    },
    {
      title: "Popular",
      icon: `<i class="fa-solid fa-fire"></i>`,
    },
    {
      title: "Top Rated",
      icon: `<i class="fa-solid fa-star"></i>`,
    },
    {
      title: "Upcoming",
      icon: `<i class="fa-solid fa-hourglass-half"></i>`,
    },
  ],
  discover: [
    {
      name: "Movies",
      path: config["APP_URL "] + "/evan/pages/@Discover/movie",
    },
    {
      name: "TV / Series",
      path: config["APP_URL "] + "/evan/pages/@Discover/tv-series",
    },
  ],
  trending: ["All", "Movies", "People", "TV / Series"],
  others: [
    // "Kids Mode",
    {
      name: "Source",
      path: "https://github.com/yohanesokta/dasar-pemrograman-web-4",
    },
    {
      name: "Developers",
      path: "/"
    },
  ],
};

export const footer_premium_menu = [
  "Premium Individual",
  "Premium Duo",
  "Premium Family",
  "Premium Student",
];
