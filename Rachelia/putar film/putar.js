const video = document.getElementById('video');
const playPauseBtn = document.getElementById('playPauseBtn');
const mundurBtn = document.getElementById('mundurBtn');
const majuBtn = document.getElementById('majuBtn');

video.play().catch(() => {
  console.log('Autoplay diblokir, silakan tekan play');
});

playPauseBtn.onclick = () => {
  if(video.paused) {
    video.play();
    playPauseBtn.textContent = 'Pause';
  } else {
    video.pause();
    playPauseBtn.textContent = 'Play';
  }
};

mundurBtn.onclick = () => {
  video.currentTime = Math.max(0, video.currentTime - 10);
};

majuBtn.onclick = () => {
  video.currentTime = Math.min(video.duration, video.currentTime + 10);
};

video.onplay = () => playPauseBtn.textContent = 'Pause';
video.onpause = () => playPauseBtn.textContent = 'Play';