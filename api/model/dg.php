<?php
	class DanhGia{
		private $conn;


		public $MaKH;
		public $MaSP;
		public $SoSao;
		public $NgayDG;
		public $NoiDung;
		
		public function __construct($db){

			$this->conn=$db;
		}

		public function read(){
			
			$query="SELECT * FROM danhgia ";
			$stmt= $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}

		public function show(){
			$query="SELECT * FROM danhgia WHERE MaKH=? AND MaSP=? LIMIT 1";
			$stmt= $this->conn->prepare($query);
			$stmt->bindParam(2, $this->MaKH,$this->MaSP);
			$stmt->execute();
			$row=$stmt->fetch(PDO::FETCH_ASSOC);

			$this->MaKH=$row['MaKH'];
			$this->MaSP=$row['MaSP'];
			$this->SoSao=$row['SoSao'];
			$this->NgayDG=$row['NgayDG'];
			$this->NoiDung=$row['NoiDung'];

		}
		public function create(){
			$query="INSERT INTO danhgia SET MaKH=:MaKH,MaSP=:MaSP,SoSao=:SoSao,NgayDG=:NgayDG,NoiDung=:NoiDung";
			$stmt= $this->conn->prepare($query);

			$this->MaKH=htmlspecialchars(strip_tags($this->MaKH));
			$this->MaSP=htmlspecialchars(strip_tags($this->MaSP));
			$this->SoSao=htmlspecialchars(strip_tags($this->SoSao));
			$this->NgayDG=htmlspecialchars(strip_tags($this->NgayDG));
			$this->NoiDung=htmlspecialchars(strip_tags($this->NoiDung));
			

			$stmt->bindParam(':MaKH',$this->MaKH);
			$stmt->bindParam(':MaSP',$this->MaSP);
			$stmt->bindParam(':SoSao',$this->SoSao);
			$stmt->bindParam(':NgayDG',$this->NgayDG);
			$stmt->bindParam(':NoiDung',$this->NoiDung);

			if($stmt->execute()){
				return true;
			}
			echo("loi roi m oi");
			return false;
			
		}
		public function update(){
			$query="UPDATE danhgia SET MaKH=:MaKH,MaSP=:MaSP,SoSao=:SoSao,NgayDG=:NgayDG,NoiDung=:NoiDung WHERE MaKH=:MaKH AND MaSP=:MaSP";
			$stmt= $this->conn->prepare($query);
			
			$this->MaKH=htmlspecialchars(strip_tags($this->MaKH));
			$this->MaSP=htmlspecialchars(strip_tags($this->MaSP));
			$this->SoSao=htmlspecialchars(strip_tags($this->SoSao));
			$this->NgayDG=htmlspecialchars(strip_tags($this->NgayDG));
			$this->NoiDung=htmlspecialchars(strip_tags($this->NoiDung));
			

			$stmt->bindParam(':MaKH',$this->MaKH);
			$stmt->bindParam(':MaSP',$this->MaSP);
			$stmt->bindParam(':SoSao',$this->SoSao);
			$stmt->bindParam(':NgayDG',$this->NgayDG);
			$stmt->bindParam(':NoiDung',$this->NoiDung);

			if($stmt->execute()){
				return true;
			}
			return false;
		}
		public function delete(){
			$query="DELETE FROM danhgia WHERE MaKH=:MaKH AND MaSP=:MaSP";
			$stmt= $this->conn->prepare($query);
			
			$this->MaKH=htmlspecialchars(strip_tags($this->MaKH));
			$this->MaSP=htmlspecialchars(strip_tags($this->MaSP));


			$stmt->bindParam(':MaPD',$this->MaKH);
			$stmt->bindParam(':MaPD',$this->MaSP);

			if($stmt->execute()){
				return true;
			}
			return false;
		}
	}
 ?>