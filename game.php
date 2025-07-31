<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Flappy Lovebird 💗</title>
  <style>
    * { margin:0; padding:0; box-sizing:border-box; }
    body {
      background-color: #ffe6f0;
      font-family: sans-serif;
      text-align: center;
      overflow: hidden;
    }
    canvas {
      background: #fff0f5;
      display: block;
      margin: auto;
      border: 4px solid #ff8fab;
      border-radius: 15px;
      margin-top: 20px;
    }
    h1 {
      color: #d63384;
      margin-top: 10px;
    }
    #backBtn {
      display: none;
      margin-top: 15px;
      padding: 10px 20px;
      background-color: #ff8fab;
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
    }
    #backBtn:hover {
      background-color: #e85a9b;
    }
  </style>
</head>
<body>

  <h1>🐦 Flappy Lovebird 💖</h1>
  <canvas id="gameCanvas" width="320" height="480"></canvas>
  <button id="backBtn" onclick="window.location.href='play.php'">⬅️ Kembali ke Home</button>

  <!-- Musik romantis backsound -->
  <audio id="backsound" autoplay loop>
    <source src="https://pixabay.com/id/music/pukulan-yg-tdk-keras-chiptune-symphony-8bit-game-theme-music-381366/"
            type="audio/mpeg">
    Browsermu tidak mendukung audio.
  </audio>

  <script>
    const canvas = document.getElementById('gameCanvas');
    const ctx = canvas.getContext('2d');
    const backBtn = document.getElementById('backBtn');
    const backsound = document.getElementById('backsound');

    let birdY = 200;
    let velocity = 0;
    const gravity = 0.5;
    const jump = -8;
    let isGameOver = false;
    let score = 0;
    const pipes = [];
    let frame = 0;

    // Pastikan audio aktif
    document.addEventListener('click', () => {
      backsound.play().catch(_ => {});
    });
    document.addEventListener('keydown', () => {
      backsound.play().catch(_ => {});
    });

    document.addEventListener('keydown', flap);
    document.addEventListener('touchstart', flap);

    function flap() {
      if (isGameOver) {
        resetGame();
        backBtn.style.display = 'none';
      } else {
        velocity = jump;
      }
    }

    function drawBird() {
      ctx.font = '30px Arial';
      ctx.fillText('🐧', 80, birdY);
    }

    function drawPipe(pipe) {
      const grad = ctx.createLinearGradient(0, 0, 0, canvas.height);
      grad.addColorStop(0, '#ffa6c9');
      grad.addColorStop(1, '#ff7ea5');
      ctx.fillStyle = grad;
      ctx.fillRect(pipe.x, 0, 40, pipe.top);
      ctx.fillText('💕', pipe.x + 5, pipe.top - 10);
      ctx.fillRect(pipe.x, pipe.top + pipe.gap, 40, canvas.height - pipe.top - pipe.gap);
      ctx.fillText('💕', pipe.x + 5, pipe.top + pipe.gap + 25);
    }

    function resetGame() {
      birdY = 200;
      velocity = 0;
      pipes.length = 0;
      frame = 0;
      score = 0;
      isGameOver = false;
      loop();
    }

    function loop() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      velocity += gravity;
      birdY += velocity;
      if (birdY < 0) birdY = 0;
      if (birdY > canvas.height) isGameOver = true;

      if (frame % 90 === 0) {
        const top = Math.random() * 200 + 50;
        pipes.push({ x: canvas.width, top, gap: 120 });
      }

      for (let i = pipes.length - 1; i >= 0; i--) {
        pipes[i].x -= 2;
        drawPipe(pipes[i]);
        if (80 + 30 > pipes[i].x && 80 < pipes[i].x + 40 &&
            (birdY < pipes[i].top || birdY > pipes[i].top + pipes[i].gap)) {
          isGameOver = true;
        }
        if (pipes[i].x + 40 < 80 && !pipes[i].passed) {
          score++;
          pipes[i].passed = true;
        }
        if (pipes[i].x + 40 < 0) {
          pipes.splice(i, 1);
        }
      }

      drawBird();
      ctx.fillStyle = '#c9184a';
      ctx.font = '20px Arial';
      ctx.fillText('Skor: ' + score, 10, 30);

      if (isGameOver) {
        ctx.font = '24px Arial';
        ctx.fillText('💘 Cinta Jatuh 💘', 70, canvas.height / 2 - 20);
        ctx.fillText('Klik/tekan untuk mencoba lagi', 40, canvas.height / 2 + 20);
        backBtn.style.display = 'inline-block';
        return;
      }

      frame++;
      requestAnimationFrame(loop);
    }

    loop();
  </script>

</body>
</html>
