<html>
	<head>
		<title>Sistem Gudang Extension</title>
		<style type="text/css">
			table tr td,th{
				border : 1px solid;
			}
		</style>
	</head>

	<body>
		<h1>Ubah Master Data</h1>
		<hr>
			<?php 
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "cyber";

				$conn = new mysqli($servername, $username, $password, $dbname);

				$sql = 'SELECT * FROM dbgudangext WHERE db_id = '.$_GET['id'];

				$result = $conn->query($sql);
				$data = $result->fetch_assoc();

				$kodebarang = $data["db_kodebarang"];
				$namabarang = $data["db_namabarang"];
				$jumlahbarang = $data["db_quantity"];
				$suratpermintaan = $data["db_suratpermintaan"];
				$penanggungjawab = $data["db_penanggungjawab"];

					if($_SERVER["REQUEST_METHOD"] =="POST"){
						$mbr_kodebarang = $_POST["inputkodebarang"];
						$mbr_namabarang = $_POST["inputnamabarang"];
						$mbr_suratpermintaan = $_POST["inputsuratpermintaan"];
						$mbr_penanggungjawab = $_POST["inputpenanggungjawab"];

						$conn = new mysqli($servername, $username, $password, $dbname);

						$sqlupdate = 'UPDATE dbgudangext SET db_kodebarang = "'.$mbr_kodebarang.'",db_namabarang = "'.$mbr_namabarang.'",db_suratpermintaan = "'.$mbr_suratpermintaan.'", db_penanggungjawab = "'.$mbr_penanggungjawab.'" WHERE db_id = '.$_GET['id'];

							if($conn->query($sqlupdate) === TRUE) {
			?>

			<script type="text/javascript">
				alert('Data barang berhasil di Edit');
			</script>

			<?php
					}
					else {
			?>

			<script type="text/javascript">
				alert('Failure in data editing');
			</script>

			<?php
					}
					$conn->close();
					header("Refresh:0;url=../index.php");
					exit();
				  }
			?>

		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"].'?id='.$_GET['id'])?>">
			<label>Kode Barang</label><br>
			<input type="inputkodebarang" name="inputkodebarang" value="<?=$kodebarang?>">
			<br>
			<label>Nama Barang</label><br>
			<input type="inputnamabarang" name="inputnamabarang" value ="<?=$namabarang?>">
			<br>
			<label>Jumlah Barang</label><br><?=$jumlahbarang?><br>
			<label>Surat Permintaan Barang</label><br>
			<input type="inputsuratpermintaan" name="inputsuratpermintaan" value="<?=$suratpermintaan?>">
			<br>
			<label>Staff - Penanggung Jawab</label><br>
			<input type="inputpenanggungjawab" name="inputpenanggungjawab" value = "<?=$penanggungjawab?>">
			<br>
			<input type="submit" value="Save">
		</form>

	</body>
</html>