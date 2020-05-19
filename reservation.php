<?php 
	
	session_start();
	require "admin/includes/functions.php";
	require "admin/includes/db.php";
	
	$msg = "";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		if(isset($_POST['submit'])) {
			
			$guest = preg_replace("#[^0-9]#", "", $_POST['guest']);
			$name = htmlentities($_POST['name'], ENT_QUOTES, 'UTF-8');
			$phone = preg_replace("#[^0-9]#", "", $_POST['phone']);
			$meja = htmlentities($_POST['meja'], ENT_QUOTES, 'UTF-8');
			$date_res = htmlentities($_POST['date_res'], ENT_QUOTES, 'UTF-8');
			$time = htmlentities($_POST['time'], ENT_QUOTES, 'UTF-8');
			$status = htmlentities($_POST['status'], ENT_QUOTES, 'UTF-8');
			$suggestions = htmlentities($_POST['suggestions'], ENT_QUOTES, 'UTF-8');
			
			if($guest != "" && $meja && $name && $status && $phone != "" && $date_res != "" && $time != "" && $suggestions != "") {
				
				//Check for remaining table space;
				$table_array = array();
				$mtime = strftime("%H", time());
				$mdate = strftime("%Y-%m-%d", time());
				$get_table_count = $db->query("SELECT global_amt FROM Globals");
				$row_count = $get_table_count->fetch_assoc();
				$table_count = $row_count['global_amt'];
				$fetch = $db->query("SELECT * FROM reservation");
				if($fetch->num_rows) {
					while($row_fetch = $fetch->fetch_assoc()) {
						if(($row_fetch['date_res'] >= $mdate) && ($row_fetch['time'] >= $mtime)) {
							$table_array[] = $row_fetch['reserve_id'];
						}
					}
				}
				echo(count($table_array));
				if(count($table_array) < $table_count) {
					$check = $db->query("SELECT * FROM reservation WHERE no_of_guest='".$guest."' AND name='".$name."' AND phone='".$phone."' AND date_res='".$date_res."' AND time='".$time."'  LIMIT 1");
					
					if($check->num_rows) {
						
						$msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Anda telah memasukan data reservasi yang sama</p>";
						
					}else{

						$check = $db->query("SELECT * FROM reservation WHERE date_res='".$date_res."' AND time='".$time."'  LIMIT 1");
						
						if($check->num_rows){

							$msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Tanggal dan waktu sudah ter-pesan. Silahkan pilih jadwal lain melalui Check Reservation</p>";

						}
						else{

							$insert = $db->query("INSERT INTO reservation(no_of_guest, name, status, phone, meja, date_res, time,  suggestions) VALUES('".$guest."', '".$name."', '".$status."', '".$phone."', '".$meja."', '".$date_res."', '".$time."', '".$suggestions."')");
						
							if($insert) {
								
								$ins_id = $db->insert_id;
								
								$reserve_code = "UNIQUE_$ins_id".substr($phone, 3, 8);
								
								$msg = "<p style='padding: 15px; color: green; background: #eeffee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Reservasi Sukses. Kode reservasi anda adalah $reserve_code. Selalu cek reservasi anda untuk pemberitahuan ACC reservasi. TERIMA KASIH</p>";
								
							}else{
								
								$msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Tidak dapat melakukan reservasi! Silahkan coba kembali</p>";
								
							}
						}
						
					}
				}else{
					
					$msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Jadwal telah dipesan. Silahkan pilih jadwal lain dengan cek jadwal reservasi lain terlebih dahulu</p>";
					
				}
				
			}else{
				
				$msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Pengisian data tidak lengkap atau tidak valid</p>";
				
				//print_r($_POST);
				
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

<link rel="stylesheet" href="css/main.css" />

<script src="js/jquery.min.js" ></script>

<script src="js/myscript.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
</head>

<body>
	
<?php require "includes/header.php"; ?>

<div class="parallax" onclick="remove_class()">
	
	<div class="parallax_head">
		
		<h2>Pesan</h2>
		<h3>Ruang Meja</h3>
		
	</div>
	
</div>

<div class="content" onclick="remove_class()">
	
	<div class="inner_content">
		
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="hr_book_form">
			
			<h2 class="form_head"><span class="book_icon">BOOKING MEJA</span></h2>
			<p class="form_slg">Kami Menawarkan Layanan Pemesanan Terbaik</p>
			<h6 class="form_head" style="text-align:center">CEK RESERVASI TERLEBIH DAHULU!</h6>
			
			<div class="form_group">
				<a href="cek_reservasi.php" class="btn btn-outline-dark btn-lg  btn-block " role="button" aria-pressed="true">CHECK RESERVATION</a>
			</div>

			<?php echo "<br/>".$msg; ?>
			
			<div class="left">
				
				<div class="form_group">
					 
					 <label>Banyak Tamu</label>
					<input type="number" placeholder="Berapa banyak tamu" min="1" name="guest" id="guest" required>
					
				</div>
				
				<div class="form_group">
					
					<label>Nama Pemesan</label>
					<input type="text" name="name" placeholder="Masukan Nama" required>
					
				</div>
				
				<div class="form_group">
					
					<label>Phone/No HP</label>
					<input type="text" name="phone" placeholder="Masukan Phone/No HP" required>
					
				</div>
				
				<div class="form_group">
					
					<label>Tanggal</label>
					<input type="date" name="date_res" placeholder="Pilih Tanggal Booking" required>
					
				</div>
				
				<div class="form_group">
					
					<label>Waktu</label>
					<input type="time" name="time" placeholder="Pilih Waktu Booking" required>
					
				</div>
				
				
			</div>
			
			<div class="left">
				
				<div class="form_group">
					
                    <label>Saran <small><b>(E.g Jumlah Pelat, Bagaimana pengaturannya)</b></small></label>
					<textarea name="suggestions" placeholder="Saran/Masukan" required></textarea>
					
				</div>

				<div class="form-group"> 
					<input type="hidden"  name="meja" value="Menunggu Konfirmasi">
                </div>

				<div class="form-group">
					<input type="hidden"  name="status" value="Menunggu Konfirmasi">
                </div>
				
				<div class="form_group">
					
					<input type="submit" class="submit" name="submit" value="BUAT BOOKING"/>
					
				</div>
				
			</div>
			
			<p class="clear"></p>
			
		</form>
		
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