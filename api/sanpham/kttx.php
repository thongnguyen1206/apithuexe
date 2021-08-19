<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');

	include_once('../../config/db.php');

	include_once('../../api/model/sp.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new SanPham($conn);

	$tkk->TenSP=isset($_GET['TenXe'])?$_GET['TenXe']:die();
	$tkk->kiemtratenxe();

	$item_taikhoan=array(
				'MaSP'=>$tkk->MaSP,
				'TenSP'=>$tkk->TenSP,
				'GiaThue'=>$tkk->GiaThue,
				'GiaPhat'=>$tkk->GiaPhat,
				'IMG'=>$tkk->IMG,
				'MoTa'=>$tkk->MoTa,
				'TrangThai'=>$tkk->TrangThai,
				'SoXe'=>$tkk->SoXe,
				'MaLoai'=>$tkk->MaLoai,
				'NgayTao'=>$tkk->NgayTao
			);
	
	print_r(json_encode($item_taikhoan));

 ?>