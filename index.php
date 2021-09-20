<?php include 'Functions.php';
session_start();
$connect= new Functions();
$connection=$connect-> getConection();
$sql="select * from bank";
$dataconnect=$connect->select($connection,$sql);
$noofrows=$connect->noofRows($dataconnect);
$value=$_POST['viewcustomers'];
$check=$connect->postof($value);
$detailvalue=$_POST['id'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Banking</title>
</head>
<body class='background'>
<nav>
   
<div class='navbar'>
<div class='logo'>
<h3><span class="m">S</span><span class="e">p</span><span class="g">a</span><span class="a">r</span><span class='g'>k</span><span class="m">s&nbsp</span><span class="e">b</span><span class="g">a</span><span class="a">n</span><span class="g">k</span>
    </h3>    </div>
<ul>

          <li><a href="index.php">HOME</a></li>
          <li><a href="transfer.php">TRANSFER</a></li>
          <li><a href="history.php">HISTORY</a></li>

        </ul>
</div>
</nav>
<div class='view'>
<form method='POST' action="<?php htmlspecialchars($_SERVER[" PHP_SELF"]) ?>">
<button name='viewcustomers' class='btn'>VIEW CUSTOMERS</button>
<div class='customers '>

<?php 
if($check !=0){
 if($noofrows > 0){?>
 <div class='cancel visionoff'>
    <img src="cancel-button.png" alt="cancel">
</div>
<table><tr><th>name</th><th>account balance</th><th>email</th><th>account no</th></tr>
<?php while($data=$connect->fetchData($dataconnect)){?>
<tr><td class='upper'><?php echo $data['name'] ?></td><td class='upper'><?php echo $data['current_bal'] ?></td><td> <?php echo $data['email'] ?> </td><td class='upper'><?php echo $data['phone'] ?> </td></tr>
<?php }?>
</table>
 <?php }}?></div>
 </form>
</div>
 


    <script src='script/cancel.js'></script>
</body>

</html>