<?php
	class SanPham{
		private $conn;


		public $MaSP;
		public $TenSP;
		public $GiaThue;
		public $GiaPhat;
		public $IMG;
		public $MoTa;
		public $TrangThai;
		public $SoXe;
		public $MaLoai;
		public $NgayTao;

		public function __construct($db){

			$this->conn=$db;
		}

		public function read(){
			
			$query="SELECT * FROM sanpham ";
			$stmt= $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}

		public function show(){
			$query="SELECT * FROM sanpham WHERE MaSP=?";
			$stmt= $this->conn->prepare($query);
			$stmt->bindParam(1, $this->MaSP);
			$stmt->execute();
			$row=$stmt->fetch(PDO::FETCH_ASSOC);

			$this->MaSP=$row['MaSP'];
			$this->TenSP=$row['TenSP'];
			$this->GiaThue=$row['GiaThue'];
			$this->GiaPhat=$row['GiaPhat'];
			$this->IMG=$row['IMG'];
			$this->MoTa=$row['MoTa'];
			$this->TrangThai=$row['TrangThai'];
			$this->SoXe=$row['SoXe'];
			$this->MaLoai=$row['MaLoai'];
			$this->NgayTao=$row['NgayTao'];

		}
		public function ktxeboncho(){
			$query="SELECT * FROM sanpham WHERE MaLoai=1";
			$stmt= $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}
		public function ktxedangthue(){
			$query="SELECT * FROM sanpham WHERE TrangThai=2";
			$stmt= $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}
		public function ktxedangsuco(){
			$query="SELECT * FROM sanpham WHERE TrangThai=3";
			$stmt= $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}
		public function ktxesaucho(){
			$query="SELECT * FROM sanpham WHERE MaLoai=2";
			$stmt= $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;

		}
		public function ktxemuoihaicho(){
			$query="SELECT * FROM sanpham WHERE MaLoai=3";
			$stmt= $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;

		}
		public function kiemtrasoxe(){
			$query="SELECT * FROM sanpham WHERE SoXe=? LIMIT 1";
			$stmt= $this->conn->prepare($query);
			$stmt->bindParam(1, $this->SoXe);
			
			$stmt->execute();
			$row=$stmt->fetch(PDO::FETCH_ASSOC);

			$this->MaSP=$row['MaSP'];
			$this->TenSP=$row['TenSP'];
			$this->GiaThue=$row['GiaThue'];
			$this->GiaPhat=$row['GiaPhat'];
			$this->IMG=$row['IMG'];
			$this->MoTa=$row['MoTa'];
			$this->TrangThai=$row['TrangThai'];
			$this->SoXe=$row['SoXe'];
			$this->MaLoai=$row['MaLoai'];
			$this->NgayTao=$row['NgayTao'];


		}
		public function kiemtratenxe(){
			$query="SELECT * FROM sanpham WHERE TenSP=? LIMIT 1";
			$stmt= $this->conn->prepare($query);
			$stmt->bindParam(1, $this->TenSP);
			
			$stmt->execute();
			$row=$stmt->fetch(PDO::FETCH_ASSOC);

			$this->MaSP=$row['MaSP'];
			$this->TenSP=$row['TenSP'];
			$this->GiaThue=$row['GiaThue'];
			$this->GiaPhat=$row['GiaPhat'];
			$this->IMG=$row['IMG'];
			$this->MoTa=$row['MoTa'];
			$this->TrangThai=$row['TrangThai'];
			$this->SoXe=$row['SoXe'];
			$this->MaLoai=$row['MaLoai'];
			$this->NgayTao=$row['NgayTao'];
		}
		public function create(){
			$query="INSERT INTO sanpham SET TenSP=:TenSP,GiaThue=:GiaThue,GiaPhat=:GiaPhat,IMG=:IMG,MoTa=:MoTa,TrangThai=:TrangThai,SoXe=:SoXe,MaLoai=:MaLoai,NgayTao=:NgayTao";
			$stmt= $this->conn->prepare($query);

			$this->TenSP=htmlspecialchars(strip_tags($this->TenSP));
			$this->GiaThue=htmlspecialchars(strip_tags($this->GiaThue));
			$this->GiaPhat=htmlspecialchars(strip_tags($this->GiaPhat));
			$this->IMG=htmlspecialchars(strip_tags($this->IMG));
			$this->MoTa=htmlspecialchars(strip_tags($this->MoTa));
			$this->TrangThai=htmlspecialchars(strip_tags($this->TrangThai));
			$this->SoXe=htmlspecialchars(strip_tags($this->SoXe));
			$this->MaLoai=htmlspecialchars(strip_tags($this->MaLoai));
			$this->NgayTao=htmlspecialchars(strip_tags($this->NgayTao));
			

			$stmt->bindParam(':TenSP',$this->TenSP);
			$stmt->bindParam(':GiaThue',$this->GiaThue);
			$stmt->bindParam(':GiaPhat',$this->GiaPhat);
			$stmt->bindParam(':IMG',$this->IMG);
			$stmt->bindParam(':MoTa',$this->MoTa);
			$stmt->bindParam(':TrangThai',$this->TrangThai);
			$stmt->bindParam(':SoXe',$this->SoXe);
			$stmt->bindParam(':MaLoai',$this->MaLoai);
			$stmt->bindParam(':NgayTao',$this->NgayTao);
			

			if($stmt->execute()){
				return true;
			}
			echo("loi roi m oi");
			return false;
			
		}

		public function update(){
			$query="UPDATE sanpham SET MaSP=:MaSP,TenSP=:TenSP,GiaThue=:GiaThue,GiaPhat=:GiaPhat,IMG=:IMG,MoTa=:MoTa,TrangThai=:TrangThai,SoXe=:SoXe,MaLoai=:MaLoai,NgayTao=:NgayTao WHERE MaSP=:MaSP";
			$stmt= $this->conn->prepare($query);
			
			$this->MaSP=htmlspecialchars(strip_tags($this->MaSP));
			$this->TenSP=htmlspecialchars(strip_tags($this->TenSP));
			$this->GiaThue=htmlspecialchars(strip_tags($this->GiaThue));
			$this->GiaPhat=htmlspecialchars(strip_tags($this->GiaPhat));
			$this->IMG=htmlspecialchars(strip_tags($this->IMG));
			$this->MoTa=htmlspecialchars(strip_tags($this->MoTa));
			$this->TrangThai=htmlspecialchars(strip_tags($this->TrangThai));
			$this->SoXe=htmlspecialchars(strip_tags($this->SoXe));
			$this->MaLoai=htmlspecialchars(strip_tags($this->MaLoai));
			$this->NgayTao=htmlspecialchars(strip_tags($this->NgayTao));

			$stmt->bindParam(':MaSP',$this->MaSP);
			$stmt->bindParam(':TenSP',$this->TenSP);
			$stmt->bindParam(':GiaThue',$this->GiaThue);
			$stmt->bindParam(':GiaPhat',$this->GiaPhat);
			$stmt->bindParam(':IMG',$this->IMG);
			$stmt->bindParam(':MoTa',$this->MoTa);
			$stmt->bindParam(':TrangThai',$this->TrangThai);
			$stmt->bindParam(':SoXe',$this->SoXe);
			$stmt->bindParam(':MaLoai',$this->MaLoai);
			$stmt->bindParam(':NgayTao',$this->NgayTao);

			if($stmt->execute()){
				return true;
			}
			return false;
		}
		public function delete(){
			$query="DELETE FROM sanpham WHERE MaSP=:MaSP";
			$stmt= $this->conn->prepare($query);
			
			$this->MaSP=htmlspecialchars(strip_tags($this->MaSP));

			$stmt->bindParam(':MaSP',$this->MaSP);

			if($stmt->execute()){
				return true;
			}
			return false;
		}
	}
 ?>