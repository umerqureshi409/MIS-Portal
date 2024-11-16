<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIS|FUMB Students' Logs</title>
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
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            display: flex;
            align-items: center;
            background-color: #fff;
            color: #004080;
            width: 100%;
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
            transition: color 0.3s;
            font-weight: bold;
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
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            flex-grow: 1;
        }

        h2 {
            text-align: center;
            color: #004080;
            font-size: 2rem;
            padding: 20px;
        }

        /* Modern Search Styling */
        .search-form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .search-form input[type="text"] {
            width: 70%;
            padding: 12px 15px;
            border: 2px solid #004080;
            border-radius: 30px;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .search-form input[type="text"]:focus {
            border-color: #0073e6;
        }

        .search-form button {
            padding: 12px 20px;
            margin-left: 20px;
            background-color: #004080;
            border: none;
            border-radius: 30px;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-form button:hover {
            background-color: #fff;
            color: #004080;
            border: 1px solid #004080;
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

        .footer {
            text-align: center;
            padding: 10px;
            background-color: #004080;
            color: white;
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
        @media (max-width: 600px) {
            * {
                box-sizing: content-box;
            }

            .navbar {
                width: 105%;
            }

            .navbar h1 {
                font-size: 1.2rem;
            }
            .container{
                margin-left: 6px;
            }

            .container h2 {
                font-size: 1.5rem;
            }

            .footer {
                width: 110%;
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
h2{
    font-size: 1.7rem;
}
            .navbar-toggle {
                display: inline;
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
        </div>
        <div class="navbar-toggle" onclick="toggleNavbar()">☰</div>
    </div>

    <div class="container">
        <h2>Student's Attendance Logs</h2>

        <form method="POST" action="" class="search-form">
            <input type="text" name="search_query" placeholder="Search by Name or ID" required>
            <button type="submit">Search</button>
        </form>

        <?php
        function displayCsvLogs($filename, $searchQuery = null)
        {
            if (($handle = fopen($filename, "r")) !== FALSE) {
                echo "<table>";
                $isFirstRow = true;
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    if ($isFirstRow) {
                        echo "<tr>";
                        foreach ($data as $cell) {
                            echo "<th>" . htmlspecialchars($cell) . "</th>";
                        }
                        echo "</tr>";
                        $isFirstRow = false;
                    } else {
                     
                        if ($searchQuery) {
                            $found = false;
                            foreach ($data as $cell) {
                                if (stripos($cell, $searchQuery) !== false) {
                                    $found = true;
                                    break;
                                }
                            }
                            if (!$found) {
                                continue;
                            }
                        }
                        echo "<tr>";
                        foreach ($data as $cell) {
                            echo "<td>" . htmlspecialchars($cell) . "</td>";
                        }
                        echo "</tr>";
                    }
                }
                echo "</table>";
                fclose($handle);
            } else {
                echo "Could not open the file: " . htmlspecialchars($filename);
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search_query'])) {
            $searchQuery = $_POST['search_query'];
        } else {
            $searchQuery = null;
        }

        $studentLogs = glob('C:/Users/aymie/source/repos/ATTENDENCEBYFACEDETECTION/ATTENDENCEBYFACEDETECTION/studentattendance_log.csv');
        foreach ($studentLogs as $file) {
            echo "<h3>Log: " . htmlspecialchars(basename($file)) . "</h3>";
            displayCsvLogs($file, $searchQuery);
        }
        ?>
    </div>

    <div class="footer">
        <p>All Rights Reserved © <a href="developer.html" style="font-weight: bold; color:#fff; text-decoration: none;">Umer Qureshi</a></p>
    </div>

    <script>
        function toggleNavbar() {
            document.querySelector('.navbar-links').classList.toggle('active');
        }
    </script>
</body>

</html>
