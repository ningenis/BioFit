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
<!-- form antrian -->
      <form method="post" action="client3.php?op=antrian">
	  	  <div class="row">
			<div class="offset4 span4" style="margin-top: 50px">
			<center>
			<h2>Menu Cek Antrian</h2>
          <input type="submit" name="submit" value="Cek Antrian" class="btn btn-large btn-primary btn-block">
		  	</center>
			</div>
		</div>
      </form>
      <form method="post" action="client3.php?op=reservasi">
	  	  <div class="row">
			<div class="offset4 span4" style="margin-top: 50px">
			<center>
			<h2>Reservasi Antrian</h2>
          <strong> Nama Pasien </strong> <input type="text" name="key" class="penuhin"> <input type="submit" name="submit" value="Reservasi" class="btn btn-large btn-primary btn-block">
		  	<a href="index.php" class="btn btn-large btn-primary btn-block">Kembali</a>
			</center>
			</div>
		</div>
      </form>
	  <?php
        // proses pencarian data dan reservasi
        if (isset($_GET['op']))
        {
	        if ($_GET['op'] == 'antrian')
            {
                require_once('lib/nusoap.php');

                // instansiasi obyek untuk class nusoap client, arahkan URL ke script server.php di server
                $client = new nusoap_client('http://localhost/biofit/server.php');

                // proses call method 'antrian' dengan parameter di script server.php yang ada di server
				$result2 = $client->call('antrian');
				
				// tampilkan hasil operasi
				if (is_array($result2))
                {
					echo "<center>";
                    echo "<table border='1'>";
                    echo "<tr><th>NAMA</th><th>NOMOR ANTRIAN</th></tr>";
                    foreach($result2 as $data)
                    {
                        echo "<tr><td>".$data['Nama']."</td><td>".$data['Nomor_Antrian']."</td></tr>";
                    }
                    echo "</table>";
					echo "</center>";
                }
                else echo "<p><center>Data tidak ditemukan</center></p>";
            }
			if ($_GET['op'] == 'reservasi')
            {
                require_once('lib/nusoap.php');
                // baca keyword pencarian dari form
                $key = $_POST['key'];

                // instansiasi obyek untuk class nusoap client, arahkan URL ke script server.php di server
                $client = new nusoap_client('http://localhost/biofit/server.php');

                // proses call method 'reservasi' dengan parameter key di script server.php yang ada di server
                $result = $client->call('reservasi', array('key' => $key));

                // tampilkan hasil operasi
                if (is_array($result))
                {
					echo "<center>";
					echo "<table border='1'>";
                    foreach($result as $data)
                    {
						echo "<p><strong>Nomor Antrian Anda</strong></p>";
                        echo "<font size=40>".$data['nomor_antrian']."</font>";
                    }
					echo "</table>";
					echo "</center>";
                }
                else echo "<p><center>Data tidak ditemukan</center></p>";
			}
		}
        ?>

    </body>
</html>