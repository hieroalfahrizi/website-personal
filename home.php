<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Surat Ulang Tahun 💌</title>
  <style>
    body {
      margin: 0;
      background: #ffe6f0;
      font-family: 'Courier New', Courier, monospace;
      height: 100vh;
      overflow: hidden;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* --- LOADING SCREEN --- */
    .loading-screen {
      position: absolute;
      width: 100%;
      height: 100%;
      background-color: #ffe6f0;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      z-index: 10;
    }

    .cat-wrapper {
      position: relative;
      width: 180px;
      height: 150px;
    }

    .cat-img {
      width: 150px;
      animation: catDance 1s infinite alternate ease-in-out;
    }

    .surat-kecil {
      position: absolute;
      width: 50px;
      bottom: 20px;
      right: 20px;
      transform: rotate(-20deg);
    }

    @keyframes catDance {
      0% { transform: translateY(0px); }
      100% { transform: translateY(-10px); }
    }

    .loading-text {
      font-size: 18px;
      color: #d63384;
      margin-top: 20px;
      animation: fadeIn 1s ease-in-out infinite alternate;
    }

    @keyframes fadeIn {
      from { opacity: 0.4; }
      to { opacity: 1; }
    }

    /* --- SURAT --- */
    .surat-container {
      display: none;
      flex-direction: column;
      align-items: center;
      background: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0,0,0,0.2);
      max-width: 600px;
      width: 90%;
      min-height: 500px;
      text-align: center;
      position: relative;
      animation: fadeInSurat 1s ease;
    }

    @keyframes fadeInSurat {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .foto-atas {
      width: 100px;
      height: 100px;
      object-fit: cover;
      margin-bottom: 20px;
      border: 3px solid #ff8fab;
      border-radius: 10px;
    }

    .surat {
      white-space: pre-wrap;
      border-right: 3px solid black;
      overflow: hidden;
      font-size: 18px;
      animation: typing 8s steps(100, end), blink 0.75s step-end infinite;
    }

    @keyframes typing {
      from { width: 0 }
      to { width: 100% }
    }

    @keyframes blink {
      from, to { border-color: transparent }
      50% { border-color: black }
    }

    .next-button {
      position: absolute;
      bottom: 15px;
      right: 20px;
      background-color: #ff8fab;
      color: white;
      padding: 10px 16px;
      border: none;
      border-radius: 10px;
      font-size: 14px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .next-button:hover {
      background-color: #f26d96;
    }
  </style>
</head>
<body>

<!-- Audio Backsound -->
<audio id="backsound" autoplay loop>
  <source src="lgu.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>


<!-- Loading Screen -->
<div class="loading-screen" id="loadingScreen">
  <div class="cat-wrapper">
    <img src="https://media.giphy.com/media/v6aOjy0Qo1fIA/giphy.gif" alt="Kucing" class="cat-img">
    <img src="https://cdn-icons-png.flaticon.com/512/287/287221.png" alt="Surat" class="surat-kecil">
  </div>
  <div class="loading-text">Kucing sedang mengantar surat buat kamu... 💌</div>
</div>

<!-- Surat Ulang Tahun -->
<div class="surat-container" id="suratContainer">
  <img src="love.jpg" alt="Foto Ulang Tahun" class="foto-atas">
  <div class="surat" id="surat"></div>
  <button class="next-button" onclick="nextHalaman()">Next ➡️</button>
</div>

<script>
  const suratText = `
Hai harii ini tepat di hari birthday kamu

Selamat ulang tahun ya!
Di hari yang spesial ini, aku berharap kamu selalu diberikan kesehatan, kebahagiaan, dan kesuksesan.
Semoga segala impian dan harapanmu bisa tercapai satu per satu.
Terima kasih telah menjadi pribadi yang hebat, kuat, dan penuh semangat.
Tetap jadi versi terbaik dari dirimu, dan jangan lupa untuk selalu tersenyum 😊

Happy Sweet Seventeen! 🌸

- Dari seseorang yang selalu mendoakan yang terbaik untukmu 💌`;

  function startSurat() {
    document.getElementById("loadingScreen").style.display = "none";
    document.getElementById("suratContainer").style.display = "flex";
    ketik();
  }

  function ketik() {
    const suratEl = document.getElementById("surat");
    let i = 0;
    function tulis() {
      if (i < suratText.length) {
        suratEl.innerHTML += suratText.charAt(i);
        i++;
        setTimeout(tulis, 40);
      }
    }
    tulis();
  }

  function nextHalaman() {
    window.location.href = 'play.php';
  }

  // Loading 3 detik lalu tampilkan surat
  setTimeout(startSurat, 3000);
</script>

</body>
</html>
