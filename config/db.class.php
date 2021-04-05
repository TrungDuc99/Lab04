<?php 
class Db
{
	//Biến kết nối CSDL
	protected static $connection;

	//Hàm khởi tạo kết nối
	public function connect(){
		$connection = mysqli_connect("localhost","root","","ecommerce");
		mysqli_set_charset($connection,'utf8');
		// Check connection
		if (mysqli_connect_errno()){
			echo "Kết nối CSDL thất bại: " . mysqli_connect_error();
		}

		return $connection;
	}
	
	//Hàm thực hiện xử lý câu lệnh truy vấn
	public function query_execute($queryString){
		//Khởi tạo kết nối
		$connection = $this -> connect();
		//Thực hiện execute truy vấn, query là hàm của thư viện mysqli
		$result = $connection -> query($queryString);
		// $connection -> close();
		return $result;
	}

	//Hàm thực hiện trả về một mảng danh sách kết quả
	public function select_to_array($queryString){
		$rows = array();
		$result = $this -> query_execute($queryString);
		if($result==false) return false;
		// vòng lập while dùng để xuất mảng dữ liệu ra từng phần tử
		while($item = $result -> fetch_assoc()){
			$rows[] = $item;
		}
		return $rows;
	}
}
?>