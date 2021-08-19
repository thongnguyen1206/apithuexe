<?php
	class NhanVien{
		private $conn;


		public $MaNV;
		public $MaTK;
		public $TenNV;
		public $SDT;
		public $DiaChi;
		public $Email;

		public function __construct($db){

			$this->conn=$db;
		}

		public function read(){
			
			$query="SELECT * FROM nhanvien GROUP BY MaNV DESC";
			$stmt= $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}

		public function show(){
			$query="SELECT * FROM nhanvien WHERE MaNV=? LIMIT 1";
			$stmt= $this->conn->prepare($query);
			$stmt->bindParam(1, $this->MaNV);
			$stmt->execute();
			$row=$stmt->fetch(PDO::FETCH_ASSOC);

			$this->MaNV=$row['MaNV'];
			$this->MaTK=$row['MaTK'];
			$this->TenNV=$row['TenNV'];
			$this->SDT=$row['SDT'];
			$this->DiaChi=$row['DiaChi'];
			$this->Email=$row['Email'];

		}
		public function create(){
			$query="INSERT INTO nhanvien SET MaTK=:MaTK,TenNV=:TenNV,SDT=:SDT,DiaChi=:DiaChi,Email=:Email";
			$stmt= $this->conn->prepare($query);

			$this->MaTK=htmlspecialchars(strip_tags($this->MaTK));
			$this->TenNV=htmlspecialchars(strip_tags($this->TenNV));
			$this->SDT=htmlspecialchars(strip_tags($this->SDT));
			$this->DiaChi=htmlspecialchars(strip_tags($this->DiaChi));
			$this->Email=htmlspecialchars(strip_tags($this->Email));

			$stmt->bindParam(':MaTK',$this->MaTK);
			$stmt->bindParam(':TenNV',$this->TenNV);
			$stmt->bindParam(':SDT',$this->SDT);
			$stmt->bindParam(':DiaChi',$this->DiaChi);
			$stmt->bindParam(':Email',$this->Email);

			if($stmt->execute()){
				return true;
			}
			echo("loi roi m oi");
			return false;
			
		}

		public function update(){
			$query="UPDATE nhanvien SET MaNV=:MaNV,MaTK=:MaTK,TenNV=:TenNV,SDT=:SDT,DiaChi=:DiaChi,Email=:Email WHERE MaNV=:MaNV";
			$stmt= $this->conn->prepare($query);
			
			$this->MaNV=htmlspecialchars(strip_tags($this->MaNV));
			$this->MaTK=htmlspecialchars(strip_tags($this->MaTK));
			$this->TenNV=htmlspecialchars(strip_tags($this->TenNV));
			$this->SDT=htmlspecialchars(strip_tags($this->SDT));
			$this->DiaChi=htmlspecialchars(strip_tags($this->DiaChi));
			$this->Email=htmlspecialchars(strip_tags($this->Email));


			$stmt->bindParam(':MaNV',$this->MaNV);
			$stmt->bindParam(':MaTK',$this->MaTK);
			$stmt->bindParam(':TenNV',$this->TenNV);
			$stmt->bindParam(':SDT',$this->SDT);
			$stmt->bindParam(':DiaChi',$this->DiaChi);
			$stmt->bindParam(':Email',$this->Email);

			if($stmt->execute()){
				return true;
			}
			return false;
		}
		public function delete(){
			$query="DELETE FROM nhanvien WHERE MaNV=:MaNV";
			$stmt= $this->conn->prepare($query);
			
			$this->MaNV=htmlspecialchars(strip_tags($this->MaNV));

			$stmt->bindParam(':MaNV',$this->MaNV);

			if($stmt->execute()){
				return true;
			}
			return false;
		}
	}
 ?>