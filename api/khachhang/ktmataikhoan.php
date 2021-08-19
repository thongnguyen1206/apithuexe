<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');

	include_once('../../config/db.php');

	include_once('../../api/model/kh.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new KhachHang($conn);

	$tkk->MaTK=isset($_GET['MaTK'])?$_GET['MaTK']:die();
	$tkk->ktmtk();

	$item_khachhang=array(
				'MaKH'=>$tkk->MaKH,
				'MaTK'=>$tkk->MaTK,
				'TenKH'=>$tkk->TenKH,
				'SDT'=>$tkk->SDT,
				'DiaChi'=>$tkk->DiaChi,
				'Email'=>$tkk->Email,
				'SGPLX'=>$tkk->SGPLX
			);
	
	print_r(json_encode($item_khachhang));

 ?>