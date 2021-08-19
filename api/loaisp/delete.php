<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods:DELETE');
	header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

	include_once('../../config/db.php');

	include_once('../../api/model/lsp.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new LoaiSP($conn);

	$data=json_decode(file_get_contents("php://input"));

	$tkk->MaLoai=$data->MaLoai;
	
	if($tkk->delete()){
		echo json_encode(array('message','nv delete'));
	}else{
		echo json_encode(array('message','nv not delete'));
	}

 ?>