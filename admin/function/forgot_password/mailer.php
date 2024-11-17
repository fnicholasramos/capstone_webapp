<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../../../vendor/PHPMailer/src/Exception.php';
require '../../../vendor/PHPMailer/src/PHPMailer.php';
require '../../../vendor/PHPMailer/src/SMTP.php';
require '../../db.php';

session_start(); // Start the session to store messages

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        $_SESSION['error_message'] = "No account found with this email."; // Set error message in session
        header("Location: ../../../forgot.php"); // Redirect to forgot.php
        exit;
    }

    $user = $result->fetch_assoc();
    $userId = $user['id'];

    // Generate reset token and expiration time
    $token = bin2hex(random_bytes(32)); // Secure random token
    $expires = date('Y-m-d H:i:s', time() + 120);

    // Store the reset token in the database
    $stmt = $conn->prepare("UPDATE users SET token = ?, expires_at = ? WHERE id = ?");
    $stmt->bind_param("ssi", $token, $expires, $userId);
    $stmt->execute();

    // Prepare reset link
    $resetLink = "http://localhost/capstone/admin/function/forms/reset_form.php?token=$token";

    // Initialize PHPMailer
    $mail = new PHPMailer(true);
    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->Username = "ramosnicholas75@gmail.com";
        $mail->Password = "kkcy zvhl jvbv pycu";

        // Sender information
        $mail->setFrom("ramosnicholas75@gmail.com", "no-reply");
        $mail->addAddress($email, "User");

        // Email content
        $mail->Subject = "Reset Your Password";
        $mail->Body = "Hello, <br><br>You requested to reset your password. Click the link below to reset it:<br><br>
        <a href='$resetLink'>$resetLink</a><br><br>
        If you did not request this, please ignore this email.<br><br>Thank you.";

        $mail->isHTML(true); // Email format is HTML

        // Send the email
        $mail->send();
        
        $_SESSION['success_message'] = "Password reset link sent to your email."; // Set success message
        header("Location: ../../../forgot.php"); // Redirect to forgot.php
        exit;
    } catch (Exception $e) {
        $_SESSION['error_message'] = "Failed to send email: {$mail->ErrorInfo}"; // Set error message
        header("Location: ../../../forgot.php"); // Redirect to forgot.php
        exit;
    }
}
?>
