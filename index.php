<?php
error_reporting(0);
include("config.php");
// session_start();
require 'smtp/PHPMailerAutoload.php';

   if(isset($_POST['final_sub']))
   {
    // include("upload.php");     

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $ssc = array(
            "10th_uni" => $_POST["10th_uni"],
            "10th_pro" => $_POST["10th_pro"],
            "10th_pass" => $_POST["10th_pass"],
            "10th_percentage" => $_POST["10th_percentage"],
            "10th_division" => $_POST["10th_division"]
        );
        $hsc = array(
            "uni1" => $_POST['12th_uni'],
            "pro1" => $_POST['12th_pro'],
            "pass1" => $_POST['12th_pass'],
            "percentage1" => $_POST['12th_percentage'],
            "divison1" => $_POST['12th_divison']
        );
        $gra = array(
            "uni2" => $_POST['graduation'],
            "pro2" => $_POST['gra_pro'],
            "pass2" => $_POST['gra_pass'],
            "percentage2" => $_POST['gra_percentage'],
            "divison2" => $_POST['gra_divison']
        );
        $pg = array(
            "uni3" => $_POST['pg_uni'],
            "pro3" => $_POST['pg_pro'],
            "pass3" => $_POST['pg_pass'],
            "percentage3" => $_POST['pg_percentage'],
            "divison3" => $_POST['pg_divison']
        );
    }
    $ssc_data = serialize($ssc); $hsc_data = serialize($hsc);$gra_data = serialize($gra);$pg_data = serialize($pg);


    $filename = $_FILES["image"]["name"];
 $tempname = $_FILES["image"]["tmp_name"];
 $folder = "./uploads/" . $filename;

    $filename1 = $_FILES["image1"]["name"];
 $tempname1 = $_FILES["image1"]["tmp_name"];
 $folder1 = "./uploads/" . $filename1;

 $filename2 = $_FILES["image2"]["name"];
$tempname2 = $_FILES["image2"]["tmp_name"];
$folder2 = "./uploads/" . $filename2;

$filename3 = $_FILES["image3"]["name"];
 $tempname3 = $_FILES["image3"]["tmp_name"];
 $folder3 = "./uploads/" . $filename3;

 $filename4 = $_FILES["image4"]["name"];	
 $tempname4 = $_FILES["image4"]["tmp_name"];
 $folder4 = "./uploads/" . $filename4;

 move_uploaded_file($tempname, $folder);
 move_uploaded_file($tempname1, $folder1);
 move_uploaded_file($tempname2, $folder2);
 move_uploaded_file($tempname3, $folder3);
 move_uploaded_file($tempname4, $folder4);
 
 $email1=$_POST['to'];
 $insert="INSERT INTO info(name,father_name,mother_name,gender,dob,email,mobile,p_house,p_street,p_city,p_district,p_state,p_pin,p_country,m_house,m_street,m_city,m_district,m_state,m_pin,m_country,document,document_no,debarred,category,ssc_exam,hsc_exam,graduation,pg_graduation,photograph,signature,id_proof,ad_proof,qualification_proof)VALUES('".$_POST['name']."','".$_POST['fname']."','".$_POST['mname']."','".$_POST['gender']."','".$_POST['dob']."','$email1','".$_POST['mobile']."','".$_POST['p_flat']."','".$_POST['p_street']."','".$_POST['p_city']."','".$_POST['p_district']."','".$_POST['p_state']."','".$_POST['p_pincode']."','".$_POST['p_country']."','".$_POST['m_flat']."','".$_POST['m_street']."','".$_POST['m_city']."','".$_POST['m_district']."','".$_POST['m_state']."','".$_POST['m_pincode']."','".$_POST['m_country']."','".$_POST['document']."','".$_POST['docu_no']."','".$_POST['debarred']."','".$_POST['Category']."','".$ssc_data."','".$hsc_data."','".$gra_data."','".$pg_data."','".$filename."','".$filename1."','".$filename2."','".$filename3."','".$filename4."')";
  $insert_sql=mysqli_query($conn,$insert);
if($insert_sql == true){
    // echo "<script>alert('Your Data Inserted Successfully..!')</script>" ;

 
 // Check if the form is submitted (you can use this code on the form submit button)
//  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $name = $_POST['name'];
  $too =$email1;
  $message = '
        Dear ' . $name . ',<br><br>
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
 $subject = 'Welcome ' . $name . ' - Thank you for Registering!';

    $result=smtp_mailer($too, $subject, $message);
    //  // Send the email using PHPMailer
     if ($result === 'Sent') {
         header('location: view_data.php');
     } else {
         echo $result;
     }
//  }
 
 

   }

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

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<!-- This script got from frontendfreecode.com -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />


