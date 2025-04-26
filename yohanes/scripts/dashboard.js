const bg = document.getElementById("bg")

window.addEventListener('scroll',()=>{
    const scrollY = window.scrollY
    const maxScroll = 500

    const scale = Math.max(1 + scrollY / maxScroll * 0.3);
    const opacity = Math.max(1 - scrollY / (maxScroll + 200) , 0);
    console.log(scrollY)
    bg.style.transform = `scale(${scale})`;
    bg.style.opacity = opacity;
})