<?php
error_reporting(0);
include("config.php");
$id=$_GET['id'];

$row=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM info Where id='".$_GET['id']."'"));

$fetch=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM payment Where name='".$row['name']."' "));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <title>Receipt Github</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="print-styles.css" media="print">


    <style>
body{
background:#eee;
margin-top:20px;
}
.text-danger strong {
        	color: #9f181c;
		}
		.receipt-main {
			background: #ffffff none repeat scroll 0 0;
			border-bottom: 12px solid #333333;
			border-top: 12px solid #9f181c;
			margin-top: 50px;
			margin-bottom: 50px;
			padding: 40px 30px !important;
			position: relative;
			box-shadow: 0 1px 21px #acacac;
			color: #333333;
			font-family: open sans;
		}
		.receipt-main p {
			color: #333333;
			font-family: open sans;
			line-height: 1.42857;
		}
		.receipt-footer h1 {
			font-size: 15px;
			font-weight: 400 !important;
			margin: 0 !important;
		}
		.receipt-main::after {
			background: #414143 none repeat scroll 0 0;
			content: "";
			height: 5px;
			left: 0;
			position: absolute;
			right: 0;
			top: -13px;
		}
		.receipt-main thead {
			background: #414143 none repeat scroll 0 0;
		}
		.receipt-main thead th {
			color:#fff;
		}
		.receipt-right h5 {
			font-size: 16px;
			font-weight: bold;
			margin: 0 0 7px 0;
		}
		.receipt-right p {
			font-size: 12px;
			margin: 0px;
		}
		.receipt-right p i {
			text-align: center;
			width: 18px;
		}
		.receipt-main td {
			padding: 9px 20px !important;
		}
		.receipt-main th {
			padding: 13px 20px !important;
		}
		.receipt-main td {
			font-size: 13px;
			font-weight: initial !important;
		}
		.receipt-main td p:last-child {
			margin: 0;
			padding: 0;
		}	
		.receipt-main td h2 {
			font-size: 20px;
			font-weight: 900;
			margin: 0;
			text-transform: uppercase;
		}
		.receipt-header-mid .receipt-left h1 {
			font-weight: 100;
			margin: 34px 0 0;
			text-align: right;
			text-transform: uppercase;
		}
		.receipt-header-mid {
			margin: 24px 0;
			overflow: hidden;
		}
		
		#container {
			background-color: #dcdcdc;
		}
    </style>
</head>
<body>
<div class="col-md-12">   
    
 <div class="row">

 <div class="col-md-12">
    <div class="col-md-6">
        <a href="view_data.php" style="float:right; margin-right:370px;"> <span class=" btn btn-sm btn-info glyphicon glyphicon-chevron-left" aria-hidden="true"></span> </a>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-2" >
    <a href="test.php?id=<?php echo $row['id']; ?>" >  <span class=" btn btn-sm btn-warning glyphicon glyphicon-send" aria-hidden="true"></span> </a>
    <a   onclick="printInvoice()" target="_blank">  <span class=" btn btn-sm btn-success glyphicon glyphicon-print" aria-hidden="true"></span> </a>
    
    </div>
 </div>
		<form >
        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
    			<div class="receipt-header">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="receipt-left">
							<img class="img-responsive" alt="iamgurdeeposahan" src="uploads/ictrd.jpg" style="width: 71px; border-radius: 43px;">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 text-right">
						<div class="receipt-right">
							<h5>INDIA ACTIVE SOFTWARE INC.</h5>
							<p>+1 3649-6589 <i class="fa fa-phone"></i></p>
							<p>sagargalole.indiaactive@gmail.com <i class="fa fa-envelope-o"></i></p>
							<p>Nagpur, Maharashtra. <i class="fa fa-location-arrow"></i></p>
						</div>
					</div>
				</div>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<h5><?php echo $fetch['name']; ?> </h5>
							<p><b>Mobile :</b><?php echo $fetch['mobile']; ?></p>
							<p><b>Email :</b> <?php echo $fetch['email']; ?></p>
							<p><b>Address :</b> <?php echo ucfirst($row['p_state']).','.ucfirst($row['p_country']); ?></p>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h3>INVOICE # <?php echo $fetch['id']; ?></h3>
						</div>
					</div>
				</div>
            </div>
			
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $gst_total= round($fetch['amount']*18/100);
                        $sub_tot=$fetch['amount']-$gst_total;
                        ?>
                        <tr>
                            <td class="col-md-9">Payment For Registration</td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo  $sub_tot.''.'/-'; ?></td>
                        </tr>
                       
                        <tr>
                            <td class="text-right">
                            <p>
                                <strong>GST(18%): </strong>
                            </p>
                        
							
							</td>
                            <td>
                            <p>
                                <strong><i class="fa fa-inr"></i> <?php  echo $gst_total.''.'/-'; ?></strong>
                            </p>
                          
							
							</td>
                        </tr>
                        <tr>
                           
                            <td class="text-right"><h2><strong>Total: </strong></h2></td>
                            <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i><?php echo $fetch['amount'].''.'/-'; ?></strong></h2></td>
                        </tr>
                    </tbody>
                </table>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid receipt-footer">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<p><b>Date :</b> <?php echo date("d-m-Y"); ?></p>
							<h5 style="color: rgb(140, 140, 140);">Thanks for shopping.!</h5>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h1>Stamp</h1>
						</div>
					</div>
				</div>
            </div>
			
        </div>   
        </form> 
	</div>
</div>

<script>
    function printInvoice() {
        var printWindow = window.open('print.php?id=<?php echo $_GET['id']; ?>', '_blank');
        printWindow.onload = function () {
            printWindow.print();
        };

        printWindow.onafterprint = function () {
            printWindow.close();
            window.location.href = 'view_data.php'; // Change this URL to your homepage URL
        };
    }
</script>


</body>
</html>