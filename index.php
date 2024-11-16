<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance System | MIS-FUMB</title>
    <link rel="icon" type="image/x-icon" href="muet.png" />
    <style>
        body {
            font-family: Arial, sans-serif;

            background: #fff;
            color: #000;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            text-align: center;
            padding: 50px 20px;
            flex-grow: 1;
        }

        .container img {
            width: 150px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .button-container {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;

        }

        .button {
            background-color: #004080;
            box-shadow: 0 0 10px #000;
            color: #fff;
            padding: 15px 30px;
            margin: 10px;
            border-radius: 8px;
            border: none;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.3s;
            width: 130px;
            text-align: center;
        }

        .button:hover {
            background-color: #e0e0e0;
            color: #004080;
        }

        .footer {
            text-align: center;
            padding: 10px;
            background-color: #002d66;
            color: #fff;
            font-size: 0.9rem;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @media (min-width: 600px) {
            .button-container {
                flex-direction: row;
                justify-content: center;
            }

            .button {
                margin: 10px 15px;
            }
        }

        @media (max-width: 400px) {
            h1 {
                font-size: 2rem;
            }

            p {
                font-size: 1rem;
            }

            .button {
                font-size: 0.9rem;
                padding: 10px 20px;
            }
        }

        .marquee-container {
            width: 100%;
            overflow: hidden;
            background-color: #004080;
            color: white;
            padding: 10px 0;
            text-align: center;
            font-size: 1.2rem;
        }


        .marquee {
            display: inline-block;
            padding-left: 100%;
            animation: slide 20s linear infinite;
            white-space: nowrap;
            font-weight: bold;
          
        }


        @keyframes slide {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }
    </style>
</head>

<body>

    <div class="marquee-container">
        <div class="marquee"> بِسْمِ ٱللّٰهِ ٱلرَّحْمٰنِ ٱلرَّحِيمِ </div>
    </div>
    <div class="container">
        <a href="index.php">
            <img src="muet.png" alt="Mehran University Logo" />
        </a>

        <h1>Attendance System</h1>
        <p>Welcome to the management information attendance system. Please choose an option below.</p>
        <div class="button-container">
            <a href="student_logs.php" class="button">Student's Logs</a>
            <a href="photos_logs.php" class="button">Photo Panel</a>
            <a href="teachers_logs.php" class="button">Teacher's Panel</a>
            <a href="admin_portal.php" class="button">Admin Panel</a>
            <a href="about_us.php" class="button">About Us</a>
            <a href="support.php" class="button">Invest In Project</a>
        </div>
    </div>

    <div class="footer">
        <p>All Rights Reserved © <a href="developer.html">Umer Qureshi</a></p>
    </div>

</body>

</html>