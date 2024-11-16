<?php
session_start();

if (!isset($_SESSION['admin3_access'])) {
    header("Location: admin_login.php");
    exit();
}

if (isset($_GET['logout3'])) {
    session_destroy();
    header("Location: admin_login.php");
    exit();
}

$responses = [];
if (($handle = fopen("responses.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $responses[] = $data;
    }
    fclose($handle);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal | MIS-FUMB Attendance System</title>
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
            transition: color 0.3s;
            font-weight: bold;
            padding: 10px 20px;
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
            color: #ccc;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            word-wrap: break-word;
        }

        th {
            background-color: #f2f2f2;
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

            th,
            td {
                padding: 8px;
                font-size: 0.9rem;
            }

            .logout-button {
                padding: 8px 16px;
                font-size: 0.9rem;
            }

            table {
                display: block;
                overflow-x: auto;
                width: 100%;
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
                display: block;
                color: #004080;
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
                height: 34px;
            }

            .logout-button {
                padding: 5px 10px;
                font-size: 0.8rem;
            }

            th,
            td {
                font-size: 0.8rem;
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

            <a href="?logout3=true" class="logout-button" style="color: #fff;">Logout</a>
        </div>
        <div class="navbar-toggle" onclick="toggleNavbar()">☰</div>
    </div>

    <div class="container">

        <h2>Responses Review</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($responses as $response): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($response[0]); ?></td>
                        <td><?php echo htmlspecialchars($response[1]); ?></td>
                        <td><?php echo htmlspecialchars($response[2]); ?></td>
                        <td><?php echo htmlspecialchars($response[3]); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

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