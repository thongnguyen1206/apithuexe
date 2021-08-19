<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');

	include_once('../../config/db.php');

	include_once('../../api/model/sp.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new SanPham($conn);
	$readd=$tkk->ktxeboncho();
	$num=$readd->rowCount();

	if($num>0){
		$array_sanpham=[];
		$array_sanpham['data']=[];
		while($row=$readd->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			$item_sanpham=array(
				'MaSP'=>$MaSP,
				'TenSP'=>$TenSP,
				'GiaThue'=>$GiaThue,
				'GiaPhat'=>$GiaPhat,
				'IMG'=>$IMG,
				'MoTa'=>$MoTa,
				'TrangThai'=>$TrangThai,
				'SoXe'=>$SoXe,
				'MaLoai'=>$MaLoai,
				'NgayTao'=>$NgayTao
			);
			array_push($array_sanpham['data'], $item_sanpham);
		}
		echo json_encode($array_sanpham);

	}


 ?>