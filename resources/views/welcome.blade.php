<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Liatlah kenangan ini 💞</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #ffb6c1, #ffe4ec, #ffcce7);
      overflow: hidden;
    }

    .login-box {
      background: rgba(255, 255, 255, 0.35);
      border-radius: 20px;
      padding: 40px;
      width: 340px;
      backdrop-filter: blur(10px);
      box-shadow: 0 0 25px rgba(255, 182, 193, 0.4);
      text-align: center;
      position: relative;
      animation: fadeIn 1.5s ease;
      z-index: 2;
    }

    h2 {
      color: #d63384;
      margin-bottom: 20px;
    }

    input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 2px solid #ffb6c1;
      border-radius: 25px;
      outline: none;
      text-align: center;
    }

    button {
      background-color: #ff69b4;
      color: white;
      border: none;
      padding: 12px 30px;
      border-radius: 25px;
      cursor: pointer;
      font-weight: bold;
      transition: 0.3s;
    }

    button:hover {
      background-color: #ff85c1;
    }

    .link {
      display: block;
      margin-top: 15px;
      color: #d63384;
      text-decoration: none;
      font-size: 14px;
    }

    /* Bubble animation */
    .bubble {
      position: absolute;
      bottom: -10px;
      background: rgba(255, 182, 193, 0.4);
      border-radius: 50%;
      animation: floatUp linear infinite;
    }

    @keyframes floatUp {
      0% { transform: translateY(0); opacity: 1; }
      100% { transform: translateY(-110vh); opacity: 0; }
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Login Liatlah kenangan ini💕</h2>
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <input type="email" name="email" placeholder="Email kamu 💌" required>
      <input type="password" name="password" placeholder="Password rahasia 💫" required>
      <button type="submit">Masuk</button>
    </form>
    <a href="{{ route('register') }}" class="link">Belum punya akun? Daftar yuk 💖</a>
  </div>

  <!-- Musik piano lembut -->
  <audio id="bg-music" autoplay loop>
    <source src="{{ asset('audio/piano.mp3') }}" type="audio/mpeg">
  </audio>

  <script>
    // 🫧 Gelembung cinta
    function createBubble() {
      const bubble = document.createElement('div');
      bubble.classList.add('bubble');
      const size = Math.random() * 40 + 10 + 'px';
      bubble.style.width = size;
      bubble.style.height = size;
      bubble.style.left = Math.random() * 100 + 'vw';
      bubble.style.animationDuration = (4 + Math.random() * 3) + 's';
      document.body.appendChild(bubble);
      setTimeout(() => bubble.remove(), 7000);
    }
    setInterval(createBubble, 400);

    // === Fade-in Musik Lembut tapi Keras ===
const audio = document.getElementById('bg-music');
audio.volume = 0; // mulai pelan

const fadeInDuration = 4000; // 4 detik
const fadeStep = 0.02;
const maxVolume = 0.9; // hampir penuh tapi tetap lembut

const fadeInterval = setInterval(() => {
    if (audio.volume < maxVolume) {
        audio.volume = Math.min(audio.volume + fadeStep, maxVolume);
    } else {
        clearInterval(fadeInterval);
    }
}, fadeInDuration * fadeStep);
  </script>
</body>
</html>