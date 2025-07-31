<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Happy Sweet Seventeen!</title>
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to bottom, #ffe1f0, #ffcce0);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
    }

    .card {
      background: #fff0f5;
      padding: 50px 40px;
      border-radius: 30px;
      text-align: center;
      box-shadow: 0 12px 30px rgba(0,0,0,0.1);
      animation: fadeInUp 1s ease-out;
    }

    .card h1 {
      font-size: 2.8em;
      color: #ff69b4;
      margin-bottom: 10px;
    }

    .card p {
      font-size: 1.2em;
      color: #444;
    }

    @keyframes fadeInUp {
      from { transform: translateY(50px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    .confetti, .balloon {
      position: absolute;
      width: 12px;
      height: 12px;
      background-color: #ff69b4;
      border-radius: 50%;
      opacity: 0.6;
    }

    @keyframes float {
      0% { transform: translateY(0) rotate(0); }
      100% { transform: translateY(-100vh) rotate(720deg); }
    }

    @keyframes fall {
      0% { transform: translateY(-100px) rotate(0); opacity: 1; }
      100% { transform: translateY(100vh) rotate(360deg); opacity: 0; }
    }
  </style>
</head>
<body>

<div class="card">
  <h1>🎀 Happy Sweet Seventeen, Love! 🎂</h1>
  <p>Semoga harimu penuh cinta dan kebahagiaan</p>
  <p>Kamu sudah selesai membuka web ini </p>
</div>

<script>
  // Confetti
  for (let i = 0; i < 60; i++) {
    let confetti = document.createElement("div");
    confetti.className = "confetti";
    confetti.style.left = Math.random() * 100 + "vw";
    confetti.style.top = "-10px";
    confetti.style.backgroundColor = ["#ffc0cb", "#ff69b4", "#ffe4e1", "#ffb6c1"][Math.floor(Math.random() * 4)];
    confetti.style.animation = `fall ${3 + Math.random() * 3}s linear infinite`;
    document.body.appendChild(confetti);
  }

  // Balloons
  for (let i = 0; i < 10; i++) {
    let balloon = document.createElement("div");
    balloon.className = "balloon";
    balloon.style.left = Math.random() * 100 + "vw";
    balloon.style.bottom = "-60px";
    balloon.style.width = "20px";
    balloon.style.height = "25px";
    balloon.style.backgroundColor = ["#ff69b4", "#ffb6c1", "#ffc0cb"][Math.floor(Math.random() * 3)];
    balloon.style.animation = `float ${5 + Math.random() * 5}s ease-in infinite`;
    document.body.appendChild(balloon);
  }
</script>

</body>
</html>
