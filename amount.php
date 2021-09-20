<?php
include 'Functions.php';
session_start();

$connecti=new Functions();
$timeoftrans=$connecti->timee();
$connection=$connecti-> getConection();
$sql="select * from bank";
$dataconnect=$connecti->select($connection,$sql);
$amount=$_POST['amount-enter'];
$amountcheck=$connecti->postof($amount);
$senderaccno=$_SESSION["sender"];
$recieveraccno=$_POST["accounts"];
$transide=rand();
$amounttransfer=$connecti->transaction($senderaccno,$recieveraccno,$amount);
$sendername="select * from bank where phone='$senderaccno'";
$sendernameconnect=$connecti->select($connection,$sendername);
$sendernamedetail=$connecti->fetchData($sendernameconnect);
$sendernamea=$sendernamedetail['name'];
$recievernamee="select * from bank where phone='$recieveraccno'";
$recnameconnect=$connecti->select($connection,$recievernamee);
$recnamedetail=$connecti->fetchData($recnameconnect);
$recname=$recnamedetail['name'];
$finalres=$connecti->timeupdate($amountcheck,$senderaccno,$recieveraccno,$amount,$transide,$amounttransfer,$sendernamea,$recname);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Amount</title>
</head>

<body class='amount-body'>
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
<div class='amnt-trans'>
<div class='box'>
<form method="post" action="<?php htmlspecialchars($_SERVER[" PHP_SELF"]) ?>">
<label for="accounts" class="custom-select">TRANSFER TO:</label>
<select id="accounts" name="accounts"> 
    <?php while($recieverselect=$connecti->fetchData($dataconnect)){?>
        <?php if ($recieverselect['phone'] != $_SESSION["sender"]) {?>
            <?php $recievername=$recieverselect['name'];?>
     
     <option value="<?php echo $recieverselect['phone']?>"><?php echo $recieverselect['phone'] ?> - <?php echo $recieverselect['name'] ?></option>
     <?php }}?>
    
</select>
</div>

<div class='pre-amnt-summit'>
    <div class='amnt-summit'>

<label for="amount-enter">AMOUNT:</label>
<input type="number" name="amount-enter" id="amount-enter" required="required">
<input  type =submit value='SUBMIT' class='btns btsn' name='final-trans' >
</div>
</div>
 </div>
 </form>
 <form method="post" action="<?php htmlspecialchars($_SERVER[" PHP_SELF"]) ?>">
 <?php if($amounttransfer!=0){?>
    <?php if(isset($amountcheck)){ ?>
   
<div class='transfersuccessfull'>
<button type='submit' class='cancel-amount'>
    <img src="cancel-button.png" alt="cancel">
 </button>
 <img src="successfull.png">
 <h2>Transaction Successfull</h2>
 <p>The amount of <?php echo $amount ?> is transferred from the account <?php echo $senderaccno ?> named <?php echo $sendernamea ?> to <?php echo $recieveraccno ?> named <?php echo $recname ?> and the transaction id is <?php echo $transide ?><div class=timehead><p name='time'> <?php echo($timeoftrans); ?></p></div>
 </div>

<?php }} 
 else{ ?>
    <div class='transfersuccessfull'>
    <button type='submit' class='cancel-amount'>
    <img src="cancel-button.png" alt="cancel">
 </button>
 <img src="failed.png">
 <h2>Transaction Unsuccessfull low balance</h2></div>
 <?php }?>
</form>
<div>


</div>


<script src='script/canceltransfer.js'></script>
<script src='script/time.js'></script>

</body>
</html>
