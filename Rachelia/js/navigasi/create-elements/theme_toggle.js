const html = document.getElementsByTagName("html")[0]
const theme_toggles = document.getElementById("theme_toggles");
const light_toggle = theme_toggles.getElementsByTagName("button")[0]
const dark_toggle = theme_toggles.getElementsByTagName("button")[1]





// localStorage.setItem("theme", "light")
const theme = localStorage.getItem("theme");
if (theme === "dark") {
  html.classList.add("dark");
} else if (theme === "light") {
  html.classList.remove("dark");
} else {
  html.classList.remove("dark");
}




light_toggle.addEventListener("click", () => {
  const theme = localStorage.getItem("theme")
  
  if (theme === "dark") {
    html.classList.remove("dark");
    localStorage.setItem("theme", "light")
  } else {
    html.classList.remove("dark");
    localStorage.setItem("theme", "light")
  }
  // light_toggle.classList.remove("button_ghost");
  // light_toggle.classList.add("button_primary");
  // dark_toggle.classList.remove("button_primary");
  // dark_toggle.classList.add("button_ghost");
})

dark_toggle.addEventListener("click", () => {
  const theme = localStorage.getItem("theme")
  
  if (theme === "light") {
    html.classList.add("dark");
    localStorage.setItem("theme", "dark")
  } else {
    html.classList.add("dark");
    localStorage.setItem("theme", "dark")
  }
  // light_toggle.classList.remove("button_primary");
  // light_toggle.classList.add("button_ghost");
  // dark_toggle.classList.remove("button_ghost")
  // dark_toggle.classList.add("button_primary")
})