<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods:PUT');
	header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

	include_once('../../config/db.php');

	include_once('../../api/model/kh.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new KhachHang($conn);

	$data=json_decode(file_get_contents("php://input"));

	$tkk->MaKH=$data->MaKH;
	$tkk->MaTK=$data->MaTK;
	$tkk->TenKH=$data->TenKH;
	$tkk->SDT=$data->SDT;
	$tkk->DiaChi=$data->DiaChi;
	$tkk->Email=$data->Email;
	$tkk->SGPLX=$data->SGPLX;
	if($tkk->update()){
		echo json_encode($data);
	}else{
		echo json_encode(array('message','kh not update'));
	}

 ?>