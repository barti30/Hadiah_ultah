<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Cinta 💗</title>
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

    .register-container {
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

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h2 {
      color: #ff69b4;
      font-weight: 600;
      margin-bottom: 20px;
      letter-spacing: 1px;
    }

    input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: none;
      border-radius: 10px;
      background: rgba(255, 240, 245, 0.9);
      font-size: 15px;
      outline: none;
      transition: all 0.3s ease;
    }

    input:focus {
      background: #fff0f6;
      box-shadow: 0 0 10px rgba(255, 182, 193, 0.6);
    }

    button {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 10px;
      background-color: #ff69b4;
      color: white;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    button:hover {
      background-color: #ff1493;
      transform: scale(1.05);
    }

    .note {
      font-size: 13px;
      color: #d87093;
      margin-top: 10px;
    }

    a {
      color: #ff69b4;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    .hearts {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: 1;
    }

    .heart {
      position: absolute;
      color: rgba(255, 182, 193, 0.8);
      font-size: 20px;
      animation: fall 6s linear infinite;
      opacity: 0.7;
    }

    @keyframes fall {
      0% { transform: translateY(-10px) rotate(0deg); opacity: 1; }
      100% { transform: translateY(100vh) rotate(360deg); opacity: 0; }
    }

    .glow {
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,192,203,0.15) 0%, transparent 70%);
      animation: pulse 6s infinite;
    }

    @keyframes pulse {
      0%, 100% { transform: scale(1); opacity: 0.6; }
      50% { transform: scale(1.2); opacity: 1; }
    }
  </style>
</head>
<body>

    <audio id="bg-music" autoplay loop>
    <source src="{{ asset('audio/piano.mp3') }}" type="audio/mpeg">
  </audio>
  <div class="hearts"></div>
  <div class="glow"></div>

  <div class="register-container">
    <h2>Daftar Cinta 💗</h2>

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama kamu 💕" required autofocus>
      <input type="email" name="email" value="{{ old('email') }}" placeholder="Email kamu 💌" required>
      <input type="password" name="password" placeholder="Kata sandi 💖" required>
      <input type="password" name="password_confirmation" placeholder="Ulangi kata sandi 💞" required>

      <button type="submit">Daftar</button>

      <p class="note">
        Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a> ✨
      </p>
    </form>
  </div>

  <script>
    const hearts = document.querySelector('.hearts');
    function buatHati() {
      if (hearts.childElementCount > 10) return;
      const heart = document.createElement('div');
      heart.classList.add('heart');
      heart.innerHTML = '💗';
      heart.style.left = Math.random() * 100 + 'vw';
      heart.style.animationDuration = (6 + Math.random() * 5) + 's';
      heart.style.fontSize = (12 + Math.random() * 20) + 'px';
      hearts.appendChild(heart);
      heart.addEventListener('animationend', () => heart.remove());
    }
    setInterval(buatHati, 1500);

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