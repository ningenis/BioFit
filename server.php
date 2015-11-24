<?php

require_once('lib/nusoap.php');
$server = new soap_server;

// registrasi method-method
$server->register('search');
$server->register('registrasi');
$server->register('antrian');
$server->register('search2');
$server->register('pemeriksaan');
$server->register('reservasi');

// detail method 'search' dengan parameter $key
function search($key)
{
     // koneksi ke database
     mysql_connect('localhost', 'root', '');
     mysql_select_db('medis');

     // query pencarian data medis pasien
     $query = "SELECT * FROM rekam_medis WHERE Nama = '$key'";
     $hasil = mysql_query($query);
     while ($data = mysql_fetch_array($hasil))
     {
          // menyimpan data hasil pencarian dalam array
          $result[] = array('Tanggal' => $data['Tanggal'], 'Catatan_Kesehatan' => $data['Catatan_Kesehatan']);
     }
     // me-return array hasil pencarian
     return $result;
}

function search2($key)
{
     // koneksi ke database
     mysql_connect('localhost', 'root', '');
     mysql_select_db('medis');

     // query pencarian data pasien
     $query = "SELECT * FROM data_pasien WHERE Nama = '$key'";
     $hasil = mysql_query($query);
     while ($data = mysql_fetch_array($hasil))
     {
          // menyimpan data hasil pencarian dalam array
          $result[] = array('Nama' => $data['Nama'], 'TTL' => $data['TTL'], 'Jenis_Kelamin' => $data['Jenis_Kelamin'], 'Status' => $data['Status'], 'Golongan_Darah' => $data['Golongan_Darah'], 'Tinggi' => $data['Tinggi'], 'Berat' => $data['Berat'], 'Alamat' => $data['Alamat'], 'Kontak' => $data['Kontak']);
     }
     // me-return array hasil pencarian
     return $result;
}

function antrian()
{
     // koneksi ke database
     mysql_connect('localhost', 'root', '');
     mysql_select_db('medis');

     // query pengecekan antrian
     $query = "SELECT Nama, nomor_antrian FROM antrian ORDER BY nomor_antrian ASC";
     $hasil = mysql_query($query);
     while ($data = mysql_fetch_array($hasil))
     {
          // menyimpan data hasil pengecekan dalam array
          $result[] = array('Nama' => $data['Nama'], 'Nomor_Antrian' => $data['nomor_antrian']);
     }
     // me-return array hasil pengecekan
     return $result;
}

function pemeriksaan($Nama, $Tanggal, $Catatan_Kesehatan)
{
     // koneksi ke database
     mysql_connect('localhost', 'root', '');
	 mysql_select_db('medis');

     // query pemasukan data pemeriksaan
	 $mysql_query = "INSERT INTO rekam_medis (Nama, Tanggal, Catatan_Kesehatan) 
					VALUES ('$Nama', '$Tanggal', '$Catatan_Kesehatan')";
	 mysql_query($mysql_query);
}

function reservasi($key)
{
     // koneksi ke database
     mysql_connect('localhost', 'root', '');
	 mysql_select_db('medis');
	 
     // query reservasi antrian
     $mysql_query = "INSERT INTO antrian (Nama) VALUES ('$key')";
	 mysql_query($mysql_query);
	 $query = "SELECT nomor_antrian FROM antrian WHERE Nama = '$key'";
     $hasil = mysql_query($query);
     while ($data = mysql_fetch_array($hasil))
     {
          // menyimpan data hasil reservasi dalam array
          $result[] = array('nomor_antrian' => $data['nomor_antrian']);
     }
     // me-return array hasil reservasi
     return $result;
}

function registrasi($Nama,$TTL,$Jenis_Kelamin,$Status,$Golongan_Darah,$Tinggi,$Berat,$Alamat,$Kontak) {
     // koneksi ke database
     mysql_connect('localhost', 'root', '');
	 mysql_select_db('medis');
	 
     // query registrasi pasien baru
     $mysql_query = "INSERT INTO data_pasien (Nama, TTL, Jenis_Kelamin, Status, Golongan_Darah, Tinggi, Berat, Alamat, Kontak)
					 VALUES ('$Nama', '$TTL', '$Jenis_Kelamin', '$Status', '$Golongan_Darah', '$Tinggi', '$Berat', '$Alamat', '$Kontak')";
	 mysql_query($mysql_query);
}
	
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>