<?php
    	session_start();
        require "admin/includes/functions.php";
        require "admin/includes/db.php";

        $table_no = 0;
	$get_table_no = $db->query("SELECT * FROM Globals");
	if($get_table_no->num_rows) {
		$row_no = $get_table_no->fetch_assoc();
		$table_no = htmlentities($row_no['global_amt']);
	}
	
	
	$result = "";
	$pagenum = "";
	$per_page = 20;
		
		$count = $db->query("SELECT * FROM reservation");
		
		$pages = ceil((mysqli_num_rows($count)) / $per_page);
		
		if(isset($_GET['page'])) {
			
			$page = $_GET['page'];
			
		}else{
			
			$page = 1;
			
		}
						
		$start = ($page - 1) * $per_page;
		
		$reserve = $db->query("SELECT * FROM reservation LIMIT $start, $per_page");
		
		if($reserve->num_rows) {
			
			$result = "<table class='table table-hover'>
						<thead>
							<th>S/N</th>
							<th>Jumlah Tamu</th>
							<th>Nama Pemesan</th>
							<th>Tanggal</th>
							<th>Waktu</th>
							<th>Meja</th>
							<th>Status</th>
						</thead>
						<tbody>";
			
			$x = 1;
			
			while($row = $reserve->fetch_assoc()) {
				
				$reserve_id = $row['reserve_id'];
				$no_of_guest = $row['no_of_guest'];
				$name = $row['name'];
				$date_res = $row['date_res'];
				$time = $row['time'];
				$meja = $row['meja'];
				$status = $row['status'];
				
				
				$result .=  "<tr>
								<td>$x</td>
								<td>$no_of_guest</td>
								<td>$name</td>
								<td>$date_res</td>
								<td>$time</td>
								<td>$meja</td>
								<td>$status</td>
							</tr>";
																
									
				$x++;
			}
			
			$result .= "</tbody>
						</table>";
			
		}else{
			
			$result = "<p style='color:red; padding: 10px; background: #ffeeee;'>No Table reservations available yet</p>";
			
		}
	
	if(isset($_GET['delete'])) {
		
		$delete = preg_replace("#[^0-9]#", "", $_GET['delete']);
		
		if($delete != "") {
			
			$sql = $db->query("DELETE FROM reservation WHERE reserve_id='".$delete."'");
		
			if($sql) {
				
				echo "<script>alert('Successfully deleted')</script>";
				
			}else{
				
				echo "<script>alert('Operation Unsuccessful. Please try again')</script>";
				
			}
			
		}
		
		
	}
	
	if(isset($_POST['submit'])) {
			
		$notable = htmlentities($_POST['number'], ENT_QUOTES, 'UTF-8');
		
		if($notable == "") {
			echo "<script>alert('No form data sent')</script>";
		}else{
			$update = $db->query("UPDATE Globals SET global_amt='$notable'");
			
			if($update) {
				echo "<script>alert('Successfully Updated')</script>";
				//header("reservations.php");
			}else{
				echo "<script>alert('Problem encountered. Please try again')</script>";
			}
		}
			
	}

?>

<!Doctype html>

<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<meta name="description" content="" />

<meta name="keywords" content="" />

<head>
	
<title>MFORS</title>

 <!-- Bootstrap core CSS     -->
 <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

<!-- Animation library for notifications   -->
<link href="assets/css/animate.min.css" rel="stylesheet"/>

<!--  Light Bootstrap Table core CSS    -->
<link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


<!--  CSS for Demo Purpose, don't include it in your project     -->
<link href="assets/css/demo.css" rel="stylesheet" />


<!--     Fonts and icons     -->
<link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />


<link href="assets/css/style.css" rel="stylesheet" />

<link rel="stylesheet" href="css/main.css" />

<script src="js/jquery.min.js" ></script>

<script src="js/myscript.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
</head>
<style>
    h4 {
        background-color: #FF5722;
        color: #FFFF;
        padding: 20px 0;
    }

    thead{
        background-color: #FF5722;
        color: #FFFF;
    }

    table{
        position: relative;
        text-align: center;
    }
</style>

<body>
	
<?php require "includes/header.php"; ?>

<div class="parallax" onclick="remove_class()">
	
	<div class="parallax_head">
		
		<h2>Cek Pesanan</h2>
		<h3> Ruang Meja</h3>
    </div>
</div>
<div class="col-md-12"> &nbsp;</div>
<div class="wrapper">
    <div class="main-panel">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title" style="text-align:center">Daftar Pemesanan Meja</h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                                        
                            <?php echo $result; ?>

                        </div>
                    </div>
                </div>                    
            </div>
            <div class="form_group">
             <div class="col-md-12"> &nbsp;</div>
	            <form action="cek_reservasi.php">
    	            <a href="reservation.php" class="btn btn-outline-dark btn-lg  btn-block " role="button" aria-pressed="true">BACK TO RESERVATION</a>
	            </form>
            </div>
        </div>
    </div>
</div>
            


<div class="content" onclick="remove_class()">
	
	<div class="inner_content">
	
		<div class="contact">
			
		<div class="left">
				
				<h3>LOKASI</h3>
				<p>Unique Restaurant Semarang</p>
				<p>Jl. Nakula 1 no 7, Kota Semarang</p>
				
			</div>
			
			<div class="left">
				
				<h3>KONTAK</h3>
				<p>08754645432, 08586898709</p>
				<p>unique.resto@gmail.com</p>
				
			</div>
			
			<p class="left"></p>
			
			<div class="icon_holder">
				
				<a href="#"><img src="image/icons/Facebook.png" alt="image/icons/Facebook.png" /></a>
				<a href="#"><img src="image/icons/Google+.png" alt="image/icons/Google+.png"  /></a>
				<a href="#"><img src="image/icons/Twitter.png" alt="image/icons/Twitter.png"  /></a>
				
			</div>
			
		</div>
		
	</div>
	
</div>

<div class="footer_parallax" onclick="remove_class()">
	
	<div class="on_footer_parallax">
		
		<p>&copy; <?php echo strftime("%Y", time()); ?> <span>Unique Restaurant</span>. All Rights Reserved</p>
		
	</div>
	
</div>
	
</body>

</html>