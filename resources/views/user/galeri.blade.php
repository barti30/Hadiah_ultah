<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery 🌸</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap');

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: radial-gradient(circle at top, #2a003f, #0d001a);
            color: white;
            overflow: hidden;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            animation: fadeIn 2s ease-in-out;
        }

        h1 {
            color: #ffb6f9;
            font-weight: 600;
            font-size: 2.2em;
            margin-bottom: 60px;
            text-shadow: 0 0 20px rgba(255, 150, 255, 0.7);
            animation: glowText 2s infinite alternate;
        }

        .top-buttons {
            position: absolute;
            top: 20px;
            right: 30px;
            display: flex;
            gap: 10px;
        }

        .btn {
            background-color: #ff5f8f;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 20px;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            background-color: #ff80ab;
        }

        .carousel {
            width: 400px;
            height: 250px;
            position: relative;
            transform-style: preserve-3d;
            animation: rotate 28s infinite linear;
        }

        .carousel video {
            position: absolute;
            width: 200px;
            height: 130px;
            left: 80px;
            top: 40px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 0 25px rgba(255, 182, 249, 0.6), 0 0 40px rgba(255, 20, 147, 0.3);
            opacity: 0;
            animation: fadeInVideo 2s forwards;
        }

        /* posisi rotasi setiap video */
        .carousel video:nth-child(1) { transform: rotateY(0deg) translateZ(250px); animation-delay: 0.3s; }
        .carousel video:nth-child(2) { transform: rotateY(60deg) translateZ(250px); animation-delay: 0.6s; }
        .carousel video:nth-child(3) { transform: rotateY(120deg) translateZ(250px); animation-delay: 0.9s; }
        .carousel video:nth-child(4) { transform: rotateY(180deg) translateZ(250px); animation-delay: 1.2s; }
        .carousel video:nth-child(5) { transform: rotateY(240deg) translateZ(250px); animation-delay: 1.5s; }
        .carousel video:nth-child(6) { transform: rotateY(300deg) translateZ(250px); animation-delay: 1.8s; }

        /* efek animasi */
        @keyframes rotate {
            from { transform: rotateY(0deg); }
            to { transform: rotateY(360deg); }
        }

        @keyframes glowText {
            from { text-shadow: 0 0 10px #ff99ff, 0 0 20px #ff66ff; }
            to { text-shadow: 0 0 25px #ffb6f9, 0 0 40px #ff66cc; }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInVideo {
            to { opacity: 1; }
        }
    </style>
</head>
<body>

  <div class="top-buttons">
    <button class="btn" onclick="logout()">Logout</button>

  </div>

    <h1>Gallery 🌸</h1>

    <div class="carousel">
        @foreach($videos as $video)
            @if($video->video)
                <video autoplay muted loop playsinline>
                    <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                </video>
            @endif
        @endforeach
    </div>
    <script>
       function logout() {
            window.location.href = "/dashboard"; // arahkan ke Dashboard setelah logout
        }
    </script>

</body>
</html>