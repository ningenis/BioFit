<html>
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
	</style>
   </head>
   <body>
      <!-- form pendaftaran -->
	  <h2>Form Pendaftaran Pasien Baru</h2>
<form method="post" action="client2.php?op=registrasi">
	<br>
		<div class="offset4 span2" style="margin-left: 0px">
		<td><strong> Nama </td></strong>
		</div>
		<div class="offset0 span1" style="margin-left: -10px">
		<td> <input type="text" name="Nama"> </td>
		</div>
	</br>
	<br>
		<div class="offset4 span2" style="margin-left: 0px">
		<td><strong> Tempat, Tanggal Lahir </td></strong>
		</div>
		<div class="offset0 span1" style="margin-left: -10px">
		<td> <input type="text" name="TTL"> </td>
		</div>
	</br>
	<br>
		<div class="offset4 span2" style="margin-left: 0px">
		<td><strong> Jenis Kelamin (L/P) </td></strong>
		</div>
		<div class="offset0 span1" style="margin-left: -10px">
		<td> <input type="text" name="Jenis_Kelamin"> </td>
		</div>
	</br>
	<br>
		<div class="offset4 span2" style="margin-left: 0px">
		<td><strong> Status </td></strong>
		</div>
		<div class="offset0 span1" style="margin-left: -10px">
		<td> <input type="text" name="Status"> </td>
		</div>
	</br>
	<br>
		<div class="offset4 span2" style="margin-left: 0px">
		<td><strong> Golongan Darah </td></strong>
		</div>
		<div class="offset0 span1" style="margin-left: -10px">
		<td> <input type="text" name="Golongan_Darah"> </td>
		</div>
	</br>
	<br>
		<div class="offset4 span2" style="margin-left: 0px">
		<td><strong> Tinggi Badan (cm) </td></strong>
		</div>
		<div class="offset0 span1" style="margin-left: -10px">
		<td> <input type="text" name="Tinggi">  </td>
		</div>
	</br>
	<br>
		<div class="offset4 span2" style="margin-left: 0px">
		<td><strong> Berat Badan (kg) </td></strong>
		</div>
		<div class="offset0 span1" style="margin-left: -10px">
		<td> <input type="text" name="Berat"> </td>
		</div>
	</br>
	<br>
		<div class="offset4 span2" style="margin-left: 0px">
		<td><strong> Alamat </td></strong>
		</div>
		<div class="offset0 span1" style="margin-left: -10px">
		<td> <input type="text" name="Alamat"> </td>
		</div>
	</br>
	<br>
		<div class="offset4 span2" style="margin-left: 0px">
		<td><strong> Nomor Kontak </td></strong>
		</div>
		<div class="offset0 span1" style="margin-left: -10px">
		<td> <input type="text" name="Kontak"> </td>
		</div>
	</br>
	<br>
	<div class="span4" style="margin-left: 0px">
	<td> <input type="submit" name="submit" value="Submit" class="btn btn-large btn-primary btn-block"> </td>
	<a href="index.php" class="btn btn-large btn-primary btn-block">Kembali</a>
	</div>
	</br>
</form>
      <?php
        // proses input isian form ke basis data
        if (isset($_GET['op']))
        {
            if ($_GET['op'] == 'registrasi')
            {
                require_once('lib/nusoap.php');
                // baca keyword dari form
                $Nama = $_POST['Nama'];
				$TTL = $_POST['TTL'];
				$Jenis_Kelamin = $_POST['Jenis_Kelamin'];
				$Status = $_POST['Status'];
				$Golongan_Darah = $_POST['Golongan_Darah'];
				$Tinggi = $_POST['Tinggi'];
				$Berat = $_POST['Berat'];
				$Alamat = $_POST['Alamat'];
				$Kontak = $_POST['Kontak'];

                // instansiasi obyek untuk class nusoap client, arahkan URL ke script server.php di server
                $client = new nusoap_client('http://localhost/biofit/server.php');

                // proses call method 'registrasi' dengan parameter di script server.php yang ada di server
                $result = $client->call('registrasi', array('Nama' => $Nama,'TTL' => $TTL, 'Jenis_Kelamin' => $Jenis_Kelamin, 'Status' => $Status, 'Golongan_Darah' => $Golongan_Darah, 'Tinggi' => $Tinggi, 'Berat' => $Berat, 'Alamat' => $Alamat, 'Kontak' => $Kontak));

                // jika pendaftaran berhasil, maka tampilkan
				echo "<p><center><strong>Pendaftaran Berhasil</strong></center></p>";
            }
        }
        ?>

    </body>
</html>
