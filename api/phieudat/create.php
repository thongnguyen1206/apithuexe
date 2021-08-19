<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods:POST');
	header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

	include_once('../../config/db.php');

	include_once('../../api/model/pd.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new PhieuDat($conn);

	$data=json_decode(file_get_contents("php://input"));

	$tkk->MaKH=$data->MaKH;
	$tkk->NgayDatXe=$data->NgayDatXe;
	$tkk->TrangThai=$data->TrangThai;
	$tkk->MaNV=$data->MaNV;
	$tkk->TongTien=$data->TongTien;
	$tkk->NgayNhanXeDuKien=$data->NgayNhanXeDuKien;
	$tkk->PTTT=$data->PTTT;
	$tkk->TienCoc=$data->TienCoc;


	if($tkk->create()){
		echo json_encode(array('message','pd creat'));
	}else{
		echo json_encode(array('message','pd not creat'));
	}

 ?>