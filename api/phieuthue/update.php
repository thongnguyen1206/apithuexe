<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods:PUT');
	header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

	include_once('../../config/db.php');

	include_once('../../api/model/pt.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new PhieuThue($conn);

	$data=json_decode(file_get_contents("php://input"));

	$tkk->MaPT=$data->MaPT;
	$tkk->MaNV=$data->MaNV;
	$tkk->MaKH=$data->MaKH;
	$tkk->NgayNhanXe=$data->NgayNhanXe;
	$tkk->PTTT=$data->PTTT;
	$tkk->TongTien=$data->TongTien;
	$tkk->TrangThai=$data->TrangThai;
	$tkk->MaPT=$data->MaPT;
	
	if($tkk->update()){
		echo json_encode(array('message','nv update'));
	}else{
		echo json_encode(array('message','nv not update'));
	}

 ?>