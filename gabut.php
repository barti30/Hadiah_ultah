<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Memories</title>
    <style>
        body {
            background: linear-gradient(135deg, #ffe6f0, #fff0f6, #ffe0eb);
            font-family: 'Poppins', sans-serif;
            text-align: center;
            color: #444;
            margin: 0;
            padding: 20px;
            overflow-x: hidden;
            transition: background 2s ease;
        }

        h1 {
            font-family: 'Alex Brush', cursive;
            color: #ff4d88;
            font-size: 60px;
            text-align: center;
            margin-bottom: 10px;
            text-shadow: 2px 2px 6px rgba(255, 108, 167, 0.4);
        }

        a.back-btn {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            background: #ff80b3;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 600;
            transition: 0.3s;
            box-shadow: 0 0 10px rgba(255, 128, 179, 0.4);
        }

        a.back-btn:hover {
            background: #ff4d88;
            transform: scale(1.05);
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            max-width: 1100px;
            margin: auto;
            padding-top: 20px;
        }

        .memory {
            background: rgba(255, 255, 255, 0.65);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 25px;
            padding: 25px;
            border: 1.5px solid rgba(255, 122, 172, 0.28);
            max-width: 550px;
            box-shadow: 0 10px 25px rgba(255, 150, 190, 0.38);
            transition: transform .35s ease, box-shadow .35s ease;

            opacity: 0;
            transform: scale(0.9);
            animation: popCute 0.8s ease-out forwards;
        }

        .memory {
          position: relative; /* supaya love bisa muncul di atas card */
          overflow: hidden;
        }

        .memory-title {
            font-family: 'Quicksand', sans-serif;
            font-weight: 700;
            color: #b3005c;
            font-size: 20px;
        }

        .memory-desc {
            font-family: 'Quicksand', sans-serif;
            font-size: 15;
            color: #673f50;
        }

/* Efek love */
.memory::before {
    content: "💗";
    position: absolute;
    font-size: 45px;
    opacity: 0;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0.5);
    transition: 0.6s ease;
    pointer-events: none;
}

.memory:hover::before {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1.2);
    animation: lovepulsate 1.6s infinite ease-in-out;
}

/* --- Flip Card Container --- */
.flip-card {
  background: transparent;
  width: 260px;
  height: 320px;
  perspective: 1000px; /* penting untuk efek 3D */
  margin: auto;
}

/* --- Bagian dalam (yang akan berputar) --- */
.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  transition: transform 0.8s ease;
  transform-style: preserve-3d;
  border-radius: 35px;
}

/* --- Saat hover card berputar --- */
.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

/* --- Sisi Card --- */
.flip-card-front,
.flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden; /* supaya sisi belakang tidak terlihat dari depan */
  border-radius: 35px;
  padding: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;

  background: linear-gradient(135deg, #ffe3f4, #ffd9ec);
  box-shadow: 0 10px 18px rgba(255, 110, 160, 0.35);
}

/* --- Tampilan Depan --- */
.flip-card-front {
  background: rgba(255,255,255,0.45);
  backdrop-filter: blur(10px);
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  padding: 15px;
}

/* --- Tampilan Belakang (yang muncul setelah flip) --- */
.flip-card-back {
  background: rgba(255,255,255,0.55);
  backdrop-filter: blur(10px);
  transform: rotateY(180deg);
  padding: 15px;
  text-align: center;
}

/* --- Gambar --- */
.flip-card-back img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 30px;
}

