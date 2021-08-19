<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');

	include_once('../../config/db.php');

	include_once('../../api/model/sp.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new SanPham($conn);

	$tkk->MaSP=isset($_GET['MaSP'])?$_GET['MaSP']:die();
	$tkk->show();

	$item_sanpham=array(
				'MaSP'=>$MaSP,
				'TenSP'=>$TenSP,
				'GiaThue'=>$GiaThue,
				'GiaPhat'=>$GiaPhat,
				'IMG'=>$IMG,
				'MoTa'=>$MoTa,
				'TrangThai'=>$TrangThai,
				'SoXe'=>$SoXe,
				'MaLoai'=>$MaLoai,
				'NgayTao'=>$NgayTao
			);
	
	print_r(json_encode($item_sanpham));

 ?>