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


if (!$connect) {
    
    die ("Cannot connect to $server using $user");
} else {
    $sql = "SELECT * from $catagories_table_name";
    $sqlCmd = "INSERT INTO $table_name VALUES ('0','{$tittle}','{$desc}');";;
   
    mysqli_select_db($connect,$mydb);
   // if (mysqli_query($connect, $sql)) {
    //    $result = mysqli_query($connect, $sql);
        
     //    Return the number of rows in result set
      //  $rowcount = mysqli_num_rows( $result );
    
        
    //}
   
   // $SQLcmd = "INSERT INTO $table_name (ProductID, Product_desc, Cost, Weight, Numb) VALUES ('0','{$desc}','{$cost}','{$weight}','{$num}');";
    
    
    
    
    if (!mysqli_query($connect,$sql)){
        print "hello";
        die ("Table Create Creation Failed SQLcmd=$SQLcmd");
       
        
    } else {
        $result = mysqli_query($connect, $sql);
        print "<br>SQLcmd=$sql";
        
        
        
    }
   
    mysqli_close($connect);
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