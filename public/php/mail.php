<?php
//<?php phpinfo();  

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';
include 'variables.php';
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$mailto = $GLOBALS["mailto"];
$mailfrom = $GLOBALS["mailfrom"];
$thepassword = $GLOBALS["thepassword"];
 

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    //$mail->Username   = 'maximeleroux29290@gmail.com';                     // SMTP username
    //$mail->Password   = 'XXX';                               // SMTP password

    $mail->Username   = $mailfrom;                     // SMTP username
    $mail->Password   = $thepassword;                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($mailfrom, 'Mailer');
    $mail->addAddress($mailto, 'Admin');     // Add a recipient
 //   $mail->addAddress('ellen@example.com');               // Name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

    // Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
//
    error_log("your message");
    // Content
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $datefin = $_POST['datefin'];
    $datedebut = $_POST['datedebut'];
    $message = $_POST['message'];
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Nouveau contact';
    $mail->Body    = '  Mail de la part de ' . $name .
    ' tel: '. $tel .
    ' email: '. $email .
    ' date de debut: '. $datedebut .
    ' date de fin: '. $datefin .
    ' message: '. $message .
    '.';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    //echo 'Message has been sent';
    header("Location: ../index.html");


} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
