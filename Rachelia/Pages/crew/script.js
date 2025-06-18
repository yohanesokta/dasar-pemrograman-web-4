const castList = document.getElementById("cast-list");

const castData = [
  {
    name: "Tobey Maguire",
    character: "Peter Parker / Spiderman",
    photo: "https://hips.hearstapps.com/hmg-prod/images/mh-spider-men-1639676198.png?crop=0.270xw:0.541xh;0.716xw,0&resize=640:*"
  },
  {
    name: "Kirsten Dunst",
    character: "Mary Jane Watson",
    photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/Kirsten_Dunst_Cannes_2016.jpg/500px-Kirsten_Dunst_Cannes_2016.jpg"
  },
  {
    name: "James Franco",
    character: "Harry Osborn / New Goblin",
    photo: "https://ew.com/thmb/dOHFTiCQjSgCTyUR42D5xSfEV5k=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/16059__franco_l-deac11f19b1e40dabd84ef4c0b3e1299.jpg"
  },
  {
    name: "Thomas Haden Church",
    character: "Flint Marko / Sandman",
    photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/e/e6/Thomas_Haden_Church_at_the_2009_Tribeca_Film_Festival.jpg/500px-Thomas_Haden_Church_at_the_2009_Tribeca_Film_Festival.jpg"
  },
  {
    name: "Topher Grace",
    character: "Eddie Brock / Venom",
    photo: "https://cdn.theplaylist.net/wp-content/uploads/2015/10/15064421/spider-man-3.jpg"
  },
  {
    name: "Bryce Dallas Howard",
    character: "Gwen Stacy",
    photo: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQxSOAbhOwTcKihA65pg39kVgzc734_0FWjfA&s"
  }
];

castData.forEach(cast => {
  const item = document.createElement("div");
  item.className = "cast-item";

  item.innerHTML = `
    <div class="cast-photo" style="background-image: url('${cast.photo}')"></div>
    <div class="cast-info">
      <div class="actor-name">${cast.name}</div>
      <div class="character-name">${cast.character}</div>
    </div>
  `;

  castList.appendChild(item);
});