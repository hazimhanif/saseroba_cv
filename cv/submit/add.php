<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$hostname = "172.17.0.1";
$username = "pub";
$password = "Pub123";
$db = "saseroba_main";

$dbconnect=mysqli_connect($hostname,$username,$password,$db);

if ($dbconnect->connect_error) {
  die("Database connection failed: " . $dbconnect->connect_error);
}

if(isset($_POST['submit'])) {

  $FirstName=$_POST['element_1_1'];
  $LastName=$_POST['element_1_2'];
  $DisplayName=$_POST['element_00'];
  $Batch=$_POST['element_91'];
  $CurrentJob=$_POST['element_0'];
  $Location=$_POST['element_2'];
  $Address1=$_POST['element_3_1'];
  $Address2=$_POST['element_3_2'];
  $City=$_POST['element_3_3'];
  $State=$_POST['element_3_4'];
  $ZipCode=$_POST['element_3_5'];
  $Country=$_POST['element_3_6'];
  $Email=$_POST['element_4'];
  $Phone=$_POST['element_5'];
  $Web=$_POST['element_6'];
  $Twitter=$_POST['element_7'];
  $LinkedIn=$_POST['element_8'];
  $AboutMe=$_POST['element_9'];
  $Cert1=$_POST['element_10'];
  $Inst1=$_POST['element_11'];
  $CertYear1=$_POST['element_17'];
  $Cert2=$_POST['element_13'];
  $Inst2=$_POST['element_14'];
  $CertYear2=$_POST['element_18'];
  $Cert3=$_POST['element_15'];
  $Inst3=$_POST['element_16'];
  $CertYear3=$_POST['element_19'];
  $Pos1=$_POST['element_71'];
  $Org1=$_POST['element_21'];
  $Desc1=$_POST['element_22'];
  $Year1=$_POST['element_23'];
  $Pos2=$_POST['element_72'];
  $Org2=$_POST['element_24'];
  $Desc2=$_POST['element_25'];
  $Year2=$_POST['element_26'];
  $Pos3=$_POST['element_73'];
  $Org3=$_POST['element_27'];
  $Desc3=$_POST['element_28'];
  $Year3=$_POST['element_29'];
  $Project1=$_POST['element_31'];
  $DescProj1=$_POST['element_32'];
  $Project2=$_POST['element_33'];
  $DescProj2=$_POST['element_34'];
  $Project3=$_POST['element_35'];
  $DescProj3=$_POST['element_36'];
  $Skills1=$_POST['element_38'];
  $SkillProf1=$_POST['element_47'];
  $Skills2=$_POST['element_39'];
  $SkillProf2=$_POST['element_48'];
  $Skills3=$_POST['element_40'];
  $SkillProf3=$_POST['element_49'];
  $Skills4=$_POST['element_41'];
  $SkillProf4=$_POST['element_50'];
  $Skills5=$_POST['element_42'];
  $SkillProf5=$_POST['element_51'];
  $Interests=strtolower($_POST['element_44']);
  $Tags=strtolower($_POST['element_46']);
  $Interests_view=strtolower($_POST['element_44']);
  $Tags_view=strtolower($_POST['element_46']);
  $Colour=$_POST['element_92'];


  $Interests=str_replace(array(' , ',' ,',', ',','), ' ', $Interests);
  $Tags=str_replace(array(' , ',' ,',', ',','), ' ', $Tags);

  $query = "INSERT INTO Details (FirstName, LastName, DisplayName, Batch, CurrentJob, Location, Address1, Address2, City, State, ZipCode, Country, Email, Phone, Web, Twitter, LinkedIn, AboutMe, Cert1, Inst1, CertYear1, Cert2, Inst2, CertYear2, Cert3, Inst3, CertYear3, Pos1, Org1, Desc1, Year1, Pos2, Org2, Desc2, Year2, Pos3, Org3, Desc3, Year3, Project1, DescProj1, Project2, DescProj2, Project3, DescProj3, Skills1, SkillProf1, Skills2, SkillProf2, Skills3, SkillProf3, Skills4, SkillProf4, Skills5, SkillProf5, Interests, Tags, Interests_view, Tags_view, Colour) VALUES ('$FirstName','$LastName','$DisplayName',$Batch,'$CurrentJob','$Location','$Address1','$Address2','$City','$State','$ZipCode','$Country','$Email','$Phone','$Web','$Twitter','$LinkedIn','$AboutMe','$Cert1','$Inst1','$CertYear1','$Cert2','$Inst2','$CertYear2','$Cert3','$Inst3','$CertYear3','$Pos1','$Org1','$Desc1','$Year1','$Pos2','$Org2','$Desc2','$Year2','$Pos3','$Org3','$Desc3','$Year3','$Project1','$DescProj1','$Project2','$DescProj2','$Project3','$DescProj3','$Skills1',$SkillProf1,'$Skills2',$SkillProf2,'$Skills3',$SkillProf3,'$Skills4',$SkillProf4,'$Skills5',$SkillProf5,'$Interests','$Tags','$Interests_view','$Tags_view',$Colour)";

  if (!mysqli_query($dbconnect, $query)) {
      die('An error occurred. Your info has not been submitted.');
  } else {
    echo "Thanks for your submission.";
  }

}


$sql2 = "SELECT UserID FROM Details WHERE FirstName='$FirstName' AND LastName='$LastName'";
$result = mysqli_query($dbconnect, $sql2);
$temp = explode(".", $_FILES["fileToUpload"]["name"]);

while($row = $result->fetch_assoc()){
  $followingdata = $row["UserID"];
}
$newfilename = 'user_' . $followingdata . '.' . end($temp);

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $newfilename)) {

  $sql3 = "UPDATE Details SET ImgType='$imageFileType'  WHERE UserID=$followingdata";
  mysqli_query($dbconnect, $sql3);
  echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="0;URL=https://project.hazimio.com/saseroba" />
<title>Redirect to... title of new-page</title>
</head>
<body>
<h1>Re-directing...</h1>
<p>You are being re-directed, if nothing happens, please <a href="https://project.hazimio.com/saseroba">follow this link</a></p>
</body>
</html> 