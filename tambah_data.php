<html>
	<head>
		<title>Sistem Gudang Extension</title>
		<style>
			table tr td, th{
				border : 1px solid;
			}
		</style>
	</head>

	<body>
		<h1>Register Master Data </h1>
		<hr>
		<?php 
			$kodebarang = '';
			$namabarang = '';
			$jumlahbarang = '';
			$suratpermintaan = '';
			$penanggungjawab = '';

			if($_SERVER["REQUEST_METHOD"] =="POST"){
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "cyber";
				$conn = new mysqli($servername, $username, $password, $dbname);

				$mbr_kodebarang = $_POST["inputkodebarang"];
				$mbr_namabarang = $_POST["inputnamabarang"];
				$mbr_suratpermintaan = $_POST["inputsuratpermintaan"];
				$mbr_penanggungjawab = $_POST["inputpenanggungjawab"];

				$sqlinsert = 'INSERT INTO dbgudangext (db_kodebarang, db_namabarang, db_suratpermintaan, db_penanggungjawab)

				VALUES ("'.$mbr_kodebarang.'","'.$mbr_namabarang.'","'.$mbr_suratpermintaan.'", "'.$mbr_penanggungjawab.'")';

				if($conn->query($sqlinsert)==TRUE){

			
		?>			
			<script type="text/javascript">
				alert('Data barang berhasil ditambahkan');
			</script>
			
			<?php	
					}
				$conn->close();
				header("Refresh:0,url=index.php");	
				//header("Refresh:0,url=connect_database_prac.php") untuk re-direct ke page tertentu /session tertentu
				exit();
				}
			?>
		
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<label>Kode Barang</label><br>
			<input class="inputkodebarang"  name="inputkodebarang" value ="">
			<br>
			<label>Nama Barang</label><br>
			<input class="inputnamabarang" name="inputnamabarang" value="">
			<br>
			<label>Jumlah Barang</label><br><?=$jumlahbarang?><br>
			<label>Surat Permintaan Barang</label><br>
			<input class="inputsuratpermintaan" name="inputsuratpermintaan" value="">
			<br>
			<label>Staff - Penanggung Jawab</label><br>
			<input class="inputpenanggungjawab" name="inputpenanggungjawab", value="">
			<br>
			<input type="submit" value="Save">

		</form>
	</body>
</html>