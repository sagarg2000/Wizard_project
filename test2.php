<?php
require 'smtp/PHPMailerAutoload.php';
$message = '
      Dear Abhishek Goswami,<br><br>
    We are delighted to welcome you to India Active Software! Thank you for choosing to join our community. Your registration is now complete, and we are excited to have you on board.<br><br>
   With your new account, you gain access to a world of possibilities. Whether you are here to explore our products, connect with like-minded individuals, or utilize our services, we are committed to providing you with an exceptional experience.<br><br>
      If you have any questions, encounter any issues, or simply want to say hello, our support team is here to assist you. Feel free to reach out to us at sagargalole.indiaactive@gmail.com with any inquiries you may have.<br><br>
    Best regards,<br>
      Sagar Galole<br>
      Web Developer<br>
      India Active Software<br>
     sagargalole.indiaactive@gmail.com<br>
      9595958585 ';
   // Customize the welcome message with the user's name
$subject = 'Welcome Abhishek - Thank you for Registering!';

  $result=smtp_mailer('ohkboi85@gmail.com', $subject, $message);
  //  // Send the email using PHPMailer
   if ($result === 'Sent') {
       header('location: view_data.php');
   } else {
       echo $result;
   }

function smtp_mailer($to, $subject, $message) {
    $mail = new PHPMailer(); 
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587; 
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    //$mail->SMTPDebug = 2; 
    $mail->Username = "sagargalole.indiaactive@gmail.com";
    $mail->Password = "vvgjvkwkyhukuksp";
    $mail->SetFrom("sagargalole.indiaactive@gmail.com", "Sagar Galole");
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        )
    );
    if (!$mail->Send()) {
        return $mail->ErrorInfo;
    } else {
        return 'Sent';
    }
}

?>
