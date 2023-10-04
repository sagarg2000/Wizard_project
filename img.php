<?php
session_start();
include ("config.php");
$id=$_GET['id'];


$select=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM info where id='$id' "));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <style>
        body {
    /* background-color: #f9f9fa */
    /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #cc95c0, #dbd4b4, #7aa1d2);
}

.padding {
    padding: 7rem !important
}

.user-card-full {
    overflow: hidden;
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    border: none;
    margin-bottom: 30px;
}

.m-r-0 {
    margin-right: 0px;
}

.m-l-0 {
    margin-left: 0px;
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px;
}

.bg-c-lite-green {
        background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
    background: linear-gradient(to right, #ee5a6f, #f29263);
}

.user-profile {
    padding: 20px 0;
}

.card-block {
    padding: 1.25rem;
}

.m-b-25 {
    margin-bottom: 25px;
}

.img-radius {
    border-radius: 5px;
}


 
h6 {
    font-size: 14px;
}

.card .card-block p {
    line-height: 25px;
}

@media only screen and (min-width: 1400px){
p {
    font-size: 14px;
}
}

.card-block {
    padding: 1.25rem;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.m-b-20 {
    margin-bottom: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.card .card-block p {
    line-height: 25px;
}

.m-b-10 {
    margin-bottom: 10px;
}

.text-muted {
    color: #919aa3 !important;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.f-w-600 {
    font-weight: 600;
}

.m-b-20 {
    margin-bottom: 20px;
}

.m-t-40 {
    margin-top: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.m-b-10 {
    margin-bottom: 10px;
}

.m-t-40 {
    margin-top: 20px;
}

.user-card-full .social-link li {
    display: inline-block;
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}


/* #dash{
    background: #959595;
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;

transition: all 0.3s ease-in-out;
} */
#dash {
    background: linear-gradient(to right, #959595 0%, #0D0D0D 46%, #010101 50%, #0A0A0A 53%, #4E4E4E 76%, #383838 87%, #1B1B1B 100%);
   
  background-size: 200% 100%;
  background-position: -100%;
  display: inline-block;
  padding: 5px 0;
  position: relative;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  transition: all 0.3s ease-in-out;
  
}

#dash:before{
  content: '';
  background: #54b3d6;
  display: block;
  position: absolute;
  bottom: -3px;
  left: 0;
  width: 0;
  height: 3px;
  transition: all 0.3s ease-in-out;
}

#dash:hover {
 background-position: 0;
}

#dash:hover::before{
  width: 100%;
}
.profile_img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    margin: 10px auto;
    margin-left: 80px;
    border: 10px solid #ccc;
    /* border-radius: 80%; */
}
html {
  height:100%;
}

body {
  margin:0;
}

.bg {
  animation:slide 3s ease-in-out infinite alternate;
  background-image: linear-gradient(-60deg, #6c3 50%, #09f 50%);
  bottom:0;
  left:-50%;
  opacity:.5;
  position:fixed;
  right:-50%;
  top:0;
  z-index:-1;
}

.bg2 {
  animation-direction:alternate-reverse;
  animation-duration:4s;
}

.bg3 {
  animation-duration:5s;
}

.content {
  background-color:rgba(255,255,255,.8);
  border-radius:.25em;
  box-shadow:0 0 .25em rgba(0,0,0,.25);
  box-sizing:border-box;
  left:50%;
  padding:10vmin;
  position:fixed;
  text-align:center;
  top:50%;
  transform:translate(-50%, -50%);
}



@keyframes slide {
  0% {
    transform:translateX(-25%);
  }
  100% {
    transform:translateX(25%);
  }
}

    </style>
    <script>
         var quantity = 15;

 for (var i = 1; i <= quantity; i++)
  firefly
    </script>
</head>
<?php 


?>
<body >
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
    <div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
<div class="col-xl-8  col-md-12">
    <center><h1 id="dash"><i>Uploaded Documents</i></h1><br></center>
    <marquee width="100%" direction="left" >
The documents shown below is only for view it can't be editable.
</marquee>
                                                <div class="card user-card-full">
                                              
                                                 
                                                    
                                                        <div class="col-sm-12">
                                                            <div class="card-block">
                                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Back To Home <a href="view_data.php"  data-toggle="tooltip" data-placement="bottom" title="LOGOUT" data-original-title="Logout" data-abc="true"><i style="font-size:20px;margin-left:300px;"  class="mdi mdi-power feather icon-power power" aria-hidden="true"></i></a></h6>
                                                                <div class="row form-group">
                                                                    <div class="col-sm-6">
                                                                    <img src="./uploads/<?php echo $select['photograph']; ?>" class="profile_img" alt="User-Profile-Image">
                                                                    <input type="text" name="ph" id="ph" class="form-control" placeholder="PHOTOGRAPH" readonly>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                    <img src="./uploads/<?php echo $select['signature']; ?>" class="profile_img" alt="User-Profile-Image">
                                                                    <input type="text" name="ph1" id="ph1" class="form-control" placeholder="SIGNATURE" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-sm-6">
                                                                    <img src="./uploads/<?php echo $select['id_proof']; ?>" class="profile_img" alt="User-Profile-Image">
                                                                    <input type="text" name="ph" id="ph" class="form-control" placeholder="IDENTITY PROOF" readonly>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                    <img src="./uploads/<?php echo $select['ad_proof']; ?>" class="profile_img" alt="User-Profile-Image">
                                                                    <input type="text" name="ph1" id="ph1" class="form-control" placeholder="ADDRESS PROOF" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                <div class="col-sm-3"></div>
                                                                    <div class="col-sm-6 ">
                                                                    <img src="./uploads/<?php echo $select['qualification_proof']; ?>" class="profile_img" alt="User-Profile-Image">
                                                                    <input type="text" name="ph" id="ph" class="form-control" placeholder="QUALIFICATION PROOF" readonly>
                                                                    </div>
                                                                   
                                                                </div>
                                                               
                                                             
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                             </div>
                                                </div>
                                            </div>
</body>
</html>