<?php
	class KhachHang{
		private $conn;


		public $MaKH;
		public $MaTK;
		public $TenKH;
		public $SDT;
		public $DiaChi;
		public $Email;
		public $SGPLX;

		public function __construct($db){

			$this->conn=$db;
		}

		public function read(){
			
			$query="SELECT * FROM khachhang GROUP BY MaKH DESC";
			$stmt= $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}

		public function show(){
			$query="SELECT * FROM khachhang WHERE MaKH=? LIMIT 1";
			$stmt= $this->conn->prepare($query);
			$stmt->bindParam(1, $this->MaKH);
			$stmt->execute();
			$row=$stmt->fetch(PDO::FETCH_ASSOC);

			$this->MaKH=$row['MaKH'];
			$this->MaTK=$row['MaTK'];
			$this->TenKH=$row['TenKH'];
			$this->SDT=$row['SDT'];
			$this->DiaChi=$row['DiaChi'];
			$this->Email=$row['Email'];
			$this->SGPLX=$row['SGPLX'];

		}
		public function ktmtk(){
			$query="SELECT * FROM khachhang WHERE MaTK=?";
			$stmt= $this->conn->prepare($query);
			$stmt->bindParam(1, $this->MaTK);
			$stmt->execute();
			$row=$stmt->fetch(PDO::FETCH_ASSOC);

			$this->MaKH=$row['MaKH'];
			$this->MaTK=$row['MaTK'];
			$this->TenKH=$row['TenKH'];
			$this->SDT=$row['SDT'];
			$this->DiaChi=$row['DiaChi'];
			$this->Email=$row['Email'];
			$this->SGPLX=$row['SGPLX'];

		}
		public function create(){
			$query="INSERT INTO khachhang SET MaTK=:MaTK,TenKH=:TenKH,SDT=:SDT,DiaChi=:DiaChi,Email=:Email,SGPLX=:SGPLX";
			$stmt= $this->conn->prepare($query);

			$this->MaTK=htmlspecialchars(strip_tags($this->MaTK));
			$this->TenKH=htmlspecialchars(strip_tags($this->TenKH));
			$this->SDT=htmlspecialchars(strip_tags($this->SDT));
			$this->DiaChi=htmlspecialchars(strip_tags($this->DiaChi));
			$this->Email=htmlspecialchars(strip_tags($this->Email));
			$this->SGPLX=htmlspecialchars(strip_tags($this->SGPLX));

			$stmt->bindParam(':MaTK',$this->MaTK);
			$stmt->bindParam(':TenKH',$this->TenKH);
			$stmt->bindParam(':SDT',$this->SDT);
			$stmt->bindParam(':SDT',$this->DiaChi);
			$stmt->bindParam(':Email',$this->Email);
			$stmt->bindParam(':SGPLX',$this->SGPLX);

			if($stmt->execute()){
				return true;
			}
			echo("loi roi m oi");
			return false;
			
		}

		public function update(){
			$query="UPDATE khachhang SET MaKH=:MaKH,MaTK=:MaTK,TenKH=:TenKH,SDT=:SDT,DiaChi=:DiaChi,Email=:Email,SGPLX=:SGPLX WHERE MaKH=:MaKH";
			$stmt= $this->conn->prepare($query);
			
			$this->MaKH=htmlspecialchars(strip_tags($this->MaKH));
			$this->MaTK=htmlspecialchars(strip_tags($this->MaTK));
			$this->TenKH=htmlspecialchars(strip_tags($this->TenKH));
			$this->SDT=htmlspecialchars(strip_tags($this->SDT));
			$this->DiaChi=htmlspecialchars(strip_tags($this->DiaChi));
			$this->Email=htmlspecialchars(strip_tags($this->Email));
			$this->SGPLX=htmlspecialchars(strip_tags($this->SGPLX));


			$stmt->bindParam(':MaKH',$this->MaKH);
			$stmt->bindParam(':MaTK',$this->MaTK);
			$stmt->bindParam(':TenKH',$this->TenKH);
			$stmt->bindParam(':SDT',$this->SDT);
			$stmt->bindParam(':SDT',$this->DiaChi);
			$stmt->bindParam(':Email',$this->Email);
			$stmt->bindParam(':SGPLX',$this->SGPLX);

			if($stmt->execute()){
				return true;
			}
			return false;
		}
		public function delete(){
			$query="DELETE FROM khachhang WHERE MaKH=:MaKH";
			$stmt= $this->conn->prepare($query);
			
			$this->MaKH=htmlspecialchars(strip_tags($this->MaKH));

			$stmt->bindParam(':MaKH',$this->MaKH);

			if($stmt->execute()){
				return true;
			}
			return false;
		}
	}
 ?>