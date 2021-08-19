<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');

	include_once('../../config/db.php');

	include_once('../../api/model/dg.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new DanhGia($conn);

	$tkk->MaKH=isset($_GET['id'])?$_GET['id']:die();
	$tkk->MaSP=isset($_GET['id'])?$_GET['id']:die();
	$tkk->show();

	$item_danhgia=array(
				'MaKH'=>$tkk->MaKH,
				'MaSP'=>$tkk->MaSP,
				'SoSao'=>$tkk->SoSao,
				'NgayDG'=>$tkk->NgayDG,
				'NoiDung'=>$tkk->NoiDung
			);
	
	print_r(json_encode($item_danhgia));

 ?>