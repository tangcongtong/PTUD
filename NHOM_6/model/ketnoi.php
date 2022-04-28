<?php 
		class clsketnoi {
			function ketnoidb (& $con){
				$con= mysqli_connect("localhost","admin1","123");
				mysqli_set_charset($con,"utf8");
				if($con){
					return mysqli_select_db($con,"kytucxa");
				}else{
					return false;
				}
			}
			function dongketnoi ($con) {
				mysqli_close($con);
			}
		}
	?>