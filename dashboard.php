<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Happy Sweet 17th 💌</title>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@500&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: linear-gradient(to bottom, #ffe6f0, #ffccdf);
      font-family: 'Quicksand', sans-serif;
      overflow: hidden;
      height: 100vh;
      position: relative;
    }

    .card {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: white;
      padding: 40px;
      border-radius: 20px;
      text-align: center;
      box-shadow: 0 10px 30px rgba(255, 0, 128, 0.2);
      z-index: 10;
    }

    h1 {
      font-family: 'Pacifico', cursive;
      font-size: 36px;
      color: hotpink;
      text-shadow: 0 0 8px pink;
    }

    .nama {
      color: deeppink;
      font-weight: bold;
    }

    .float-item {
      position: absolute;
      width: 40px;
      animation: floatUp 6s ease-in infinite;
      bottom: -50px;
      opacity: 0.9;
    }

    @keyframes floatUp {
      0% {
        transform: translateY(100vh) scale(1);
        opacity: 1;
      }
      80% {
        opacity: 1;
      }
      100% {
        transform: translateY(-10vh) scale(0.1);
        opacity: 0;
      }
    }

    .love {
      position: absolute;
      bottom: 0;
      font-size: 24px;
      color: deeppink;
      animation: loveUp 5s ease-out forwards;
    }

    @keyframes loveUp {
      0% {
        transform: translateY(0) scale(1);
        opacity: 1;
      }
      100% {
        transform: translateY(-120vh) scale(0.5);
        opacity: 0;
      }
    }

    audio {
      display: none;
    }
  </style>
</head>
<body>
  <!-- Musik ulang tahun -->
  <audio autoplay loop>
    <source src="https://cdn.pixabay.com/download/audio/2022/03/15/audio_f6ed6b43d6.mp3?filename=happy-birthday-12690.mp3" type="audio/mpeg">
  </audio>

  <!-- Kartu ucapan -->
  <div class="card">
    <h1>Happy Sweet 17th 💌</h1>
    <p>Hai <span class="nama">Putri Ajmella Audyna</span>,</p>
    <p>Semoga hari ulang tahunmu dipenuhi dengan cinta, tawa, dan kebahagiaan tak berujung! 💖🎂</p>
  </div>

  <!-- Container animasi -->
  <div id="float-container"></div>
  <div id="love-container"></div>

  <script>
    const floatContainer = document.getElementById('float-container');
    const loveContainer = document.getElementById('love-container');

    const images = [
      "https://cdn-icons-png.flaticon.com/512/3468/3468670.png",
      "https://cdn-icons-png.flaticon.com/512/833/833472.png"
    ];

    function createFloatingItem() {
      const img = document.createElement('img');
      img.src = images[Math.floor(Math.random() * images.length)];
      img.classList.add('float-item');
      img.style.left = (Math.random() * 100) + "vw";
      img.style.animationDuration = (5 + Math.random() * 3) + "s";
      floatContainer.appendChild(img);

      img.addEventListener('animationend', () => img.remove());
    }

    function createLove() {
      const love = document.createElement('div');
      love.classList.add('love');
      love.innerText = "💖";
      love.style.left = (Math.random() * 100) + "vw";
      love.style.fontSize = (20 + Math.random() * 20) + "px";
      love.style.animationDuration = (3 + Math.random() * 2) + "s";
      loveContainer.appendChild(love);

      setTimeout(() => love.remove(), 5000);
    }

    setInterval(createFloatingItem, 800);
    setInterval(createLove, 150); // banyak love

    // Redirect ke halaman home.php setelah 10 detik
    setTimeout(() => {
      window.location.href = "home.php";
    }, 10000);
  </script>
</body>
</html>
