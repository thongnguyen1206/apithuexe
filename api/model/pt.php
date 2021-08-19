<?php
	class PhieuThue{
		private $conn;


		public $MaPT;
		public $MaNV;
		public $MaKH;
		public $NgayNhanXe;
		public $PTTT;
		public $TongTien;
		public $TrangThai;
		public $MaPD;

		public function __construct($db){

			$this->conn=$db;
		}

		public function read(){
			
			$query="SELECT * FROM phieuthue GROUP BY MaPT DESC";
			$stmt= $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}

		public function show(){
			$query="SELECT * FROM phieuthue WHERE MaPT=? LIMIT 1";
			$stmt= $this->conn->prepare($query);
			$stmt->bindParam(1, $this->MaPT);
			$stmt->execute();
			$row=$stmt->fetch(PDO::FETCH_ASSOC);

			$this->MaPT=$row['MaPT'];
			$this->MaNV=$row['MaNV'];
			$this->MaKH=$row['MaKH'];
			$this->NgayNhanXe=$row['NgayNhanXe'];
			$this->PTTT=$row['PTTT'];
			$this->TongTien=$row['TongTien'];
			$this->TrangThai=$row['TrangThai'];
			$this->MaPD=$row['MaPD'];


		}
		public function create(){
			$query="INSERT INTO phieudat SET MaNV=:MaNV,MaKH=:MaKH,NgayNhanXe=:NgayNhanXe,PTTT=:PTTT,TongTien=:TongTien,TrangThai=:TrangThai,MaPD=:MaPD";
			$stmt= $this->conn->prepare($query);

			$this->MaNV=htmlspecialchars(strip_tags($this->MaNV));
			$this->MaKH=htmlspecialchars(strip_tags($this->MaKH));
			$this->NgayNhanXe=htmlspecialchars(strip_tags($this->NgayNhanXe));
			$this->PTTT=htmlspecialchars(strip_tags($this->PTTT));
			$this->TongTien=htmlspecialchars(strip_tags($this->TongTien));
			$this->TrangThai=htmlspecialchars(strip_tags($this->TrangThai));
			$this->MaPD=htmlspecialchars(strip_tags($this->MaPD));

			$stmt->bindParam(':MaNV',$this->MaNV);
			$stmt->bindParam(':MaKH',$this->MaKH);
			$stmt->bindParam(':NgayNhanXe',$this->NgayNhanXe);
			$stmt->bindParam(':PTTT',$this->PTTT);
			$stmt->bindParam(':TongTien',$this->TongTien);
			$stmt->bindParam(':TrangThai',$this->TrangThai);
			$stmt->bindParam(':MaPD',$this->MaPD);

			if($stmt->execute()){
				return true;
			}
			echo("loi roi m oi");
			return false;
			
		}
		public function update(){
			$query="UPDATE phieuthue SET MaPT=:MaPT,MaNV=:MaNV,MaKH=:MaKH,NgayNhanXe=:NgayNhanXe,PTTT=:PTTT,TongTien=:TongTien,TrangThai=:TrangThai,MaPD=:MaPD WHERE MaPT=:MaPT";
			$stmt= $this->conn->prepare($query);
			
			$this->MaPT=htmlspecialchars(strip_tags($this->MaPT));
			$this->MaNV=htmlspecialchars(strip_tags($this->MaNV));
			$this->MaKH=htmlspecialchars(strip_tags($this->MaKH));
			$this->NgayNhanXe=htmlspecialchars(strip_tags($this->NgayNhanXe));
			$this->PTTT=htmlspecialchars(strip_tags($this->PTTT));
			$this->TongTien=htmlspecialchars(strip_tags($this->TongTien));
			$this->TrangThai=htmlspecialchars(strip_tags($this->TrangThai));
			$this->MaPD=htmlspecialchars(strip_tags($this->MaPD));

			$stmt->bindParam(':MaPT',$this->MaPT);
			$stmt->bindParam(':MaNV',$this->MaNV);
			$stmt->bindParam(':MaKH',$this->MaKH);
			$stmt->bindParam(':NgayNhanXe',$this->NgayNhanXe);
			$stmt->bindParam(':PTTT',$this->PTTT);
			$stmt->bindParam(':TongTien',$this->TongTien);
			$stmt->bindParam(':TrangThai',$this->TrangThai);
			$stmt->bindParam(':MaPD',$this->MaPD);

			if($stmt->execute()){
				return true;
			}
			return false;
		}
		public function delete(){
			$query="DELETE FROM phieuthue WHERE MaPT=:MaPT";
			$stmt= $this->conn->prepare($query);
			
			$this->MaPT=htmlspecialchars(strip_tags($this->MaPT));

			$stmt->bindParam(':MaPT',$this->MaPT);

			if($stmt->execute()){
				return true;
			}
			return false;
		}
	}
 ?>