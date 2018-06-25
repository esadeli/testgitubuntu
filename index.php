<html>
	<head>
		<title>Sistem Gudang - Extension</title>
		<style>
			table tr td, th {
				border : 1px solid;
			}
		</style>
	</head>
	<body>
		<h1>Data pengambilan barang</h1>
		<a href="tambah_data.php"> Tambah Data</a>
		<br/>
		<br/>
		<table>
			<tr>
				<th>ID</th>
				<th>Kode Barang</th>
				<th>Barang</th>
				<th>Jumlah</th>
				<th>Surat Permintaan Barang</th>
				<th>Staff - Penanggung Jawab</th>
				<th>Master Data</th>
				<th>Update Jumlah</th>
			</tr>
				<?php 
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "cyber";

					$conn = new mysqli($servername, $username, $password, $dbname);

					$sql ="SELECT * FROM dbgudangext";
					$result = $conn->query($sql);
					if($result->num_rows >0){
						while($row = $result->fetch_assoc()){
				?>
			<tr>
				<!--diremove sementara untuk tampilan id 18-11-2017-->
				<td><?php echo $row["db_kodebarang"]?></td>
				<td><?php echo $row["db_namabarang"]?></td>
				<td><?php echo $row["db_quantity"]?></td>
				<td><?php echo $row["db_suratpermintaan"]?></td>
				<td><?php echo $row["db_penanggungjawab"]?></td>	

				<td>
					<a href ="ubah_data.php/?id=<?php echo $row["db_id"]?>">Ubah Data</a>
					<a href ="hapus_data.php/?id=<?php echo $row["db_id"]?>">Hapus Data </a>
				</td>
				<td>
					
					<a href ="update_jumlah.php/?id=<?php echo $row["db_id"]?>">Update Jumlah</a>
				</td>
			</tr>
				<?php 
					} //untuk close while
				} // untuk close if
				else {
				?>
			<tr>
				<td colspan = "6"> Data barang tidak tersedia</td>		
			</tr>

			<?php 
				} // untuk close else
				$conn->close();
			?>
		</table>
	</body>
</html>
