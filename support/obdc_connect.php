<?php
/* $connect = odbc_connect($dsnName, $User, $password) or die("Error Connect");//คำสั่งเชื่อมต่อผ่าน DSN
$sql = "SELECT * FROM tableName WHERE ID = 1 "; //ดึงข้อมูลจากตาราง tableName
$exec = odbc_exec($connect, $sql);

While($result = odbc_fetch_array($exec))  //เอาค่าที่เอ็กซ์คิวเก็บไว้เป็น Array
{
        echo $result["Field1"]."<br>";
        echo $result["Fiedl2"]."<br>";
}

odbc_close($connect); //สั่งปิดการเชื่อมต่อ */
?>
<!DOCTYPE html>
<html lang="utf-8" class="">
	<body> //แทรก code ในส่วนของ body//
	<?php
	$DsnName = "DSNName";
	$UserName = "Admin";
	$Password = "PassDB";

	$dsnConnect  = odbc_connect($DsnName,$UserName,$Password);
	if($dsnConnect)
	{
			 echo "Database Connect";
	}else{
			echo "Database Connect Failed";
	}

	odbc_close($dsnConnect);
	?>
	</body>
</html>