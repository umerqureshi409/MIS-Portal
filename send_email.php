<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);


    $file = "responses.csv";


    $data = [$name, $email, $subject, $message, date("Y-m-d H:i:s")];

    $fileHandle = fopen($file, "a");

    if ($fileHandle !== false) {

        fputcsv($fileHandle, $data);
        fclose($fileHandle);


        header("Location: thankyou.html");
        exit;
    } else {
        echo "<p class='error-message'>Could not save your response. Please try again later.</p>";
    }
} else {
    header("Location: contact.html");
    exit;
}
