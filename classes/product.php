<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
/**
 * 
 */
class product
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	// Tìm theo từ khóa
	public function search_product($tukhoa)
	{
		$tukhoa = $this->fm->validation($tukhoa);
		$query = "SELECT * FROM tbl_product WHERE productName LIKE '%$tukhoa%'"; // cú pháp ở bất kì vị trí nào có trong trang 
		$result = $this->db->select($query);
		return $result;
	}

	public function insert_product($data, $files)
	{
		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
		$category = mysqli_real_escape_string($this->db->link, $data['category']);
		$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
		$price = mysqli_real_escape_string($this->db->link, $data['price']);
		$type = mysqli_real_escape_string($this->db->link, $data['type']);


		//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		$uploaded_image = "uploads/" . $unique_image;

		if ($productName == "" || $brand == "" || $category == "" || $product_desc == "" || $price == "" || $type == "" || $file_name == "") {
			$alert = "<span class='error'>Không Được Để Trống</span>";
			return $alert;
		} else {
			move_uploaded_file($file_temp, $uploaded_image);
			$query = "INSERT INTO tbl_product(productName,brandId,catId,product_desc,price,type,image) VALUES('$productName','$brand','$category','$product_desc','$price','$type','$unique_image')";
			$result = $this->db->insert($query);
			if ($result) {
				$alert = "<span class='success'> Successfully</span>";
				return $alert;
			} else {
				$alert = "<span class='error'> Not Success</span>";
				return $alert;
			}
		}
	}
	public function insert_slider($data, $files)
	{
		$sliderName = mysqli_real_escape_string($this->db->link, $data['sliderName']);
		$type = mysqli_real_escape_string($this->db->link, $data['type']);

		//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
		$permited  = array('jpg', 'jpeg', 'png', 'gif');

		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		// $file_current = strtolower(current($div));
		$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		$uploaded_image = "uploads/" . $unique_image;


		if ($sliderName == "" || $type == "") {
			$alert = "<span class='error'>Không được để trống</span>";
			return $alert;
		} else {
			if (!empty($file_name)) {
				//Nếu người dùng chọn ảnh
				if ($file_size > 2048000) {

					$alert = "<span class='success'>Ảnh không được quá 2MB!</span>";
					return $alert;
				} elseif (in_array($file_ext, $permited) === false) {
					// echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
					$alert = "<span class='success'>You can upload only:-" . implode(', ', $permited) . "</span>";
					return $alert;
				}
				move_uploaded_file($file_temp, $uploaded_image);
				$query = "INSERT INTO tbl_slider(sliderName,type,slider_image) VALUES('$sliderName','$type','$unique_image')";
				$result = $this->db->insert($query);
				if ($result) {
					$alert = "<span class='success'> Successfully</span>";
					return $alert;
				} else {
					$alert = "<span class='error'> Not Success</span>";
					return $alert;
				}
			}
		}
	}
	public function show_slider()
	{
		$query = "SELECT * FROM tbl_slider where type='1' order by sliderId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_slider_list()
	{
		$query = "SELECT * FROM tbl_slider order by sliderId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_product()
	{

		$query = "
			SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 

			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 

			INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId 

			order by tbl_product.productId desc";

		$result = $this->db->select($query);
		return $result;
	}

	public function update_type_slider($id, $type)
	{
		$type = mysqli_real_escape_string($this->db->link, $type);
		$query = "UPDATE tbl_slider SET type = '$type' where sliderId='$id'";
		$result = $this->db->update($query);
		return $result;
	}
	public function del_slider($id)
	{
		$query = "DELETE FROM tbl_slider where sliderId = '$id'";
		$result = $this->db->delete($query);
		if ($result) {
			$alert = "<span class='success'> Deleted Successfully</span>";
			return $alert;
		} else {
			$alert = "<span class='error'> Not Success</span>";
			return $alert;
		}
	}
	public function update_product($data, $files, $id)
	{
		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
		$category = mysqli_real_escape_string($this->db->link, $data['category']);
		$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
		$price = mysqli_real_escape_string($this->db->link, $data['price']);
		$type = mysqli_real_escape_string($this->db->link, $data['type']);


		//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		// $file_current = strtolower(current($div));
		$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		$uploaded_image = "uploads/" . $unique_image;


		if ($productName == "" || $brand == "" || $category == "" || $product_desc == "" || $price == "" || $type == "") {
			$alert = "<span class='error'>Không Được Để Trống</span>";
			return $alert;
		} else {
			if (!empty($file_name)) {
				//Nếu người dùng chọn ảnh
				if ($file_size > 204800) {

					$alert = "<span class='success'>Image Size should be less then 2MB!</span>";
					return $alert;
				} elseif (in_array($file_ext, $permited) === false) {
					// echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
					$alert = "<span class='success'>You can upload only:-" . implode(', ', $permited) . "</span>";
					return $alert;
				}
				move_uploaded_file($file_temp, $uploaded_image);
				$query = "UPDATE tbl_product SET
					productName = '$productName',
					brandId = '$brand',
					catId = '$category', 
					type = '$type', 
					price = '$price', 
					image = '$unique_image',
					product_desc = '$product_desc'
					WHERE productId = '$id'";
			} else {
				//Nếu người dùng không chọn ảnh
				$query = "UPDATE tbl_product SET

					productName = '$productName',
					brandId = '$brand',
					catId = '$category', 
					type = '$type', 
					price = '$price', 
					
					product_desc = '$product_desc'

					WHERE productId = '$id'";
			}
			$result = $this->db->update($query);
			if ($result) {
				$alert = "<span class='success'> Successfully</span>";
				return $alert;
			} else {
				$alert = "<span class='error'> Not Success</span>";
				return $alert;
			}
		}
	}
	public function del_product($id)
	{
		$query = "DELETE FROM tbl_product where productId = '$id'";
		$result = $this->db->delete($query);
		if ($result) {
			$alert = "<span class='success'> Successfully</span>";
			return $alert;
		} else {
			$alert = "<span class='error'> Not Success</span>";
			return $alert;
		}
	}
	public function del_wlist($proid, $customer_id)
	{
		$query = "DELETE FROM tbl_wishlist where productId = '$proid' AND customer_id='$customer_id'";
		$result = $this->db->delete($query);
		return $result;
	}
	public function getproductbyId($id)
	{
		$query = "SELECT * FROM tbl_product where productId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	// danh sách phim
	public function getproduct_feathered()
	{
		// feathered = 0 -- nonfeathered = 1 
		$query = "SELECT * FROM tbl_product where type = '0' order by productId desc LIMIT 4 ";
		$result = $this->db->select($query);
		return $result;
	}
	// danh sách phim mới
	public function getproduct_new()
	{
		$sp_tungtrang = 4;

		if (!isset($_GET['trang'])) {
			$trang = 1;
		} else {
			$trang = $_GET['trang'];
		}
		$tung_trang = ($trang - 1) * $sp_tungtrang;
		$query = "SELECT * FROM tbl_product order by productId desc LIMIT $tung_trang,$sp_tungtrang ";
		$result = $this->db->select($query);
		return $result;
	}
	public function getallproduct()
	{
		$query = "SELECT * FROM tbl_product ";
		$result = $this->db->select($query);
		return $result;
	}

	public function getAllDCEU()
	{
		$query = "SELECT * FROM tbl_product WHERE brandId = '2' order by productId desc LIMIT 4";
		$result = $this->db->select($query);
		return $result;
	}
	public function getAllFox()
	{
		$query = "SELECT * FROM tbl_product WHERE brandId = '3' order by productId desc LIMIT 4";
		$result = $this->db->select($query);
		return $result;
	}
	public function getAllWannerBros()
	{
		$query = "SELECT * FROM tbl_product WHERE brandId = '6' order by productId desc LIMIT 4";
		$result = $this->db->select($query);
		return $result;
	}

	// lấy sản phẩm từ database --> trang chi tiết(Detail) 
	public function get_details($id)
	{
		$query = "

			SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 

			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 

			INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId WHERE tbl_product.productId = '$id'

			";

		$result = $this->db->select($query);
		return $result;
	}
	public function getFirstPixar()
	{
		$query = "SELECT * FROM tbl_product WHERE brandId = '1' order by productId desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function getFirstDCEU()
	{
		$query = "SELECT * FROM tbl_product WHERE brandId = '2' order by productId desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function getFirstFox()
	{
		$query = "SELECT * FROM tbl_product WHERE brandId = '3' order by productId desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}

	public function getFirstUniversal()
	{
		$query = "SELECT * FROM tbl_product WHERE brandId = '5' order by productId desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function getFirstWB()
	{
		$query = "SELECT * FROM tbl_product WHERE brandId = '6' order by productId desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function getFirstColombiaPicture()
	{
		$query = "SELECT * FROM tbl_product WHERE brandId = '7' order by productId desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function getWaltDisney()
	{
		$query = "SELECT * FROM tbl_product WHERE brandId = '8' order by productId desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function getFirstPhuongNam()
	{
		$query = "SELECT * FROM tbl_product WHERE brandId = '9' order by productId desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
}
?>