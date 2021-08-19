<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');

	include_once('../../config/db.php');

	include_once('../../api/model/tk.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new TaiKhoan($conn);

	$tkk->USERNAME=isset($_GET['username'])?$_GET['username']:die();
	$tkk->kiemtrauser();

	$item_taikhoan=array(
				'MaTK'=>$tkk->MaTK,
				'USERNAME'=>$tkk->USERNAME,
				'PASSWORD'=>$tkk->PASSWORD,
				'MaQuyen'=>$tkk->MaQuyen
			);
	
	print_r(json_encode($item_taikhoan));

 ?>