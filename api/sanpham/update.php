<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods:PUT');
	header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

	include_once('../../config/db.php');

	include_once('../../api/model/sp.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new SanPham($conn);

	$data=json_decode(file_get_contents("php://input"));

	$tkk->MaSP=$data->MaSP;
	$tkk->TenSP=$data->TenSP;
	$tkk->GiaThue=$data->GiaThue;
	$tkk->GiaPhat=$data->GiaPhat;
	$tkk->IMG=$data->IMG;
	$tkk->MoTa=$data->MoTa;
	$tkk->TrangThai=$data->TrangThai;
	$tkk->SoXe=$data->SoXe;
	$tkk->MaLoai=$data->MaLoai;
	$tkk->NgayTao=$data->NgayTao;
	if($tkk->update()){
		echo json_encode(array('message','tk update'));
	}else{
		echo json_encode(array('message','tk not update'));
	}

 ?>