/* Efek glow pink saat hover */
.flip-card:hover .flip-card-front,
.flip-card:hover .flip-card-back {
    box-shadow: 0 0 30px rgba(255, 150, 195, 0.55);
}



        .memory h2 {
            color: #ff4d88;
            font-size: 1.8em;
            font-weight: 600;
            text-shadow: 0px 1px 8px rgba(255, 140, 180, 0.3)
        }

        .memory p {
            font-size: 1.1em;
            color: #555;
            margin-bottom: 10px;
            font-style: italic;
        }

        img, video, audio {
            width: 100%;
            height: 260px;
            object-fit: cover;
            border-radius: 18px;
            box-shadow: 0 6px 18px rgba(255, 133, 184, 0.35)
            margin-top: 10px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Animasi masuk lembut saat card muncul */
        @keyframes fadePop {
          0% { opacity: 0; transform: scale(0.85); }
          100% { opacity: 1; transform: scale(1); }
        }

        @keyframes lovepulsate {
            0% { transform: translate(-50%, -50%) scale(1); opacity: 0.7;}
            50% { transform: translate(-50%, -50%) scale(1.3); opacity: 1;}
            100% { transform: translate(-50%, -50%) scale(1); opacity: 0.7;}


        }

        @keyframes popCute {
            0% {
              opacity: 0;
              transform: scale(0.85);
            }
            60% {
              opacity: 1;
              transform: scale(1.05);
            }
            100% {
              opacity: 1;
             transform: scale(1);
            }
       }

        /* 🌸 Efek bunga */
        .flower {
            position: fixed;
            font-size: 20px;
            animation: fall 6s linear infinite;
            opacity: 0.8;
            z-index: 9999;
        }

        @keyframes fall {
            0% { transform: translateY(-10vh) rotate(0deg); opacity: 1; }
            100% { transform: translateY(110vh) rotate(360deg); opacity: 0; }
        }

        /* 💕 Efek hati */
        .heart {
            position: fixed;
            color: #ff4d88;
            font-size: 18px;
            animation: floatUp 5s linear infinite;
            opacity: 0.7;
            z-index: 9999;
        }

        @keyframes floatUp {
            from { transform: translateY(100vh) scale(1); opacity: 0.8; }
            to { transform: translateY(-10vh) scale(1.3); opacity: 0; }
        }

        /* ✨ Transisi lembut antar halaman */
        .fade-enter {
            opacity: 0;
            transform: scale(0.95);
        }

        .fade-enter-active {
            opacity: 1;
            transform: scale(1);
            transition: all 0.6s ease;
        }
    </style>
</head>
<body class="fade-enter">
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">

    <h1>💖 My Memories 💖</h1>
    <a href="{{ route('dashboard') }}" class="back-btn">⬅ Back to Dashboard</a>

    <div class="gallery">
    @foreach($memories as $memory)
        <div class="flip-card">
            <div class="flip-card-inner">
            
            <div class="flip-card-front">
              <h2 class="memory-title">{{ $memory->title }}</h2>
              <p class="memory-desc">{{ $memory->message }}</p>
            </div>
           
            <div class="flip-card-back">
            @if($memory->image)
                <img src="{{ asset('storage/' . $memory->image) }}" alt="Memory Image">
            @endif

            @if($memory->music)
                <audio id="bg-music" autoplay loop hidden>
                    <source src="{{ asset('storage/' . $memory->music) }}" type="audio/mpeg">
                    Your browser does not support audio playback.
                </audio>
            @endif
            </div>
        </div>
        </div>
    @endforeach
    </div>

    <script>
        // 💕 Efek hati melayang
        setInterval(() => {
            const heart = document.createElement('div');
            heart.classList.add('heart');
            heart.textContent = '💖';
            heart.style.left = Math.random() * 100 + 'vw';
            heart.style.fontSize = Math.random() * 20 + 10 + 'px';
            document.body.appendChild(heart);
            setTimeout(() => heart.remove(), 5000);
        }, 400);

        // 🌸 Efek bunga jatuh
        setInterval(() => {
            const flower = document.createElement('div');
            flower.classList.add('flower');
            flower.textContent = '🌸';
            flower.style.left = Math.random() * 100 + 'vw';
            flower.style.fontSize = Math.random() * 25 + 15 + 'px';
            document.body.appendChild(flower);
            setTimeout(() => flower.remove(), 6000);
        }, 700);

        // ✨ Animasi masuk lembut
        window.addEventListener("DOMContentLoaded", () => {
            document.body.classList.add("fade-enter-active");
        });
    </script>

</body>
</html>