<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>These Are For You</title>
  @vite('resources/css/app.css')
</head>
<body>

<audio id="bg-music" autoplay loop>
    <source src="{{ asset('audio/piano.mp3') }}" type="audio/mpeg">
  </audio>

  <div class="container">
    <h1>THESE ARE FOR YOU!</h1>
    <p>I hope you like it. I love you!</p>
    <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>

    <div class="btn-box">
      <div class="btn" onclick="window.location.href='{{ route('memories') }}'">Memories</div>
      <div class="btn" onclick="window.location.href='{{ route('flower') }}'">Flowers</div>
      <div class="btn" onclick="window.location.href='{{ route('letter') }}'">Letter</div>

      <div class="btn" onclick="showFlower()">Love Lock</div>
    </div>
  </div>

  <script>
    // Efek hati melayang 💖
    setInterval(() => {
      const heart = document.createElement("div");
      heart.classList.add("heart");
      heart.style.left = Math.random() * 100 + "vw";
      heart.style.animationDuration = (3 + Math.random() * 2) + "s";
      document.body.appendChild(heart);
      setTimeout(() => heart.remove(), 5000);
    }, 400);

    // Efek bunga mekar 🌸
    function showFlower() {
      const flower = document.createElement("div");
      flower.classList.add("flower");
      flower.style.left = Math.random() * 100 + "vw";
      flower.style.top = Math.random() * 100 + "vh";
      document.body.appendChild(flower);
      setTimeout(() => flower.remove(), 3000);
    }

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