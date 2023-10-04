
<?php
require('fpdf.php');
require 'smtp/PHPMailerAutoload.php';
require('config.php');
$id=$_GET['id'];

$row=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM info Where id='".$_GET['id']."'"));

$fetch=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM payment Where name='".$row['name']."' "));

$name=$fetch['name'];
$email=$fetch['email'];
$phone=$fetch['phone'];
$amount=$fetch['amount'];
$numb=$fetch['id'];
$date=date("d-m-Y");

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
          $pdf->Cell(50,7,$name,0,1);
          $pdf->Cell(50,7,$email,0,1);
          $pdf->Cell(50,7,$phone,0,1);
          
          //Display Invoice no
          $pdf->SetY(55);
          $pdf->SetX(-60);
          $pdf->Cell(50,7,"Invoice No :".$numb);
          
          //Display Invoice date
          $pdf->SetY(63);
          $pdf->SetX(-60);
          $pdf->Cell(50,7,"Invoice Date :".$date);
    
         $pdf->SetY(95);
         $pdf->SetX(10);
         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(120,10,"DESCRIPTION",1,0);
         $pdf->Cell(70,10,"TOTAL",1,1,"C");
         $pdf->SetFont('Arial','',12);
          $pdf->Cell(120,10,"Payment via Instamojo ","LR",0);
          $pdf->Cell(70,10,$amount,"R",1,"R");
         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(120,9,"Sub Total",1,0,"R");
         $pdf->Cell(70,9,$amount,1,1,"R");
          
         $pdf->SetY(140);
         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(0,10,"for India Active Software.INC",0,1,"R");
         $pdf->Ln(15);
         $pdf->SetFont('Arial','',12);
         $pdf->Cell(0,10,"Authorized Signature",0,1,"R");
         $pdf->SetFont('Arial','',10);
         
         //Display Footer Text
         $pdf->Cell(0,10,"This is a computer generated invoice",0,1,"C");

$folderPath = 'uploads/';
$fileName = 'invoice.pdf';
$pdfFilePath = $folderPath . $fileName;

// Save the PDF to the specified folder
$pdf->Output($pdfFilePath, 'F');

// Send email with attachment using PHPMailer
$to = $email;
$subject = "Invoice from India Active Software.INC";
$message = "Dear ".$name.",\n\nThank you for your payment. Attached is your invoice.";
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
$mail->addAttachment($pdfFilePath, $attachmentFilename);

if (!$mail->Send()) {
    echo $mail->ErrorInfo;
} else {
    // echo "<script>alert('Mail Sent Successfully..!')</script>";
    header("location: view_data.php");
}
?>