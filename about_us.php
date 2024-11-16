<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | C++ Attendance System</title>
    <link rel="icon" type="image/x-icon" href="muet.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f8;
            color: #333;
            overflow-x: hidden;
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
            position: relative;
            z-index: 1000;
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



        .hero {
            position: relative;
            height: 80vh;
            background: url('video/hero.jpg') no-repeat center center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            overflow: hidden;
        }

        .hero h2 {
            font-size: 3rem;
            animation: fadeIn 2s ease;
        }

        .about-content {
            padding: 20px;
            max-width: 1200px;
            margin: 20px auto;
            text-align: center;
        }

        .about-content h2 {
            color: #004080;
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .about-content p {
            line-height: 1.6;
            margin: 10px 0 20px;
            font-size: 1.1rem;
            padding: 0 20px;
        }

        .abstract {
            background-color: #e8f0fe;
            border-left: 5px solid #004080;
            padding: 15px;
            margin: 20px 0;
            font-style: italic;
        }

        .project-images {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px 0;
        }

        .project-images img {
            width: calc(33% - 40px);
            margin: 10px;
            border-radius: 8px;
            transition: transform 0.3s;
            cursor: pointer;
        }

        .project-images img:hover {
            transform: scale(1.05);
        }

        .video-container {
            margin: 20px 0;
        }

        .video-container iframe {
            width: 100%;
            height: 400px;
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #004080;
            color: white;
            position: relative;
        }

        footer a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        footer a:hover {
            text-decoration: underline;
        }


        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.9);
            justify-content: center;
            align-items: center;
        }

        .modal img {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            height: auto;
        }

        @media (max-width: 768px) {
            .project-images img {
                width: calc(50% - 40px);
            }

            .navbar {
                width: 90%;
            }

            .navbar h1 {
                font-size: 1.2rem;
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
                z-index: 1001;
            }

            .navbar-links.active {
                display: flex;
            }

            .navbar-toggle {
                display: inline;
            }
        }

        @media (max-width: 480px) {
            .project-images img {
                width: calc(100% - 40px);
            }

            .hero h2 {
                font-size: 1.8rem;
            }

            .about-content h2 {
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
                z-index: 1001;
            }

            .navbar-links.active {
                display: flex;
            }

            .navbar-toggle {
                display: inline;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
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
            <a href="developer.html">Developers</a>
            <a href="contact.html">Contact</a>
        </div>
        <div class="navbar-toggle" onclick="toggleNavbar()">☰</div>
    </div>

    <div class="hero">
        <h2>Welcome to Our Project</h2>
    </div>

    <div class="about-content">
        <h2>About Our Attendance System</h2>
        <p>Our attendance system utilizes advanced facial recognition technology to automate attendance tracking efficiently. It enhances accuracy and reduces administrative workload, allowing educators to focus more on teaching and less on paperwork.</p>

        <div class="abstract">
            <h3>Project Abstract</h3>
            <p>This project aims to create a comprehensive attendance system that utilizes facial recognition technology to streamline attendance marking in educational institutions. By leveraging C++ and OpenCV, our system captures and verifies student identities through their facial features, allowing for a more efficient and reliable attendance process.</p>
        </div>

        <div class="video-container">
            <iframe src="video/video.mp4" allowfullscreen></iframe>
            <iframe src="video/mob.mp4" allowfullscreen></iframe>
        </div>

        <h2>Project Images</h2>
        <div class="project-images">
            <img src="video/main.png" alt="Project Image 1" onclick="openModal(this)">
            <img src="video/instructions.png" alt="Project Image 2" onclick="openModal(this)">
            <img src="video/main1.png" alt="Project Image 3" onclick="openModal(this)">
            <img src="video/back.png" alt="Project Image 4" onclick="openModal(this)">
            <img src="video/team.png" alt="Project Image 7" onclick="openModal(this)">
            <img src="video/login.png" alt="Project Image 6" onclick="openModal(this)">
            <img src="video/log.png" alt="Project Image 5" onclick="openModal(this)">
        </div>
    </div>


    <div class="modal" id="myModal" onclick="closeModal()">
        <img class="modal-content" id="img01">
    </div>

    <footer>
        <p>All Rights Reserved &copy; <a href="developer.html">Umer Qureshi</a></p>
    </footer>

    <script>
        function toggleNavbar() {
            const navbarLinks = document.querySelector('.navbar-links');
            navbarLinks.classList.toggle('active');
        }

        function openModal(imgElement) {
            const modal = document.getElementById("myModal");
            const modalImg = document.getElementById("img01");
            modal.style.display = "flex";
            modalImg.src = imgElement.src;
        }

        function closeModal() {
            const modal = document.getElementById("myModal");
            modal.style.display = "none";
        }
    </script>
</body>

</html>