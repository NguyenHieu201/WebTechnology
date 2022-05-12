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
$mydb = 'CNWebDatabase';
$table_name = 'Products';
$connect = mysqli_connect($server, $user, $pass);

if (!$connect) {
    
    die ("Cannot connect to $server using $user");
} else {
    $sql = "SELECT * from $table_name";
    $sql2 = "SELECT DISTINCT Product_desc from $table_name";
   
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
        print "SELECT PRODUCT WE'VE JUST SOLD:  ";
        
        $result = mysqli_query($connect, $sql);
        $result2 = mysqli_query($connect,$sql2);
        
        
        print "<br>SQLcmd=$sql";
        
        
        
        
    }
   
    mysqli_close($connect);
}
}catch(Exception $ex){
   
    
}
?>
<form action="sale.php" method="get">
<?php
while($data1=mysqli_fetch_assoc($result2) ){
    print $data1["Product_desc"];
    ?>
<input type="radio" value=<?php print $data1["Product_desc"]?>  name="datadesc">


<?php
}
?>
<input type="submit">
</form>

<table border ="1" cellspacing="0" cellpadding="10">
        
        <tr>
        <th>ProductId</th>
        <th>Product desc</th>
        <th>const</th>
        <th>number available</th>
        <th>Weight</th>
        </tr>
        <?php
        
        if (mysqli_num_rows($result) > 0) {
            $sn=1;
            while($data = mysqli_fetch_assoc($result)) {
                ?>
 <tr>
   
   <td><?php echo $data['ProductID']; ?> </td>
   <td><?php echo $data['Product_desc']; ?> </td>
   <td><?php echo $data['Cost']; ?> </td>
   <td><?php echo $data['Numb']; ?> </td>
   <td><?php echo $data['Weight']; ?> </td>

 <tr>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>
 <?php } 
 ?>
 </table>
</body>
</html> 