<html>
	<head>
		<title>Sistem Gudang Extension</title>
		<style type="text/css">
			table tr td,th{
				border :1px solid;
			}
			button{
				background-color: #BDBDBD; /* Green */
    			border: 1px solid;
   				color: £212121;
    			padding: 5px 10px;
    			text-align: center;
    			text-decoration: none;
   				display: inline-block;
    			font-size: 15px;
			}
		</style>
	</head>

	<body>
		<h1>Update Jumlah</h1>
		<hr>
			<?php 
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "cyber";

				$conn = new mysqli($servername,$username,$password,$dbname);
				$sql = 'SELECT * FROM dbgudangext WHERE db_id ='.$_GET["id"];

				$result = $conn->query($sql);
				$data = $result->fetch_assoc();

				$kodebarang = $data["db_kodebarang"];
				$namabarang = $data["db_namabarang"];
				$jumlahbarang = $data["db_quantity"];
				$jumlahdisplay = $jumlahbarang;
				$suratpermintaan = $data["db_suratpermintaan"];
				$penanggungjawab = $data["db_penanggungjawab"];

					if($_SERVER["REQUEST_METHOD"]=="POST"){
						$mbr_quantity = $_POST["inputquantity"];

					$conn = new mysqli($servername, $username, $password, $dbname);

					$sqlupdate = 'UPDATE dbgudangext SET db_quantity = "'.$mbr_quantity.'" WHERE db_id =' .$_GET["id"]; 

					if($conn->query($sqlupdate) === TRUE){
			?>

						<script type="text/javascript">
							alert('Jumlah barang berhasil diperbaharui');
						</script>

			<?php	
					}
					else{
			?>
						<script type="text/javascript">
							alert('Update jumlah gagal');
						</script>

			<?php			
					}
					$conn->close();
					header("Refresh:0;url=../index.php");
					exit();
				}
			?>

		
			
		

			

		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"].'?id='.$_GET['id'])?>">
			<label>Kode Barang :</label><?=$kodebarang?><br>
			<label>Nama Barang :</label><?=$namabarang?><br>
			<label>Jumlah Barang :</label><?=$jumlahdisplay?>

			<button id = "tambah" type = "submit" value="+"><b>+</b></button>
			<button id = "kurang" type = "submit" value="-"><b>-</b></button>
			<br>
			<label>Surat Permintaan Barang :</label><?=$suratpermintaan?><br>
			<label>Penanggung Jawab :</label><?=$penanggungjawab?><br>
			<input type ="submit" value="Save">
		</form>
			

	</body>
</html>