<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');

	include_once('../../config/db.php');

	include_once('../../api/model/tk.php');

	$db=new db();
	$conn= $db->connect();
	
	$tkk=new TaiKhoan($conn);
	$readd=$tkk->read();
	$num=$readd->rowCount();

	if($num>0){
		$array_taikhoan=[];
		$array_taikhoan['data']=[];
		while($row=$readd->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			$item_taikhoan=array(
				'MaTK'=>$MaTK,
				'username'=>$USERNAME,
				'password'=>$PASSWORD,
				'MaQuyen'=>$MaQuyen
			);
			array_push($array_taikhoan['data'], $item_taikhoan);
		}
		echo json_encode($array_taikhoan);
	}




 ?>