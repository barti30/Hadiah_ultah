<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello My Love!</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            height: 100vh;
            background: url('/images/akbar.jpg') no-repeat center center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
        }

        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.8);
            padding: 60px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            animation: fadeIn 1.2s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        img {
            width: 120px;
            margin-bottom: 20px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        h1 {
            font-size: 2.2em;
            color: #d63384;
            margin: 0;
        }

        h2 {
            font-size: 1.6em;
            color: #222;
            font-weight: 600;
            margin: 10px 0 5px 0;
        }

        p {
            color: #555;
            margin-bottom: 30px;
            font-size: 1em;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .btn {
            padding: 12px 30px;
            border: 2px solid #d63384;
            border-radius: 30px;
            background: white;
            color: #d63384;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn:hover {
            background: #d63384;
            color: white;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <div class="container">
        <img src="/images/panda.png" alt="cute">
        <h2>Hello</h2>
        <h1>My Love!</h1>
        <p>Do you want to see your gift?</p>
        <div class="btn-group">
            <a href="/dashboard" class="btn">YES PLEASE 💖</a>
            <a href="/logout" class="btn">NO THANKS 😅</a>
        </div>
    </div>

</body>
</html>