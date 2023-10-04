<?php
include 'config.php';
?>
<!doctype html>
<html>
    <head>
        <title>Application Data View</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Datatable CSS -->
        <link href='https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
        <link href='https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>
       
       <!-- Example for Bootstrap 3 -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

       
       <style type="text/css">
            .dt-buttons{
                width: 100%;
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
.wizard {
    margin: 10px auto;
    background: #f5f5f5;
    padding: 20px;
    border-radius: 20px;
   opacity: 0.9;
}
#ttf {
		color: #fff;
		font-size: 30px;
        margin-left: 300px;
      
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
        </style>

        <!-- jQuery Library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        <!-- Datatable JS -->
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

        
      
        
    </head>
    <body >
    <canvas></canvas>
     
        <div class="container wizard"> 
        <div >
            <h2 style="text-align: center;" id="ttf">Application Form Details</h2><a href="index.php" ><span class=" btn btn-lg btn-primary glyphicon glyphicon-pencil" style="float: right;" aria-hidden="true"></span> </a>
        </div>  
            <!-- Table -->
            <table id='empTable' class='display dataTable ' width="100%" >
                <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Document</th>
                    <th>Action</th>
                   

                </tr>
                </thead>
                <tbody>
                    <?php 

                  
                    $empQuery = "select * from info";

                    $empRecords = mysqli_query($conn, $empQuery);
                    // $data = array();
                    $s=1;
                    while ($row = mysqli_fetch_assoc($empRecords)) {
                      
                    ?>
                        <tr>
                            <td><?php echo $s++ ?></td>
                            <td><?php echo ucfirst($row['name']) ;?></td>
                            <td><?php echo ucfirst($row['gender']); ?></td>
                            <td><?php echo date("d/m/Y",strtotime($row['dob'])); ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['mobile'];?></td>
                            <td><?php echo ucfirst($row['p_state']).','.ucfirst($row['p_country']); ?></td>
                            <td><a href="img.php?id=<?php echo $row['id']; ?>" >  <span class=" btn btn-sm btn-warning glyphicon glyphicon-picture" aria-hidden="true"></span></a>&nbsp;|&nbsp;<a href="instamojo.php?id=<?php echo $row['id']; ?>" > <span class=" btn btn-sm btn-success glyphicon glyphicon-usd" aria-hidden="true"></span> </a>&nbsp;|&nbsp;<a href="receipt.php?id=<?php echo $row['id']; ?>" > <span class=" btn btn-sm btn-info glyphicon glyphicon-print" aria-hidden="true"></span> </a></td>
                            <td><a href="edit.php?id=<?php echo $row['id']; ?>" >  <span class=" btn btn-sm btn-primary glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>&nbsp;|&nbsp;<a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure You Want to delete the data?')"> <span class=" btn btn-sm btn-danger glyphicon glyphicon-trash" aria-hidden="true"></span> </a></td>
                           

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
     
        




        <!-- Script -->
        <script>
        $(document).ready(function(){
            var empDataTable = $('#empTable').DataTable({
                dom: 'Blfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6] // Column index which needs to export
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6] // Column index which needs to export
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6] // Column index which needs to export
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6] // Column index which needs to export
                        }
                    }         
                ]  
            
            });

        });
        </script>
         <script>
        $(document).ready(function(){
            $(document).on('click',"#del",function(e) {
                e.preventDefault();
                var del = $(this).data('id');

                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url : "delete_data.php",
                            type : "POST",
                            data : {id:del},
                            success : function() {
                                swal({
                                    title: "Sweet!",
                                    text: "Delete data",
                                    imageUrl: 'thumbs-up.jpg'
                                }); 
                            }
                        });
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
            });
        });
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