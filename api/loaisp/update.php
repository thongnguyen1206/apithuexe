<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods:PUT');
	header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

	include_once('../../config/db.php');

	include_once('../../api/model/lsp.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new LoaiSP($conn);

	$data=json_decode(file_get_contents("php://input"));

	$tkk->MaLoai=$data->MaLoai;
	$tkk->TenLoai=$data->TenLoai;
	
	if($tkk->update()){
		echo json_encode(array('message','nv update'));
	}else{
		echo json_encode(array('message','nv not update'));
	}

 ?>