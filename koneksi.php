<?php
	function open_connection()
	{
		$host = "localhost";
		$username = "root";
		$password = "";
		$databasename = "projek_perpus";
		
		$koneksi = mysqli_connect($host,$username,$password,$databasename);
		
		if (mysqli_connect_error())
		{
			die("Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error());
		}
		return $koneksi;
	}	
?>