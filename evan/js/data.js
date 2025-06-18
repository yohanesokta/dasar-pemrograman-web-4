import { config } from "../../app_config.js";

const brand_logo = document.querySelector(".brand_logo");

brand_logo.href = config["APP_URL "];
console.log(brand_logo)

const prem = document.querySelector("#getprem")
if (prem) {

  prem.addEventListener("click", () => {
    window.location.href = config["APP_URL "] + "/Rachelia/Pages/premium/premium/";
  })
}

export const sidebar_menus = {
  you: [
    {
      title: "Home",
      path: config["APP_URL "],
      icon: `<i class="fa-solid fa-home"></i>`,
    },
    {
      title: "History",
      path: config["APP_URL "] + "/angga/history",
      icon: `<i class="fa-solid fa-clock-rotate-left"></i>`,
    },
    {
      title: "Favorite Movies",
      icon: `<i class="fa-solid fa-thumbs-up"></i>`,
      path: config["APP_URL "] + "/fitria/pages/favorite/",
    },
    {
      title: "Family Share",
      icon: `<i class="fa-solid fa-share-nodes"></i>`,
      path: config["APP_URL "] + "/jayro/page/family share/",
    },
    {
      title: "Watch Later",
      icon: `<i class="fa-solid fa-clock"></i>`,
      path: config["APP_URL "] + "/fitria/pages/watch-letter/",
    },
  ],
  movie_list: [
    {
      title: "Now Playing",
      path: config["APP_URL "] + "/evan/pages/@MovieList/now-playing",
      icon: `<i class="fa-solid fa-clapperboard"></i>`,
    },
    {
      title: "Popular",
      path: config["APP_URL "] + "/evan/pages/@MovieList/popular",

      icon: `<i class="fa-solid fa-fire"></i>`,
    },
    {
      title: "Top Rated",
      path: config["APP_URL "] + "/evan/pages/@MovieList/top-rated",
      icon: `<i class="fa-solid fa-star"></i>`,
    },
    {
      title: "Upcomming Film",
      path: config["APP_URL "] + "/fitria/pages/upcoming copy/",
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
  trending: [
    {
      name: "Horor",
      path: config["APP_URL "] + "/Rachelia/new_kategori/horor",
    },
    {
      name: "Comedy",
      path: config["APP_URL "] + "/Rachelia/new_kategori/comedy",
    },
    {
      name: "Movies",
      path: config["APP_URL "] + "/evan/pages/@Category/movie",
    },
  ],
  others: [
    // "Kids Mode",
    {
      name: "Source",
      path: "https://github.com/yohanesokta/dasar-pemrograman-web-4",
    },
    {
      name : "About",
      path: config["APP_URL "] + "/fitria/pages/aboutme/",
    },
    {
      name : "Faq & Others",
      path: config["APP_URL "] + "/fitria/pages/faq film/",
    },
  ], 
  developer : [
    {
      name : "Yohanes Oktanio",
      path: config["APP_URL "] + "/yohanes/profile/",
    },
    {
      name : "Evan Raga Radya Alifian",
      path: config["APP_URL "] + "/evan/pribadi/",

    },
    {
      name : "Muhamad Jayro Fadil Mukolip",
            path: config["APP_URL "] + "/jayro/blog_pribadi/page",
    },
    {
      name : "Fitria Cahaya kurnia",
      path: config["APP_URL "] + "/fitria/pribadi/",

    },
    {
      name : "Rachelia Andini Tendean",
      path: config["APP_URL "] + "/Rachelia/pribadi/",

    },

    {
      name : "Angga Pratama",
      path: config["APP_URL "] + "/angga/pribadi/",
    },

    // https://fitriacahayakurnia.github.io/blog-pribadi/
  ]
};

export const footer_premium_menu = [
  "Premium Individual",
  "Premium Duo",
  "Premium Family",
  "Premium Student",
];
