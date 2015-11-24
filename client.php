<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bio Fit Health Center</title>

	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
	<style>
	body {
		margin-top: 30px;
		margin-left: 50px;
	}
	.penuhin {
		width: 95%;
	}	
	</style>
</head>
   <body>
      <!-- form pencarian data dan pengisian rekam medis-->
      <form method="post" action="client.php?op=search2">
	  	<div class="row">
			<div class="offset4 span4" style="margin-top: 50px">
			<center>
			<h2>Data Pasien</h2>
          <strong> Nama Pasien  </strong> <input type="text" name="key" class="penuhin"> <input type="submit" name="submit" value="Cari" class="btn btn-large btn-primary btn-block">
			</center>
			</div>
		</div>
	  </form>      
	  <form method="post" action="client.php?op=search">
	  	<div class="row">
			<div class="offset4 span4" style="margin-top: 50px">
			<center>
			<h2>Rekam Medis Pasien</h2>
          <strong> Nama Pasien  </strong> <input type="text" name="key" class="penuhin"> <input type="submit" name="submit" value="Cari" class="btn btn-large btn-primary btn-block">
			</center>
			</div>
		</div>
	  </form>
	  <form method="post" action="client.php?op=pemeriksaan">
	  	<div class="row">
			<div class="offset4 span4" style="margin-top: 50px">
			<center>
			<h2>Form Rekam Medis</h2>
          <strong> Nama Pasien  </strong> <input type="text" name="Nama" class="penuhin"> 
		<strong> Tanggal Pemeriksaan  </strong> <input type="text" name="Tanggal" class="penuhin"> 
		<strong> Catatan Dokter  </strong> <input type="text" name="Catatan_Kesehatan" class="penuhin"> 
		<input type="submit" name="submit" value="Submit" class="btn btn-large btn-primary btn-block">	
		<a href="index.php" class="btn btn-large btn-primary btn-block">Kembali</a>		
			</center>
			</div>
		</div>
	  </form>
      <?php
        // proses pencarian data dan input pemeriksaan
        if (isset($_GET['op']))
        {
            if ($_GET['op'] == 'search')
            {
                require_once('lib/nusoap.php');
                // baca keyword pencarian dari form
                $key = $_POST['key'];

                // instansiasi obyek untuk class nusoap client, arahkan URL ke script server.php di server
                $client = new nusoap_client('http://localhost/biofit/server.php');

                // proses call method 'search' dengan parameter key di script server.php yang ada di server
                $result = $client->call('search', array('key' => $key));

                // jika data hasil pencarian ($result) ada, maka tampilkan
                if (is_array($result))
                {
					echo "<center>";
                    echo "<table border='1'>";
                    echo "<tr><th>TANGGAL</th><th>CATATAN</th></tr>";
                    foreach($result as $data)
                    {
                        echo "<tr><td>".$data['Tanggal']."</td><td>".$data['Catatan_Kesehatan']."</td></tr>";
                    }
                    echo "</table>";
                    // menampilkan jumlah data hasil pencarian
                    echo "<p>Ditemukan ".count($result)." catatan pasien bernama '".$key."'</p>";
					echo "</center>";
                }
                else echo "<p><center>Data tidak ditemukan</center></p>";
			}
			if ($_GET['op'] == 'search2')
            {
                require_once('lib/nusoap.php');
                // baca keyword pencarian dari form
                $key = $_POST['key'];

                // instansiasi obyek untuk class nusoap client, arahkan URL ke script server.php di server
                $client = new nusoap_client('http://localhost/biofit/server.php');

                // proses call method 'search2' dengan parameter key di script server.php yang ada di server
                $result3 = $client->call('search2', array('key' => $key));

                // jika data hasil pencarian ($result3) ada, maka tampilkan
                if (is_array($result3))
                {
					echo "<center>";
                    echo "<table border='1'>";
                    echo "<tr><th>Nama</th><th>Tempat, Tanggal Lahir</th><th>Jenis Kelamin</th><th>Status</th><th>Golongan Darah</th><th>Tinggi Badan (CM)</th><th>Berat Badan (KG) </th><th>Alamat</th><th>Nomor Kontak</th></tr>";
                    foreach($result3 as $data)
                    {
                        echo "<tr><td>".$data['Nama']."</td><td>".$data['TTL']."</td><td>".$data['Jenis_Kelamin']."</td><td>".$data['Status']."</td><td>".$data['Golongan_Darah']."</td><td>".$data['Tinggi']."</td><td>".$data['Berat']."</td><td>".$data['Alamat']."</td><td>".$data['Kontak']."</td></tr>";
                    }
                    echo "</table>";
					echo "</center>";
                }
                else echo "<p><center>Data tidak ditemukan</center></p>";
			}
			if ($_GET['op'] == 'pemeriksaan')
            {
                require_once('lib/nusoap.php');
                // baca keyword masukan dari form
                $Nama = $_POST['Nama'];
				$Tanggal = $_POST['Tanggal'];
				$Catatan_Kesehatan = $_POST['Catatan_Kesehatan'];

                // instansiasi obyek untuk class nusoap client, arahkan URL ke script server.php di server
                $client = new nusoap_client('http://localhost/biofit/server.php');

                // proses call method 'pemeriksaan' dengan parameter di script server.php yang ada di server
                $result3 = $client->call('pemeriksaan', array('Nama' => $Nama, 'Tanggal' => $Tanggal, 'Catatan_Kesehatan' => $Catatan_Kesehatan));

                // jika data berhasil dimasukkan, maka tampilkan
				echo "<p><center><strong>Data berhasil dimasukkan</strong></center></p>";
			}
        }
        ?>

    </body>
</html>