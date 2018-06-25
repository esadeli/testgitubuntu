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
		<h1>Hapus Data</h1>
		<br>
		<?php 
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "cyber";

			$conn = new mysqli($servername,$username,$password,$dbname);

			$sql ='SELECT * FROM dbgudangext WHERE db_id ='.$_GET['id'];
			$result = $conn->query($sql);
			$data = $result->fetch_assoc();

			$kodebarang = implode("", array($data["db_kodebarang"]));
			$namabarang = implode("", array($data["db_namabarang"]));
			$jumlahbarang = $data["db_quantity"];
			$suratpermintaan = $data["db_suratpermintaan"];
			$penanggungjawab = $data["db_penanggungjawab"];

			if($_SERVER["REQUEST_METHOD"]=="POST"){
				$conn = new mysqli($servername, $username, $password, $dbname);

				$sqlupdate = 'DELETE FROM dbgudangext WHERE db_id ='.$_GET['id'];

					if($conn->query($sqlupdate)===TRUE) {

		?>				
						<script type="text/javascript">
							alert('Data barang sudah di delete');
						</script>
					<?php 
						}
						else{
					?>
						<script type="text/javascript">
							alert('Failed to delete Data');
						</script>
			<?php	
						}
						$conn->close();
						header("Refresh:0;url=../index.php");
						exit();
				}
			?>

		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"].'?id='.$_GET['id']); ?>">
			Hapus data barang ?<br><br>
			<label>Kode Barang :</label><?=$kodebarang?><br>
			<label>Nama Barang :</label><?=$namabarang?><br>
			<label>Jumlah Barang :</label><?=$jumlahbarang?><br>
			<label>Surat Permintaan Barang :</label><?=$suratpermintaan?><br>
			<label>Penanggung Jawab :</label><?=$penanggungjawab?><br>

			<input type="submit" value="Delete">

		</form>
		
	</body>
</html>