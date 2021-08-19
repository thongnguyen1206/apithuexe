<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');

	include_once('../../config/db.php');

	include_once('../../api/model/pd.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new PhieuDat($conn);

	$tkk->MaPD=isset($_GET['id'])?$_GET['id']:die();
	$tkk->show();

	$item_phieudat=array(
				'MaPD'=>$tkk->MaPD,
				'MaKH'=>$tkk->MaKH,
				'NgayDatXe'=>$tkk->NgayDatXe,
				'TrangThai'=>$tkk->TrangThai,
				'MaNV'=>$tkk->MaNV,
				'TongTien'=>$tkk->TongTien,
				'NgayNhanXeDuKien'=>$tkk->NgayNhanXeDuKien,
				'PTTT'=>$tkk->PTTT,
				'TienCoc'=>$tkk->TienCoc
			);
	
	print_r(json_encode($item_phieudat));

 ?>