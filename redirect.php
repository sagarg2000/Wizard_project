<?php
// require 'smtp/PHPMailerAutoload.php';
// require 'tcpdf/tcpdf.php'; // Make sure you adjust the path to the TCPDF library

// echo smtp_mailer('karan1.indiaactive@gmail.com', 'test', 'Hello World...!', 'receipt.pdf');

// function generate_pdf($content)
// {
//     // Example content for the PDF receipt, replace this with your receipt content
//     $receipt_content = '
//         <h1>Receipt</h1>
//         <p>Name: John Doe</p>
//         <p>Amount: $100</p>
//         <p>Date: ' . date("Y-m-d") . '</p>
//     ';

//     $pdf = new TCPDF();
//     $pdf->AddPage();
//     $pdf->SetFont('times', '', 12);
//     $pdf->WriteHTML($receipt_content); // Replace this with your receipt content
//     return $pdf->Output('receipt.pdf', 'S');
// }

// function smtp_mailer($to, $subject, $msg, $attachmentFilename = null)
// {
//     $mail = new PHPMailer();
//     $mail->IsSMTP();
//     $mail->SMTPAuth = true;
//     $mail->SMTPSecure = 'tls';
//     $mail->Host = "smtp.gmail.com";
//     $mail->Port = 587;
//     $mail->IsHTML(true);
//     $mail->CharSet = 'UTF-8';
//     // $mail->SMTPDebug = 2;
//     $mail->Username = "sagargalole.indiaactive@gmail.com";
//     $mail->Password = "vvgjvkwkyhukuksp";
//     $mail->SetFrom("sagargalole.indiaactive@gmail.com");
//     $mail->Subject = $subject;
//     $mail->Body = $msg;
//     $mail->AddAddress($to);
//     $mail->SMTPOptions = array('ssl' => array(
//         'verify_peer' => false,
//         'verify_peer_name' => false,
//         'allow_self_signed' => false
//     ));

//     if ($attachmentFilename !== null) {
//         // Generate the PDF content
//         $pdf_content = generate_pdf('print.php'); // Replace this with your receipt content

//         // Attach the PDF to the email
//         $mail->addStringAttachment($pdf_content, $attachmentFilename, 'base64', 'application/pdf');
//     }

//     if (!$mail->Send()) {
//         echo $mail->ErrorInfo;
//     } else {
//         return 'Sent';
//     }
// }
?>
<?php
require('fpdf.php');
include("config.php");
require 'smtp/PHPMailerAutoload.php'; // Include PHPMailer library

$id = $_GET['id'];

$sql = "SELECT * FROM payment where id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($result->num_rows > 0) {
    $pdf = new FPDF();
    $pdf->AddPage();
    
    
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(50,10,"India Active Software.INC",0,1);
    $pdf->SetFont('Arial','',14);
    $pdf->Cell(50,7,"Pratap Nagar,",0,1);
    $pdf->Cell(50,7,"Nagpur 441111.",0,1);
    $pdf->Cell(50,7,"PH : 8778731770",0,1);
    
    //Display INVOICE text
    $pdf->SetY(15);
    $pdf->SetX(-40);
    $pdf->SetFont('Arial','B',18);
    $pdf->Image('uploads/ictrd.jpg', 160, 10, 40);
    $pdf->Line(0,48,210,48);
    
    $pdf->SetY(55);
          $pdf->SetX(10);
          $pdf->SetFont('Arial','B',12);
          $pdf->Cell(50,10,"Bill To: ",0,1);
          $pdf->SetFont('Arial','',12);
          $pdf->Cell(50,7,$row['name'],0,1);
          $pdf->Cell(50,7,$row['email'],0,1);
          $pdf->Cell(50,7,$row['phone'],0,1);
          
          //Display Invoice no
          $pdf->SetY(55);
          $pdf->SetX(-60);
          $pdf->Cell(50,7,"Invoice No :".$row['id']);
          
          //Display Invoice date
          $pdf->SetY(63);
          $pdf->SetX(-60);
          $pdf->Cell(50,7,"Invoice Date :".date("d-m-Y"));
    
         $pdf->SetY(95);
         $pdf->SetX(10);
         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(120,10,"DESCRIPTION",1,0);
         $pdf->Cell(70,10,"TOTAL",1,1,"C");
         $pdf->SetFont('Arial','',12);
          $pdf->Cell(120,10,"Payment via Instamojo ","LR",0);
          $pdf->Cell(70,10,$row['amount'],"R",1,"R");
         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(120,9,"Sub Total",1,0,"R");
         $pdf->Cell(70,9,$row['amount'],1,1,"R");
          
         $pdf->SetY(140);
         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(0,10,"for India Active Software.INC",0,1,"R");
         $pdf->Ln(15);
         $pdf->SetFont('Arial','',12);
         $pdf->Cell(0,10,"Authorized Signature",0,1,"R");
         $pdf->SetFont('Arial','',10);
         
         //Display Footer Text
         $pdf->Cell(0,10,"This is a computer generated invoice",0,1,"C");
         
    
    $pdf->Output();
    ob_start();
    $pdf->Output('path_to_save/invoice.pdf', 'S');
    $pdf_content = ob_get_clean();

    // Send email with attachment using PHPMailer
    $to = $row['email'];
    $subject = "Invoice from India Active Software.INC";
    $message = "Dear " . $row['name'] . ",\n\nThank you for your payment. Attached is your invoice.";
    $attachmentFilename = "invoice.pdf";

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "sagargalole.indiaactive@gmail.com";
    $mail->Password = "vvgjvkwkyhukuksp";
    $mail->SetFrom("sagargalole.indiaactive@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));

    // Attach the PDF to the email
    $mail->addStringAttachment($pdf_content, $attachmentFilename, 'base64', 'application/pdf');

    if (!$mail->Send()) {
        echo $mail->ErrorInfo;
    } else {
        echo "Email sent successfully.";
    }
}
?>
