<?php
require("connection.php");
$formdata = array($_POST["hint"],$_POST["ques1"],$_POST["ques2"],$_POST["ques3"],$_POST["ques4"],$_POST["ques5"],$_POST["ques6"],$_POST["ques7"],$_POST["ques8"],$_POST["ques9"],$_POST["ques10"],$_POST["ques11"],$_POST["ques12"],$_POST["ques13"],$_POST["ques14"],$_POST["phone"]);

/*foreach ($formdata as $value) {
    echo "$value <br>";
  }
*/

/*

    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 2097152) {
       $errors[]='File size must be excately 2 MB';
    }
    
    if(empty($errors)==true) {
       move_uploaded_file($file_tmp,"images/".$file_name);
       echo "Success";
    }else{
       print_r($errors);
    }

*/

$sql = "INSERT INTO `response` (`solved`, `hint`, `ques1`, `ques2`, `ques3`, `ques4`, `ques5`, `ques6`, `ques7`, `ques8`, `ques9`, `ques10`, `ques11`, `ques12`, `ques13`, `ques14`, `photo`, `phone`) VALUES ('0',";
  //INSERT INTO `response` (`solved`, `hint`, `ques1`, `ques2`, `ques3`, `ques4`, `ques5`, `ques6`, `ques7`, `ques8`, `ques9`, `ques10`, `ques11`, `ques12`, `ques13`, `ques14`, `photo`, `phone`) VALUES ('0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
  for ($x = 0; $x < count($formdata); $x++) {
    $sql = $sql."'".$formdata[$x]."',";
    if($x == count($formdata)-1)
    {
        $sql = substr($sql,0,strlen($sql)-1);
        $sql = $sql.")";
    }
}

echo $sql;

?>