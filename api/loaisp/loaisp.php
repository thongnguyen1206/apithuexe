<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');

	include_once('../../config/db.php');

	include_once('../../api/model/lsp.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new LoaiSP($conn);
	$readd=$tkk->read();
	$num=$readd->rowCount();

	if($num>0){
		$array_nhanvien=[];
		$array_nhanvien['data']=[];
		while($row=$readd->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			$item_nhanvien=array(
				'MaLoai'=>$MaLoai,
				'TenLoai'=>$TenLoai
			);
			array_push($array_nhanvien['data'], $item_nhanvien);
		}
		echo json_encode($array_nhanvien);
	}




 ?>