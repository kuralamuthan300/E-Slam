<?php

require("connection.php");

$formdata = array($_POST["hint"], $_POST["ques1"], $_POST["ques2"], $_POST["ques3"], $_POST["ques4"], $_POST["ques5"], $_POST["ques6"], $_POST["ques7"], $_POST["ques8"], $_POST["ques9"], $_POST["ques10"], $_POST["ques11"], $_POST["ques12"], $_POST["ques13"], $_POST["ques14"],trim($_POST["phone"]));
$sql = "INSERT INTO `response` (`solved`, `hint`, `ques1`, `ques2`, `ques3`, `ques4`, `ques5`, `ques6`, `ques7`, `ques8`, `ques9`, `ques10`, `ques11`, `ques12`, `ques13`, `ques14`, `phone`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
//INSERT INTO `response` (`solved`, `hint`, `ques1`, `ques2`, `ques3`, `ques4`, `ques5`, `ques6`, `ques7`, `ques8`, `ques9`, `ques10`, `ques11`, `ques12`, `ques13`, `ques14`, `photo`, `phone`) VALUES ('0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
if(check(trim($_POST["phone"]))){
    $stmt = $conn->prepare($sql);
    $val = 0;
    $stmt->bind_param("issssssssssssssss", $val, $formdata[0], $formdata[1], $formdata[2], $formdata[3], $formdata[4], $formdata[5], $formdata[6], $formdata[7], $formdata[8], $formdata[9], $formdata[10], $formdata[11], $formdata[12], $formdata[13], $formdata[14], $formdata[15]);
    if ($stmt->execute()) {
        echo("<center><h1 style=\"color:green;font-weight:bolder;\">Your response saved successfully !<br><br></h1><br><br><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ7UZV-tbaFPjmJLW_Cy9kGC0HmBE86xg0r2vI6YamM7ueIFx6E&usqp=CAU\" width=\"260px\" height=\"190px\" /><br>
        </center>");
        echo("<br><br><br><center><h1 style=\"color:green;font-weight:bolder;\"><a href=\"./image.html\">Click here to upload photo of me and You</a><br><br></h1></center>");
    } else  echo ("<center><h1 style=\"color:red;font-weight:bolder;\">Error Occoured ! Go back and try again .<br><br></h1></center>");
    
    
    $stmt->close();
    $conn->close();
}else{
    echo ("<center><h1 style=\"color:red;font-weight:bolder;\">Your response already exists !<br><br></h1></center>");
}


?>



<?php
function check($phone)
{
    require("connection.php");
    $sql = "SELECT * FROM response WHERE phone=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    if($result->num_rows == 0){
        return 1;
    }else return 0;
}

?>