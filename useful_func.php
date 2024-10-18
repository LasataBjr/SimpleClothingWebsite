<?php
 $con = mysqli_connect('localhost','root','','test') or die("Connection Error");
			//echo"Connection established<br/>";

class useful_func
{    
	public function test_function()//just to check
	{
		echo"Successful";
	}

	public function insertinto_db($tablename,$insert) // insert the input into table
	{
		global $con;
		$arr = array();//define the variable as array
		foreach($insert as $k => $v)
		{
			$arr["'".$v."'"] = $k;
		}

		/*inserts keys of array 'datavalues' as column names and its values into VALUES*/

		$insertquery = "INSERT INTO $tablename(".implode(',',array_keys($insert)).") VALUES(".implode(',',array_keys($arr)).
						")";
		if(mysqli_query($con, $insertquery))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function fetch_multiple_data($table)//to retreive table data from the database 
	{
		global $con;
		$outputarray = array();
		$select = "select * from  $table";
		$result = mysqli_query($con, $select);
		if(mysqli_num_rows($result)>0){
				while($data = mysqli_fetch_assoc($result))
		{
			array_push($outputarray, $data);
		}
		return $outputarray;
		}		
		else
		{
			echo "No record found";
		}
	}
	public function insertimg_db($target_dir,$form_imgname,$form_imgname_temp)
	{
		$temp = explode(".", $form_imgname);
		$ext = end($temp);//explode and takes
		$img_name = rand(0,68748377279282).rand(0,3000).".".$ext;
		
		$target_file = $target_dir.$img_name;
		
		if(file_exists($target_file))//Check if the file exist or not
		{
			echo "This file exist already";
		}
		else
		{
			if(move_uploaded_file($form_imgname_temp, $target_file))
			{
				return $img_name;
			}
			else
			{
				echo "Error occured uploading the file";
			}
		}
	}
	public function fetch_rowdata($table,$id_name,$id)//for editing the table  single row data
	{
		global $con;
		$select = "Select * from $table where $id_name = $id";
		$result = mysqli_query($con,$select);
		if( mysqli_num_rows($result)>0)
		{
			/*while($data = mysqli_fetch_assoc($result))
			{
				$Final[] = $data;
			}
			return $Final;*/
			$data = mysqli_fetch_assoc($result);
			return $data;

		}

		else
		{
			echo "No record found";
		}
	}
	public function update_row($table, $array, $col_name, $val)
	{		global $con;

		$arrtostring = "";
		$i = 0;
		$size = sizeof($array);
		foreach($array as $k=>$v)
		{
			if($i !=($size-1))
			{
				$arrtostring .= "$k = '$v', ";
			}
			else
			{
				$arrtostring .= "$k = '$v' ";
			}
			$i++;	
		}
		
		$update = "update $table set $arrtostring where $col_name = $val";
		
		if(mysqli_query($con,$update))
		{
			return true;
		}
		else 
		{
			return false;
		} 
	}
	public function delete($table,$col,$col_name)
	{
		global $con;
		$select = "Delete from $table where $col = $col_name";
		if(mysqli_query($con,$select)){
			return true;
		}else{ return false;}
		
	}
	public function image_check($img_path, $IMG)
	{
		
			if($_FILES[$IMG]['error'] == UPLOAD_ERR_OK)
				{
					
					$imgname = $_FILES[$IMG]['name'];
					$temp_imgname = $_FILES[$IMG]['tmp_name'];
					$upload_img = $this->insertimg_db($img_path,$imgname,$temp_imgname);
					return $upload_img;
				}
				else
				{
					return false;
					
				}
	}
	
	public function checklogin()
	{

		if(!isset($_SESSION['Username']))
		{
			header("Location:loginform.php");
			exit();
		}
	}
}
?>