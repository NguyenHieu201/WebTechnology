<html>
<head>
<title>Query</title>
</head>
<body>
<?php 

try{
    
 
$server = 'localhost';
$user = 'root';
$pass = 'ntk14121412';
$mydb = 'bussiness_service';
$table_name = 'business';
$catagories_table_name = "catagories";
$connect = mysqli_connect($server, $user, $pass);
$bizname = $_GET["bizname"];
$bizadd = $_GET["bizadd"];
$bizcity = $_GET["bizcity"];
$biztel = $_GET["biztel"];
$bizurl = $_GET["bizurl"];
$catagories = $_GET["catagories"];
$cat_biztable="biz_catagories";

if (!$connect) {
    
    die ("Cannot connect to $server using $user");
} else {
    mysqli_select_db($connect,$mydb);
    $sql = "SELECT * from $catagories_table_name";
    $sqlCmd = "INSERT INTO $table_name VALUES ('0','{$bizname}','{$bizadd}','{$bizcity}','{$biztel}','{$bizurl}')";
    $sqlsearchcat = "SELECT * from $catagories_table_name WHERE (Tittle='$catagories')";
    $resultlog = mysqli_query($connect,$sqlsearchcat);
   
    $row = mysqli_fetch_array($resultlog);
   $catid = $row["CatagoriesID"];
   print $catid;
    
    
   // if (mysqli_query($connect, $sql)) {
    //    $result = mysqli_query($connect, $sql);
        
     //    Return the number of rows in result set
      //  $rowcount = mysqli_num_rows( $result );
    
        
    //}
   
   mysqli_query($connect, $sqlCmd);
   // $SQLcmd = "INSERT INTO $table_name (ProductID, Product_desc, Cost, Weight, Numb) VALUES ('0','{$desc}','{$cost}','{$weight}','{$num}');";
   $sqlquerybussiness = "SELECT * from $table_name WHERE (Namel='$bizname')";
    $businessres = mysqli_query($connect, $sqlquerybussiness);
    $row2 = mysqli_fetch_array($businessres);
    $bussid = $row2["BusinessID"];
    print $bussid;
   $addbiz_cat = "INSERT INTO $cat_biztable VALUES ('0','$bussid','$catid')";
   
   mysqli_query($connect, $addbiz_cat);
   
    
    
    if (!mysqli_query($connect,$sql)){
        print "hello";
        die ("Table Create Creation Failed SQLcmd=$SQLcmd");
       
        
    } else {
        $result = mysqli_query($connect, $sql);
        print "<br>SQLcmd=$sql";
        
        
        
    }
   
    //mysqli_close($connect);
}
}catch(Exception $ex){
   
    
}
?>
<form action="added_biz.php" method="get">
	<select name = "catagories" size="3">
        <?php
        if (mysqli_num_rows($result) > 0) {
            $sn=1;
            while($data = mysqli_fetch_assoc($result)) {
                ?>
                <option value=<?php print $data["Tittle"] ?>><?php print $data["Tittle"] ?></option>
 
 <?php
  $sn++;}} else { ?>
    
 <?php } ?>
 </select>
 <label>Bussiness name:</label><input name="bizname">
 <label>Address</label><input name="bizadd">
 <label>City</label><input name="bizcity">
 <label>Telephone</label><input name="biztel">
 <label>URL</label><input name="bizurl">
 <input type="submit" value="Add catagories">
 </form>
</body>
</html> 