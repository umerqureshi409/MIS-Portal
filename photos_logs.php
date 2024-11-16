<?php
session_start();

if (!isset($_SESSION['admin1_access'])) {
    header("Location: photos_login.php");
    exit();
}

if (isset($_GET['logout1'])) {
    session_destroy();
    header("Location: photos_login.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIS|FUMB Student Photo Logs</title>
    <link rel="icon" type="image/x-icon" href="muet.png" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .navbar {
            display: flex;
            align-items: center;
            background-color: #f5f5f5;
            color: #004080;
            text-align: center;
            justify-content: space-between;
            padding: 10px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar img {
            height: 60px;
            margin-right: 15px;
        }

        .navbar h1 {
            font-size: 1.5rem;
            color: #004080;
            margin: 0;
            display: inline-flex;
            align-items: center;
        }

        .navbar-links {
            display: flex;
            gap: 15px;
        }

        .navbar-links a {
            color: #004080;
            text-decoration: none;
            font-size: 1rem;
            padding: 10px 20px;
            font-weight: bold;
            transition: color 0.3s;
        }

        .navbar-links a:hover {
            color: #0073e6;
        }

        .navbar-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .logout-button {
            background-color: #d9534f;
            color: white;
            border: none;

            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .logout-button:hover {
            background-color: #004080;
        }

        .container {
            max-width: 300px;
            margin: 40px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
            text-align: center;
            justify-content: center;
            align-items: center;
        }

        h2 {
            color: #004080;
        }

        input[type="password"],
        button {
            padding: 10px;
            font-size: 1rem;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 80%;
        }

        button {
            background-color: #004080;
            color: white;
            border: none;
            cursor: pointer;
            margin-left: 10px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #003366;
        }

        .photo-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .photo-container img {
            width: 150px;
            height: 150px;
            margin: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #004080;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }


        .footer a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            * {
                box-sizing: content-box;
            }

            .navbar {
                width: 90%;
            }

            .navbar h1 {
                font-size: 1.2rem;
            }

            .container h2 {
                font-size: 1.5rem;
            }

            .footer {
                width: 139%;
            }

            .logout-button {
                padding: 5px 10px;
                font-size: 0.8rem;
            }

            th,
            td {
                padding: 8px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 768px) {
            .navbar-links {
                display: none;
                flex-direction: column;
                gap: 10px;
                background-color: #f5f5f5;
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
            }

            .logout-button {
                padding: 8px 16px;
                font-size: 0.9rem;
            }
        }
        
    </style>
</head>

<body>
    <div class="navbar">
        <h1><a href="index.php">
                <img src="muet.png" alt="Mehran University Logo" />
            </a> MIS - FUMB</h1>
        <div class="navbar-links">
            <a href="index.php">Home</a>

            <a href="contact.html">Contact</a>
            <a href="?logout1=true" class="logout-button" style="color: #fff;">Logout</a>
        </div>
        <div class="navbar-toggle" onclick="toggleNavbar()">☰</div>
    </div>
    <div class="container">

        <h2>Student Photo Logs</h2>
        <div class="photo-container">
            <?php
            $photoDir = 'student_photos/';
            $photos = glob($photoDir . "*.jpg");
            foreach ($photos as $photo) {
                $filename = basename($photo, ".jpg");
                echo "<div>";
                echo "<img src='$photo' alt='$filename'>";
                echo "<p>$filename</p>";
                echo "</div>";
            }
            ?>
        </div>

    </div>

    <footer>
        <p>All Rights Reserved © <a href="developer.html" style="font-weight: bold; color:#fff; text-decoration: none;">Umer Qureshi</a></p>
    </footer>
    <script>
        function toggleNavbar() {
            document.querySelector('.navbar-links').classList.toggle('active');
        }
    </script>
</body>

</html>