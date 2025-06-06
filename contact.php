<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';

    // Simpan data ke dalam fail txt
    $data = "Name: $name\nEmail: $email\nPhone: $phone\nSubject: $subject\nMessage: $message\n\n";
    $savePath = "../uploads/form_submissions.txt";

    if (!is_dir("../uploads")) {
        mkdir("../uploads", 0777, true);
    }

    if (file_put_contents($savePath, $data, FILE_APPEND)) {
        echo "success";
    } else {
        echo "fail";
    }
} else {
    http_response_code(403);
    echo "Forbidden";
}
?>