<style>
    #excel {
  /* font-family: 'Bebas Neue', cursive; */
  font-size: 30px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  background-image: linear-gradient(gold, gold);
  background-size: 100% 10px;
  background-repeat: no-repeat;
  background-position: 100% 0%;
   transition: background-size .7s, background-position .5s ease-in-out;
}

#excel:hover {
  background-size: 100% 100%;
  background-position: 0% 100%;
  transition: background-position .7s, background-size .5s ease-in-out;
}
.wizard {
    margin: 10px auto;
    background: #f5f5f5;
    padding: 20px;
    border-radius: 20px;
   opacity: 0.9;
}

.wizard .nav-tabs {
    position: relative;
    margin: 40px auto;
    margin-bottom: 0;
    border-bottom-color: #e0e0e0;
}
.wizard > div.wizard-inner {
    position: relative;
}
.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 80%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
}
.wizard .nav-tabs > li.active > a,
.wizard .nav-tabs > li.active > a:hover,
.wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}
span.round-tab {
    width: 150px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
   
    background: #fff;
    border: 2px solid #e0e0e0;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}
span.round-tab i {
    color: #555555;
}
.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #5bc0de;
}
.wizard li.active span.round-tab i {
    color: #5bc0de;
}
span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}
.wizard .nav-tabs > li {
    width: 25%;
}
.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #5bc0de;
    transition: 0.1s ease-in-out;
}
.wizard li.active:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #5bc0de;
}
.wizard .nav-tabs > li a {
    width: 70px;
    height: 70px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
}
.wizard .nav-tabs > li a:hover {
    background: transparent;
}
.wizard .tab-pane {
    position: relative;
    padding-top: 50px;
}
.wizard h3 {
    margin-top: 0;
}
/* body {
	background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
	height: 100vh;
} */
#ttf {
		color: #fff;
		font-size: 50px;
        margin-left: 100px;
      
		text-transform: uppercase;
		font-weight: 700;
		
		font-family: "Josefin Sans", sans-serif;
		background: linear-gradient(to right,#095fab 10%, #25abe8 50%, #57d75b 60%);
		background-size: auto auto;
		background-clip: border-box;
		background-size: 200% auto;
		color: #fff;
		background-clip: text;
		text-fill-color: transparent;
		-webkit-background-clip: text;
		-webkit-text-fill-color: transparent;
		animation: textclip 1.5s linear infinite;
		display: inline-block;
	}
@keyframes textclip {
	to {
		background-position: 200% center;
	}
}

@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}
@media (max-width: 450px) {
    .wizard {
        width: 90%;
        height: auto !important;
    }
    span.round-tab {
        font-size: 16px;
        width: 30px;
        height: 50px;
        line-height: 30px;
        float: left;
    }
    .wizard .nav-tabs > li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }
    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }
    
    
}
body {
  width: 100%;
  height: 100vh;
  background-color: #000;
  background-image: radial-gradient(
      circle at top right,
      rgba(121, 68, 154, 0.13),
      transparent
    ),
    radial-gradient(circle at 20% 80%, rgba(41, 196, 255, 0.13), transparent);
}
canvas {
  position: fixed;
  width: 100%;
  height: 100%;
}
</style>

</head>
<body>
<canvas></canvas>
<!-- <div class="d-flex flex-column justify-content-center w-100 h-100">

<div class="d-flex flex-column justify-content-center align-items-center"> -->
    
 <br />
<div class="container">
    <div class="row">
    <section>
            <div class="wizard" >
                <h1 id="ttf">Application Form</h1><a href="view_data.php" ><span class=" btn btn-lg btn-success glyphicon glyphicon-eye-open" style="float: right;" aria-hidden="true"></span> </a>
       <?php include("form.php"); ?>
    </div>
</div>
</div>
</div>
<script>
$(document).ready(function () {
    //Initialize tooltips
    $(".nav-tabs > li a[title]").tooltip();
    //Wizard
    $('a[data-toggle="tab"]').on("show.bs.tab", function (e) {
        var $target = $(e.target);
        if ($target.parent().hasClass("disabled")) {
            return false;
        }
    });
    $(".next-step").click(function (e) {
        var $active = $(".wizard .nav-tabs li.active ");
        $active.next().removeClass("disabled");
        nextTab($active);
    });
    $(".prev-step").click(function (e) {
        var $active = $(".wizard .nav-tabs li.active");
        prevTab($active);
    });
});
function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
</script>
<script>
    const STAR_COLOR = "#fff";
const STAR_SIZE = 3;
const STAR_MIN_SCALE = 0.2;
const OVERFLOW_THRESHOLD = 50;
const STAR_COUNT = (window.innerWidth + window.innerHeight) / 8;

const canvas = document.querySelector("canvas"),
  context = canvas.getContext("2d");

let scale = 1, // device pixel ratio
  width,
  height;

