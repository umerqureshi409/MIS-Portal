<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investment | MIS-FUMB</title>
    <link rel="icon" type="image/x-icon" href="muet.png" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            color: #333;
            background-color: #f0f4f8;
        }

        .navbar {
            display: flex;
            align-items: center;
            background-color: #fff;
            color: #004080;
            padding: 10px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar img {
            height: 50px;
            margin-right: 15px;
            transition: transform 0.3s;
        }

        .navbar img:hover {
            transform: scale(1.1);
        }

        .navbar h1 {
            font-size: 1.5rem;
            margin: 0;
            display: inline-flex;
            align-items: center;
            color: #004080;
        }

        .navbar-links {
            display: flex;
            gap: 15px;
            margin-left: auto;
        }

        .navbar-links a {
            color: #004080;
            text-decoration: none;
            font-weight: bold;
            font-size: 1rem;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .navbar-links a:hover {
            background-color: #0073e6;
            color: #fff;
        }

        .navbar-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #004080;
        }

        .donation-container {
            padding: 2em;
            text-align: center;
            animation: fadeIn 1s ease-in;
        }

        .donation-content {
            max-width: 800px;
            margin: auto;
            background: #ffffff;
            padding: 2em;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: slideIn 1s ease-out;
        }

        h1 {
            font-size: 2em;
            color: #004080;
        }

        p {
            font-size: 1.1em;
            line-height: 1.6;
            margin-bottom: 1.5em;
        }

        .qr-section {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 1.5em;
        }

        .qr-card {
            width: 200px;
            text-align: center;
            transition: transform 0.3s;
            margin: 10px;
        }

        .qr-card:hover {
            transform: scale(1.05);
        }

        .qr-image {
            width: 100%;
            max-width: 150px;
            border: 2px solid #004080;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .payment-logo {
            width: 80px;
            margin-top: 0.5em;
        }

        .donation-instructions {
            margin-top: 2em;
            font-style: italic;
            color: #555;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #004080;
            color: white;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .fullscreen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .fullscreen img {
            max-width: 90%;
            max-height: 90%;
            border-radius: 8px;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @media (max-width: 768px) {
            .navbar h1 {
                font-size: 1.2rem;
            }

            .navbar-links {
                display: none;
                flex-direction: column;
                gap: 10px;
                background-color: #fff;
                color: #004080;
                position: absolute;
                top: 60px;
                right: 20px;
                padding: 10px;
                border-radius: 5px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            .navbar-links.active {
                display: flex;
            }

            .navbar-toggle {
                display: inline;
                margin-left: auto;
            }

            .qr-section {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>

<div class="navbar">
    <h1><a href="index.php">
        <img src="muet.png" alt="Mehran University Logo" />
    </a>FUMB | INVEST</h1>
    <div class="navbar-links">
        <a href="index.php">Home</a>
        <a href="developer.html">Developers</a>
    </div>
    <div class="navbar-toggle" onclick="toggleNavbar()">☰</div>
</div>

<main class="donation-container">
    <section class="donation-content">
        <h1>Invest In Our Project</h1>
        <p>Your can invest and become part of our projects. You can invest through Easypaisa or JazzCash by scanning the QR codes below:</p>
        
        <div class="qr-section">
            <div class="qr-card">
                <img src="money-transfer/jazz-qr.jpg" alt="JazzCash QR Code" class="qr-image" onclick="openFullscreen(this.src)">
                <div class="qr-info">
                    <img src="money-transfer/jazz.png" alt="JazzCash Logo" class="payment-logo">
                    <p>Scan with JazzCash to invest</p>
                </div>
            </div>
            
            <div class="qr-card">
                <img src="money-transfer/easypaisa-qr.jpg" alt="Easypaisa QR Code" class="qr-image" onclick="openFullscreen(this.src)">
                <div class="qr-info">
                    <img src="money-transfer/easypaisa.png" alt="Easypaisa Logo" class="payment-logo">
                    <p>Scan with Easypaisa to invest</p>
                </div>
            </div>
        </div>

        <div class="donation-instructions">
            <p><strong>Instructions:</strong> Open the JazzCash or Easypaisa app, choose the "Scan QR" option, and scan the relevant code to transfer your investment directly to us.</p>
        </div>
    </section>
</main>

<footer>
    <p>All Rights Reserved © <a href="developer.html" style="color: #fff; font-weight:bold;text-decoration: none;">Umer Qureshi</a></p>
</footer>

<div id="fullscreenModal" class="fullscreen" style="display: none;" onclick="closeFullscreen()">
    <img id="fullscreenImage" src="" alt="QR Code Fullscreen View">
</div>

<script>
    function toggleNavbar() {
        document.querySelector('.navbar-links').classList.toggle('active');
    }

    function openFullscreen(src) {
        document.getElementById('fullscreenImage').src = src;
        document.getElementById('fullscreenModal').style.display = 'flex';
    }

    function closeFullscreen() {
        document.getElementById('fullscreenModal').style.display = 'none';
    }
</script>
</body>
</html>
