<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods:POST');
	header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

	include_once('../../config/db.php');

	include_once('../../api/model/tk.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new TaiKhoan($conn);

	$data=json_decode(file_get_contents("php://input"));

	$tkk->USERNAME=$data->USERNAME;
	$tkk->PASSWORD=$data->PASSWORD;


	if($tkk->create()){
		echo json_encode($data);
	}else{
		echo json_encode(array('message','tk not creat'));
	}

 ?>