let stars = [];

let pointerX, pointerY;

let velocity = { x: 0, y: 0, tx: 0, ty: 0, z: 0.0005 };

let touchInput = false;

generate();
resize();
step();

window.onresize = resize;
canvas.onmousemove = onMouseMove;
canvas.ontouchmove = onTouchMove;
canvas.ontouchend = onMouseLeave;
document.onmouseleave = onMouseLeave;

function generate() {
  for (let i = 0; i < STAR_COUNT; i++) {
    stars.push({
      x: 0,
      y: 0,
      z: STAR_MIN_SCALE + Math.random() * (1 - STAR_MIN_SCALE)
    });
  }
}

function placeStar(star) {
  star.x = Math.random() * width;
  star.y = Math.random() * height;
}

function recycleStar(star) {
  let direction = "z";

  let vx = Math.abs(velocity.x),
    vy = Math.abs(velocity.y);

  if (vx > 1 || vy > 1) {
    let axis;

    if (vx > vy) {
      axis = Math.random() < vx / (vx + vy) ? "h" : "v";
    } else {
      axis = Math.random() < vy / (vx + vy) ? "v" : "h";
    }

    if (axis === "h") {
      direction = velocity.x > 0 ? "l" : "r";
    } else {
      direction = velocity.y > 0 ? "t" : "b";
    }
  }

  star.z = STAR_MIN_SCALE + Math.random() * (1 - STAR_MIN_SCALE);

  if (direction === "z") {
    star.z = 0.1;
    star.x = Math.random() * width;
    star.y = Math.random() * height;
  } else if (direction === "l") {
    star.x = -OVERFLOW_THRESHOLD;
    star.y = height * Math.random();
  } else if (direction === "r") {
    star.x = width + OVERFLOW_THRESHOLD;
    star.y = height * Math.random();
  } else if (direction === "t") {
    star.x = width * Math.random();
    star.y = -OVERFLOW_THRESHOLD;
  } else if (direction === "b") {
    star.x = width * Math.random();
    star.y = height + OVERFLOW_THRESHOLD;
  }
}

function resize() {
  scale = window.devicePixelRatio || 1;

  width = window.innerWidth * scale;
  height = window.innerHeight * scale;

  canvas.width = width;
  canvas.height = height;

  stars.forEach(placeStar);
}

function step() {
  context.clearRect(0, 0, width, height);

  update();
  render();

  requestAnimationFrame(step);
}

function update() {
  velocity.tx *= 0.96;
  velocity.ty *= 0.96;

  velocity.x += (velocity.tx - velocity.x) * 0.8;
  velocity.y += (velocity.ty - velocity.y) * 0.8;

  stars.forEach((star) => {
    star.x += velocity.x * star.z;
    star.y += velocity.y * star.z;

    star.x += (star.x - width / 2) * velocity.z * star.z;
    star.y += (star.y - height / 2) * velocity.z * star.z;
    star.z += velocity.z;

    // recycle when out of bounds
    if (
      star.x < -OVERFLOW_THRESHOLD ||
      star.x > width + OVERFLOW_THRESHOLD ||
      star.y < -OVERFLOW_THRESHOLD ||
      star.y > height + OVERFLOW_THRESHOLD
    ) {
      recycleStar(star);
    }
  });
}

function render() {
  stars.forEach((star) => {
    context.beginPath();
    context.lineCap = "round";
    context.lineWidth = STAR_SIZE * star.z * scale;
    context.globalAlpha = 0.5 + 0.5 * Math.random();
    context.strokeStyle = STAR_COLOR;

    context.beginPath();
    context.moveTo(star.x, star.y);

    var tailX = velocity.x * 2,
      tailY = velocity.y * 2;

    // stroke() wont work on an invisible line
    if (Math.abs(tailX) < 0.1) tailX = 0.5;
    if (Math.abs(tailY) < 0.1) tailY = 0.5;

    context.lineTo(star.x + tailX, star.y + tailY);

    context.stroke();
  });
}

function movePointer(x, y) {
  if (typeof pointerX === "number" && typeof pointerY === "number") {
    let ox = x - pointerX,
      oy = y - pointerY;

    velocity.tx = velocity.tx + (ox / 8) * scale * (touchInput ? 1 : -1);
    velocity.ty = velocity.ty + (oy / 8) * scale * (touchInput ? 1 : -1);
  }

  pointerX = x;
  pointerY = y;
}

function onMouseMove(event) {
  touchInput = false;

  movePointer(event.clientX, event.clientY);
}

function onTouchMove(event) {
  touchInput = true;

  movePointer(event.touches[0].clientX, event.touches[0].clientY, true);

  event.preventDefault();
}

function onMouseLeave() {
  pointerX = null;
  pointerY = null;
}
</script>

</body>
</html>
