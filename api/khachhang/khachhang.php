<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');

	include_once('../../config/db.php');

	include_once('../../api/model/kh.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new KhachHang($conn);
	$readd=$tkk->read();
	$num=$readd->rowCount();

	if($num>0){
		$array_khachhang=[];
		$array_khachhang['data']=[];
		while($row=$readd->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			$item_khachhang=array(
				'MaKH'=>$MaKH,
				'MaTK'=>$MaTK,
				'TenKH'=>$TenKH,
				'SDT'=>$SDT,
				'DiaChi'=>$DiaChi,
				'Email'=>$Email,
				'SGPLX'=>$SGPLX
			);
			array_push($array_khachhang['data'], $item_khachhang);
		}
		echo json_encode($array_khachhang);
	}




 ?>