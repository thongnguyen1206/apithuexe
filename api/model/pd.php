<?php
	class PhieuDat{
		private $conn;


		public $MaPD;
		public $MaKH;
		public $NgayDatXe;
		public $TrangThai;
		public $MaNV;
		public $TongTien;
		public $NgayNhanXeDuKien;
		public $PTTT;
		public $TienCoc;

		public function __construct($db){

			$this->conn=$db;
		}

		public function read(){
			
			$query="SELECT * FROM phieudat GROUP BY MaPD DESC";
			$stmt= $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}

		public function show(){
			$query="SELECT * FROM phieudat WHERE MaPD=? LIMIT 1";
			$stmt= $this->conn->prepare($query);
			$stmt->bindParam(1, $this->MaPD);
			$stmt->execute();
			$row=$stmt->fetch(PDO::FETCH_ASSOC);

			$this->MaPD=$row['MaPD'];
			$this->MaKH=$row['MaKH'];
			$this->NgayDatXe=$row['NgayDatXe'];
			$this->TrangThai=$row['TrangThai'];
			$this->MaNV=$row['MaNV'];
			$this->TongTien=$row['TongTien'];
			$this->NgayNhanXeDuKien=$row['NgayNhanXeDuKien'];
			$this->PTTT=$row['PTTT'];
			$this->TienCoc=$row['TienCoc'];


		}
		public function create(){
			$query="INSERT INTO phieudat SET MaKH=:MaKH,NgayDatXe=:NgayDatXe,TrangThai=:TrangThai,MaNV=:MaNV,TongTien=:TongTien,NgayNhanXeDuKien=:NgayNhanXeDuKien,PTTT=:PTTT,TienCoc=:TienCoc";
			$stmt= $this->conn->prepare($query);

			$this->MaKH=htmlspecialchars(strip_tags($this->MaKH));
			$this->NgayDatXe=htmlspecialchars(strip_tags($this->NgayDatXe));
			$this->TrangThai=htmlspecialchars(strip_tags($this->TrangThai));
			$this->MaNV=htmlspecialchars(strip_tags($this->MaNV));
			$this->TongTien=htmlspecialchars(strip_tags($this->TongTien));
			$this->NgayNhanXeDuKien=htmlspecialchars(strip_tags($this->NgayNhanXeDuKien));
			$this->PTTT=htmlspecialchars(strip_tags($this->PTTT));
			$this->TienCoc=htmlspecialchars(strip_tags($this->TienCoc));

			$stmt->bindParam(':MaKH',$this->MaKH);
			$stmt->bindParam(':NgayDatXe',$this->NgayDatXe);
			$stmt->bindParam(':TrangThai',$this->TrangThai);
			$stmt->bindParam(':MaNV',$this->MaNV);
			$stmt->bindParam(':TongTien',$this->TongTien);
			$stmt->bindParam(':NgayNhanXeDuKien',$this->NgayNhanXeDuKien);
			$stmt->bindParam(':PTTT',$this->PTTT);
			$stmt->bindParam(':TienCoc',$this->TienCoc);

			if($stmt->execute()){
				return true;
			}
			echo("loi roi m oi");
			return false;
			
		}
		public function update(){
			$query="UPDATE phieudat SET MaPD=:MaPD,MaKH=:MaKH,NgayDatXe=:NgayDatXe,TrangThai=:TrangThai,MaNV=:MaNV,TongTien=:TongTien,NgayNhanXeDuKien=:NgayNhanXeDuKien,PTTT=:PTTT,TienCoc=:TienCoc WHERE MaPD=:MaPD";
			$stmt= $this->conn->prepare($query);
			
			$this->MaPD=htmlspecialchars(strip_tags($this->MaPD));
			$this->MaKH=htmlspecialchars(strip_tags($this->MaKH));
			$this->NgayDatXe=htmlspecialchars(strip_tags($this->NgayDatXe));
			$this->TrangThai=htmlspecialchars(strip_tags($this->TrangThai));
			$this->MaNV=htmlspecialchars(strip_tags($this->MaNV));
			$this->TongTien=htmlspecialchars(strip_tags($this->TongTien));
			$this->NgayNhanXeDuKien=htmlspecialchars(strip_tags($this->NgayNhanXeDuKien));
			$this->PTTT=htmlspecialchars(strip_tags($this->PTTT));
			$this->TienCoc=htmlspecialchars(strip_tags($this->TienCoc));

			$stmt->bindParam(':MaPD',$this->MaPD);
			$stmt->bindParam(':MaKH',$this->MaKH);
			$stmt->bindParam(':NgayDatXe',$this->NgayDatXe);
			$stmt->bindParam(':TrangThai',$this->TrangThai);
			$stmt->bindParam(':MaNV',$this->MaNV);
			$stmt->bindParam(':TongTien',$this->TongTien);
			$stmt->bindParam(':NgayNhanXeDuKien',$this->NgayNhanXeDuKien);
			$stmt->bindParam(':PTTT',$this->PTTT);
			$stmt->bindParam(':TienCoc',$this->TienCoc);

			if($stmt->execute()){
				return true;
			}
			return false;
		}
		public function delete(){
			$query="DELETE FROM phieudat WHERE MaPD=:MaPD";
			$stmt= $this->conn->prepare($query);
			
			$this->MaPD=htmlspecialchars(strip_tags($this->MaPD));

			$stmt->bindParam(':MaPD',$this->MaPD);

			if($stmt->execute()){
				return true;
			}
			return false;
		}
	}
 ?>