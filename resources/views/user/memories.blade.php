<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kenangan Kita</title>
    <style>
        body {
            background: linear-gradient(180deg, #b300b3, #2b0057);
            font-family: 'Poppins', sans-serif;
            color: pink;
            text-align: center;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #ff8ad6;
            margin-bottom: 40px;
            text-shadow: 0 0 8px rgba(255, 182, 193, 0.7);
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

        .container {
            width: 90%;
            margin: 0 auto;
        }

        /* --- Baris pertama (3 foto sejajar) --- */
        .top-row {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 40px;
        }

        .top-row img {
            width: 200px;
            height: 320px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(255, 105, 180, 0.6);
            transition: transform 0.3s ease;
        }

        .top-row img:hover {
            transform: scale(1.05);
        }

        .title {
            margin-top: 10px;
            color: #ff66c4;
            font-size: 1.1em;
            font-weight: 500;
        }

        /* --- Baris kedua (foto dan deskripsi sejajar menyamping) --- */
        .second-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
        }

        .memory-pair {
            display: flex;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.05);
            padding: 15px 25px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(255, 182, 193, 0.3);
            width: 420px;
            transition: transform 0.3s ease;
        }

        .memory-pair:hover {
            transform: scale(1.03);
        }

        .memory-pair img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 12px;
            margin-right: 20px;
        }

        .description {
            color: #ffcce0;
            font-size: 0.95em;
            text-align: left;
        }

        @media (max-width: 768px) {
            .memory-pair {
                flex-direction: column;
                align-items: center;
                text-align: center;
                width: 90%;
            }

            .memory-pair img {
                margin-right: 0;
                margin-bottom: 10px;
            }

            .description {
                text-align: center;
            }

            .audio {
             display: none;
            }
        }
    </style>
</head>
<body>

    <div class="top-buttons">
        <button class="btn" onclick="goToGallery()">Galeri 📸</button>
        <button class="btn" onclick="logout()">Logout</button>
    </div>

    <h1>💖 Kenangan Kita 💖</h1>

    <!-- Baris pertama: 3 foto sejajar -->
    <div class="top-row">
        @foreach($memories->take(3) as $memory)
            <div>
                <img src="{{ asset('storage/' . $memory->image) }}">
            </div>
        @endforeach
    </div>

    <!-- Baris kedua: foto dan deskripsi menyamping -->
    <div class="second-row">
        @foreach($memories->skip(3) as $memory)
            <div class="memory-pair">
                <img src="{{ asset('storage/' . $memory->image) }}" alt="{{ $memory->title }}">
                <div class="description">
                    <h3 style="color:#ff8ad6; margin-bottom:5px;">{{ $memory->title }}</h3>
                    <p>{{ $memory->message }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <audio autoplay loop>
        <source src="/audio/memori.mp3" type="audio/mpeg">
    </audio>

    <script>
        function logout() {
            window.location.href = "/dashboard"; // arahkan ke Dashboard setelah logout
        }

        function goToGallery() {
            window.location.href = "/galeri";
        }
    </script>

</body>
</html>