<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods:DELETE');
	header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

	include_once('../../config/db.php');

	include_once('../../api/model/pd.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new PhieuDat($conn);

	$data=json_decode(file_get_contents("php://input"));

	$tkk->MaPD=$data->MaPD;
	
	if($tkk->delete()){
		echo json_encode(array('message','pd delete'));
	}else{
		echo json_encode(array('message','pd not delete'));
	}

 ?>