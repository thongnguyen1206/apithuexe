<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');

	include_once('../../config/db.php');

	include_once('../../api/model/pt.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new PhieuThue($conn);
	$readd=$tkk->read();
	$num=$readd->rowCount();

	if($num>0){
		$array_phieuthue=[];
		$array_phieuthue['data']=[];
		while($row=$readd->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			$item_phieuthue=array(
				'MaPT'=>$tkk->MaPT,
				'MaNV'=>$tkk->MaNV,
				'MaKH'=>$tkk->MaKH,
				'NgayNhanXe'=>$tkk->NgayNhanXe,
				'PTTT'=>$tkk->PTTT,
				'TongTien'=>$tkk->TongTien,
				'TrangThai'=>$tkk->TrangThai,
				'MaPD'=>$tkk->MaPD
			);
			array_push($array_phieuthue['data'], $item_phieuthue);
		}
		echo json_encode($array_phieuthue);
	}




 ?>