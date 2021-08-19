<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods:POST');
	header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

	include_once('../../config/db.php');

	include_once('../../api/model/dg.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new DanhGia($conn);

	$data=json_decode(file_get_contents("php://input"));

	$tkk->MaKH=$data->MaKH;
	$tkk->MaSP=$data->MaSP;
	$tkk->SoSao=$data->SoSao;
	$tkk->NgayDG=$data->NgayDG;
	$tkk->NoiDung=$data->NoiDung;


	if($tkk->create()){
		echo json_encode(array('message','nv creat'));
	}else{
		echo json_encode(array('message','nv not creat'));
	}

 ?>