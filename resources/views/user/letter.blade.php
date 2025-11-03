<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Selamat Ulang Tahun Sayang 💙</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(to bottom, #ffffff, #e0f0ff);
    }
    .glow {
      box-shadow: 0 0 25px #6ea8fe;
      animation: glow 2s infinite alternate;
    }
    @keyframes glow {
      from { box-shadow: 0 0 15px #6ea8fe; }
      to { box-shadow: 0 0 35px #6ea8fe; }
    }
    .fade-up {
      animation: fadeUp 1.5s ease-out forwards;
    }
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(100px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>

<body class="flex flex-col items-center justify-center min-h-screen text-center overflow-hidden">

  <!-- Judul -->
  <h1 class="text-2xl md:text-3xl font-semibold text-blue-600 mb-6 animate-pulse glow rounded-xl px-3 py-2">
    Selamat Ulang Tahun Sayang 💙
  </h1>

  <!-- Foto -->
  <div id="foto-container" class="relative mb-6 flex justify-center">
    <img src="{{ asset('images/foto1.jpg') }}" alt="Foto Ulang Tahun"
      id="foto"
      class="w-48 h-48 object-cover rounded-2xl glow border-4 border-blue-400 shadow-xl transition-all duration-700">
  </div>

  <!-- Kata-kata -->
  <div id="kata-container"
       class="text-gray-700 text-lg w-4/5 md:w-2/3 transition-all duration-700 opacity-100">
    Kamu itu hadiah terindah buat aku, yang selalu bisa bikin hari-hariku hangat 💙
    Tetaplah jadi kamu yang manis, lembut, dan penuh tawa yaa 😘
  </div>

  <!-- Tombol navigasi -->
  <div class="flex justify-between w-2/3 mt-10">
    <button id="prev"
      class="bg-blue-300 text-white px-4 py-2 rounded-xl hover:bg-blue-400 transition">
      Sebelumnya
    </button>
    <button id="next"
      class="bg-blue-500 text-white px-4 py-2 rounded-xl hover:bg-blue-600 transition">
      Selanjutnya
    </button>
  </div>

  <!-- Musik autoplay -->
  <audio id="musik" autoplay>
    <source src="{{ asset('audio/akbar1.mp3') }}" type="audio/mpeg">
    Browser kamu tidak mendukung pemutar musik.
  </audio>

  <script>
    AOS.init();

    // Data teks dan foto
    const slides = [
      {
        text: "Kamu itu hadiah terindah buat aku, yang selalu bisa bikin hari-hariku hangat 💙 Tetaplah jadi kamu yang manis, lembut, dan penuh tawa yaa 😘",
        foto: "{{ asset('images/rumah.jpg') }}"
      },
      {
        text: "Di umur barumu ini, semoga langkahmu makin mantap, hatimu makin kuat, dan semua mimpi yang kamu simpan... pelan-pelan jadi nyata 🌟",
        foto: "{{ asset('images/asu.jpg') }}"
      },
      {
        text: "Aku sayang banget sama kamu 💕 Happy sweet seventeen, my favorite person in the whole world 🌹💙",
        foto: "{{ asset('images/well.jpg') }}"
      }
    ];

    let index = 0;
    const kataContainer = document.getElementById('kata-container');
    const foto = document.getElementById('foto');
    const musik = document.getElementById('musik');

    document.getElementById('next').addEventListener('click', nextSlide);
    document.getElementById('prev').addEventListener('click', prevSlide);

    function nextSlide() {
      index = (index + 1) % slides.length;
      updateSlide();
    }

    function prevSlide() {
      index = (index - 1 + slides.length) % slides.length;
      updateSlide();
    }

    function updateSlide() {
      // hilangkan sementara
      kataContainer.classList.add('opacity-0');
      foto.classList.add('opacity-0', 'scale-95');

      setTimeout(() => {
        foto.src = slides[index].foto;
        kataContainer.innerHTML = slides[index].text;

        // Slide terakhir → foto muncul dari bawah
        if (index === slides.length - 1) {
          foto.classList.add('fade-up');
        } else {
          foto.classList.remove('fade-up');
        }

        foto.classList.remove('opacity-0', 'scale-95');
        kataContainer.classList.remove('opacity-0');
      }, 400);
    }

    // Auto slide setiap 6 detik
    const interval = setInterval(() => {
      if (index === slides.length - 1) {
        clearInterval(interval);
        // Saat musik selesai → redirect
        musik.addEventListener('ended', () => {
          window.location.href = "/dashboard";
        });
      } else {
        nextSlide();
      }
    }, 6000);

    // Pastikan autoplay jalan
    document.addEventListener('click', () => {
      musik.play().catch(() => {});
    });
  </script>
</body>
</html>
