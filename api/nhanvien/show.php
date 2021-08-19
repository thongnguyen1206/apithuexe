<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');

	include_once('../../config/db.php');

	include_once('../../api/model/nv.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new NhanVien($conn);

	$tkk->MaNV=isset($_GET['id'])?$_GET['id']:die();
	$tkk->show();

	$item_nhanvien=array(
				'MaNV'=>$tkk->MaNV,
				'MaTK'=>$tkk->MaTK,
				'TenNV'=>$tkk->TenNV,
				'SDT'=>$tkk->SDT,
				'DiaChi'=>$tkk->DiaChi,
				'Email'=>$tkk->Email
			);
	
	print_r(json_encode($item_nhanvien));

 ?>