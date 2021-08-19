<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');

	include_once('../../config/db.php');

	include_once('../../api/model/pd.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new PhieuDat($conn);
	$readd=$tkk->read();
	$num=$readd->rowCount();

	if($num>0){
		$array_phieudat=[];
		$array_phieudat['data']=[];
		while($row=$readd->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			$item_phieudat=array(
				'MaPD'=>$tkk->MaPD,
				'MaKH'=>$tkk->MaKH,
				'NgayDatXe'=>$tkk->NgayDatXe,
				'TrangThai'=>$tkk->TrangThai,
				'MaNV'=>$tkk->MaNV,
				'TongTien'=>$tkk->TongTien,
				'NgayNhanXeDuKien'=>$tkk->NgayNhanXeDuKien,
				'PTTT'=>$tkk->PTTT,
				'TienCoc'=>$tkk->TienCoc
			);
			array_push($array_phieudat['data'], $item_phieudat);
		}
		echo json_encode($array_phieudat);
	}




 ?>