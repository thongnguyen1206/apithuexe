<?php
	class GioHang{
		private $conn;


		public $MaKH;
		public $MaSP;
		
		public function __construct($db){

			$this->conn=$db;
		}

		public function read(){
			
			$query="SELECT * FROM taikhoan GROUP BY MaTK DESC";
			$stmt= $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}

		public function show(){
			$query="SELECT * FROM taikhoan WHERE MaTK=? LIMIT 1";
			$stmt= $this->conn->prepare($query);
			$stmt->bindParam(1, $this->MaTK);
			$stmt->execute();
			$row=$stmt->fetch(PDO::FETCH_ASSOC);

			$this->MaTK=$row['MaTK'];
			$this->USERNAME=$row['USERNAME'];
			$this->PASSWORD=$row['PASSWORD'];
			$this->MaQuyen=$row['MaQuyen'];

		}
		public function create(){
			$query="INSERT INTO taikhoan SET USERNAME=:USERNAME,PASSWORD=:PASSWORD,MaQuyen=:MaQuyen";
			$stmt= $this->conn->prepare($query);

			$this->USERNAME=htmlspecialchars(strip_tags($this->USERNAME));
			$this->PASSWORD=htmlspecialchars(strip_tags($this->PASSWORD));
			$this->MaQuyen=htmlspecialchars(strip_tags($this->MaQuyen));

			$stmt->bindParam(':USERNAME',$this->USERNAME);
			$stmt->bindParam(':PASSWORD',$this->PASSWORD);
			$stmt->bindParam(':MaQuyen',$this->MaQuyen);

			if($stmt->execute()){
				return true;
			}
			echo("loi roi m oi");
			return false;
			
		}

		public function update(){
			$query="UPDATE taikhoan SET MaTK=:MaTK,USERNAME=:USERNAME,PASSWORD=:PASSWORD,MaQuyen=:MaQuyen WHERE MaTK=:MaTK";
			$stmt= $this->conn->prepare($query);
			
			$this->MaTK=htmlspecialchars(strip_tags($this->MaTK));
			$this->USERNAME=htmlspecialchars(strip_tags($this->USERNAME));
			$this->PASSWORD=htmlspecialchars(strip_tags($this->PASSWORD));
			$this->MaQuyen=htmlspecialchars(strip_tags($this->MaQuyen));

			$stmt->bindParam(':MaTK',$this->MaTK);
			$stmt->bindParam(':USERNAME',$this->USERNAME);
			$stmt->bindParam(':PASSWORD',$this->PASSWORD);
			$stmt->bindParam(':MaQuyen',$this->MaQuyen);

			if($stmt->execute()){
				return true;
			}
			return false;
		}
		public function delete(){
			$query="DELETE FROM taikhoan WHERE MaTK=:MaTK";
			$stmt= $this->conn->prepare($query);
			
			$this->MaTK=htmlspecialchars(strip_tags($this->MaTK));

			$stmt->bindParam(':MaTK',$this->MaTK);

			if($stmt->execute()){
				return true;
			}
			return false;
		}
	}
 ?>