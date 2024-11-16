<?php
session_start();
$correctPassword = 'helloworld';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['password']) && $_POST['password'] === $correctPassword) {
        $_SESSION['admin2_access'] = true;
        header("Location: teachers_logs.php");
        exit();
    } else {
        $error = "Incorrect password. Please try again.";
    }
}

if (isset($_SESSION['admin2_access'])) {
    header("Location: teachers_logs.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher's Portal | MIS-FUMB Attendance System</title>
    <link rel="icon" type="image/x-icon" href="muet.png" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #e8f0fe;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .navbar {
            width: 100%;
            background-color: #f5f5f5;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            animation: fadeIn 0.5s ease-in-out;
            justify-content: space-between;
        }

        .navbar img {
            height: 40px;
            margin-right: 10px;
        }

        .navbar h1 {
            font-size: 1.5rem;
            color: #004080;
            display: flex;

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

        .container {
            width: 100%;
            max-width: 900px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 80px;
            text-align: center;
            animation: slideIn 0.6s ease;
            overflow-x: auto;
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

        h2 {
            color: #004080;
            margin-bottom: 20px;
        }

        .error {
            color: red;
            margin-top: 10px;
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

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            .navbar h1 {
                font-size: 1.2rem;
            }

            .navbar img {
                height: 30px;
            }

            .container h2 {
                font-size: 1.5rem;
            }

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

            .navbar,
            footer {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .navbar h1 {
                font-size: 1rem;
            }

            .navbar img {
                height: 44px;
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
            <a href="developer.html">Developers</a>
        </div>
        <div class="navbar-toggle" onclick="toggleNavbar()">☰</div>
    </div>
    <div class="container">
        <h1 style="color:#004080;">Teacher's Portal</h1>
        <form method="post" action="teachers_login.php">
            <input type="password" name="password" placeholder="Enter Password" required>
            <button type="submit">Login</button>
            <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        </form>
    </div>
    <footer>
        <p>All Rights Reserved © <a href="developer.html" style="font-weight: bold; text-decoration: none; color:#fff">Umer Qureshi</a></p>
    </footer>
    <script>
        function toggleNavbar() {
            document.querySelector('.navbar-links').classList.toggle('active');
        }
    </script>
</body>

</html>