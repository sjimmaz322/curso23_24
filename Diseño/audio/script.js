document.addEventListener('DOMContentLoaded', () => {
    const audio = document.getElementById('myAudio');
  
    audio.addEventListener('play', () => {
      console.log('Reproduciendo...');
    });
  
    audio.addEventListener('pause', () => {
      console.log('Pausado...');
    });
  
    audio.addEventListener('timeupdate', () => {
      const currentTime = audio.currentTime.toFixed(2);
      console.log(`Tiempo actual: ${currentTime} segundos`);
    });
  });
  