<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');

	include_once('../../config/db.php');

	include_once('../../api/model/kh.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new KhachHang($conn);

	$tkk->MaKH=isset($_GET['id'])?$_GET['id']:die();
	$tkk->show();

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