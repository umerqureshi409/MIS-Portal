<?php
session_start();

if (!isset($_SESSION['admin2_access'])) {
    header("Location: teachers_login.php");
    exit();
}

if (isset($_GET['logout2'])) {
    session_destroy();
    header("Location: teachers_login.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIS|FUMB Teachers' Logs and Photos</title>
    <link rel="icon" type="image/x-icon" href="muet.png" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #fff;
            color: #004080;
            width: 100%;
            padding: 10px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .navbar h1 {
            font-size: 1.5rem;
            color: #004080;
            margin: 0;
            display: inline-flex;
            align-items: center;
        }

        .navbar img {
            height: 60px;
            margin-right: 15px;
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
        }

        /* 
.container {
    max-width: 800px;
    padding: 20px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    margin: 40px auto;
    text-align: center;
} */
        .container {
            flex: 1;
            max-width: 800px;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin: 40px auto;
            text-align: center;
        }

        h2 {
            color: #004080;
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
            padding: 10px;
            text-align: center;
        }

        input[type="password"],
        button {
            padding: 10px;
            max-width: 300px;
            font-size: 1rem;
            margin: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 80%;
        }

        button {
            background-color: #004080;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        button:hover {
            background-color: #003366;
            transform: scale(1.05);
        }


        .photo-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
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
            width: 100%;
            position: relative;

            bottom: 0;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            * {
                box-sizing: content-box;
            }

            .navbar {
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
            table{ display: block;          
    width: 100%;             
    max-width: 100vw;        
    overflow-x: auto;        
    border-collapse: collapse;
    margin: 20px auto;       
    background-color: #f5f5f5;
}

        }

        @media (max-width: 600px) {
            * {
                box-sizing: content-box;
            }

            .navbar {
                width: 101%;
            }

            .navbar h1 {
                font-size: 1.2rem;
            }

            .container h2 {
                font-size: 1.5rem;
            }

            table{ display: block;          
    width: 100%;             
    max-width: 100vw;        
    overflow-x: auto;        
    border-collapse: collapse;
    margin: 20px auto;       
    background-color: #f5f5f5;
}

            th,
            td {
                padding: 8px;
                font-size: 0.9rem;
            }

            footer {
                width: 107%;
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
            <a href="?logout2=true" class="logout-button" style="color: #fff;">Logout</a>
        </div>
        <div class="navbar-toggle" onclick="toggleNavbar()">☰</div>
    </div>

    <div class="container">
        <h2>Teacher's Logs</h2>
        <?php
        function displayCsvLogs($filename)
        {
            if (($handle = fopen($filename, "r")) !== FALSE) {
                echo "<table>";
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    echo "<tr>";
                    foreach ($data as $cell) {
                        echo "<td>" . htmlspecialchars($cell) . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
                fclose($handle);
            } else {
                echo "Could not open the file: " . htmlspecialchars($filename);
            }
        }

        $studentLogs = glob('C:/Users/aymie/source/repos/ATTENDENCEBYFACEDETECTION/ATTENDENCEBYFACEDETECTION/teacherattendance_log.csv');
        foreach ($studentLogs as $file) {
            echo "<h3>Log: " . htmlspecialchars(basename($file)) . "</h3>";
            displayCsvLogs($file);
        }
        ?>

        <h2>Teacher Photos</h2>
        <div class="photo-container">
            <?php
            $teacherPhotoDir = 'teacher_photos/';
            $teacherPhotos = glob($teacherPhotoDir . "*.jpg");
            foreach ($teacherPhotos as $photo) {
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