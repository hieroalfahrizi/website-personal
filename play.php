<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Menu Game Estetik</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Poppins', sans-serif;
    }

    /* === LOADING SCREEN === */
    #loader {
      position: fixed;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      background: #fff0f5;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      z-index: 9999;
      transition: opacity 0.5s ease;
    }

    #loader img {
      width: 120px;
      animation: bounce 1s infinite;
    }

    #loader p {
      margin-top: 20px;
      font-size: 16px;
      color: #d63384;
      font-weight: 500;
      animation: fadeInText 1s ease-in-out infinite alternate;
    }

    @keyframes bounce {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-15px);
      }
    }

    @keyframes fadeInText {
      from { opacity: 0.5; }
      to { opacity: 1; }
    }

    /* === MAIN CONTENT === */
    #main-content {
      display: none;
      height: 100vh;
      background: linear-gradient(135deg, #ffd6ec, #fbeaff, #dfe7fd);
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
    }

    /* === LOGOUT BUTTON === */
    .logout-btn {
      position: absolute;
      top: 20px;
      right: 30px;
      background-color: #ff4f91;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 25px;
      font-weight: 500;
      font-size: 14px;
      text-decoration: none;
      transition: 0.3s ease;
      box-shadow: 0 4px 10px rgba(255, 105, 180, 0.2);
    }

    .logout-btn:hover {
      background-color: #e13e7a;
      transform: scale(1.05);
    }

    .card-container {
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(10px);
      border-radius: 25px;
      padding: 40px 30px;
      width: 320px;
      text-align: center;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      border: 2px solid #ffc0cb;
      animation: dropFade 1s ease-out;
    }

    @keyframes dropFade {
      from {
        transform: translateY(-20px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .card-title {
      font-size: 26px;
      color: #d63384;
      font-weight: 600;
      margin-bottom: 30px;
    }

    .game-link {
      display: block;
      margin: 16px 0;
      text-decoration: none;
    }

    .game-name {
      padding: 14px 40px;
      background: linear-gradient(135deg, #ff69b4, #ff85a2);
      color: white;
      border-radius: 50px;
      font-size: 16px;
      font-weight: 500;
      transition: all 0.4s ease;
      box-shadow: 0 5px 15px rgba(255, 105, 180, 0.3);
    }

    .game-name:hover {
      transform: scale(1.07);
      background: linear-gradient(135deg, #ff4d94, #ff699e);
      box-shadow: 0 8px 25px rgba(255, 105, 180, 0.5);
      cursor: pointer;
    }
  </style>
</head>
<body>

<!-- LOADER -->
<div id="loader">
  <img src="https://media.giphy.com/media/JIX9t2j0ZTN9S/giphy.gif" alt="Loading Kucing..." />
  <p>Loading... Kucing sedang ngoding 🐱💻</p>
</div>

<!-- MAIN CONTENT -->
<div id="main-content">
  <!-- Logout button -->
  <a href="logout.php" class="logout-btn">Logout</a>

  <!-- Main card -->
  <div class="card-container">
    
    <a href="game.php" class="game-link">
      <div class="game-name">GAME</div>
    </a>
    <a href="memory.php" class="game-link">
      <div class="game-name">MEMORY</div>
    </a>
    
  </div>
</div>

<!-- SCRIPT -->
<script>
  window.addEventListener("load", function () {
    const loader = document.getElementById("loader");
    const content = document.getElementById("main-content");

    setTimeout(() => {
      loader.style.opacity = "0";
      setTimeout(() => {
        loader.style.display = "none";
        content.style.display = "flex";
      }, 500);
    }, 2500); // durasi loading
  });
</script>

</body>
</html>
