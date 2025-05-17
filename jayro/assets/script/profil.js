const queryString = window.location.search;
const params = new URLSearchParams(queryString);
const token = params.get("token");

function parseJwt(token) {
  var base64Url = token.split(".")[1];
  var base64 = base64Url.replace(/-/g, "+").replace(/_/g, "/");
  var jsonPayload = decodeURIComponent(
    window
      .atob(base64)
      .split("")
      .map(function (c) {
        return "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2);
      })
      .join("")
  );

  return JSON.parse(jsonPayload);
}
console.log(parseJwt(token));
let data = parseJwt(token)
let profil = data.user_picture
let username = data.username
document.getElementById("user-profil").setAttribute("src",profil)
document.getElementById("nama").innerHTML=username

