<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');

	include_once('../../config/db.php');

	include_once('../../api/model/pt.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new PhieuThue($conn);

	$tkk->MaPT=isset($_GET['id'])?$_GET['id']:die();
	$tkk->show();

	$item_phieuthue=array(
				'MaPT'=>$tkk->MaPT,
				'MaNV'=>$tkk->MaNV,
				'MaKH'=>$tkk->MaKH,
				'NgayNhanXe'=>$tkk->NgayNhanXe,
				'PTTT'=>$tkk->PTTT,
				'TongTien'=>$tkk->TongTien,
				'TrangThai'=>$tkk->TrangThai,
				'MaPT'=>$tkk->MaPT
			);
	
	print_r(json_encode($item_phieuthue));

 ?>