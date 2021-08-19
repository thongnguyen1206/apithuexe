<?php
	class LoaiSP{
		private $conn;


		public $MaLoai;
		public $TenLoai;
		
		
		public function __construct($db){

			$this->conn=$db;
		}

		public function read(){
			
			$query="SELECT * FROM loaisp GROUP BY MaLoai DESC";
			$stmt= $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}

		public function show(){
			$query="SELECT * FROM loaisp WHERE MaLoai=? LIMIT 1";
			$stmt= $this->conn->prepare($query);
			$stmt->bindParam(1, $this->MaLoai);
			$stmt->execute();
			$row=$stmt->fetch(PDO::FETCH_ASSOC);

			$this->MaLoai=$row['MaLoai'];
			$this->TenLoai=$row['TenLoai'];
			

		}
		public function create(){
			$query="INSERT INTO loaisp SET TenLoai=:TenLoai";
			$stmt= $this->conn->prepare($query);

			$this->TenLoai=htmlspecialchars(strip_tags($this->TenLoai));
			
			$stmt->bindParam(':MaKH',$this->TenLoai);
			
			if($stmt->execute()){
				return true;
			}
			echo("loi roi m oi");
			return false;
			
		}
		public function update(){
			$query="UPDATE loaisp SET MaLoai=:MaLoai,TenLoai=:TenLoai WHERE MaLoai=:MaLoai";
			$stmt= $this->conn->prepare($query);
			
			$this->MaLoai=htmlspecialchars(strip_tags($this->MaLoai));
			$this->TenLoai=htmlspecialchars(strip_tags($this->TenLoai));
			
			

			$stmt->bindParam(':MaKH',$this->MaLoai);
			$stmt->bindParam(':MaSP',$this->TenLoai);
			

			if($stmt->execute()){
				return true;
			}
			return false;
		}
		public function delete(){
			$query="DELETE FROM loaisp WHERE MaLoai=:MaLoai";
			$stmt= $this->conn->prepare($query);
			
			$this->MaLoai=htmlspecialchars(strip_tags($this->MaLoai));


			$stmt->bindParam(':MaPD',$this->MaLoai);
	

			if($stmt->execute()){
				return true;
			}
			return false;
		}
	}
 ?>