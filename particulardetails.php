<?php include 'Functions.php';
session_start();
class particulardetails{
    public function details($input){
        $connect=new Functions();
        $connection=$connect->getConection();
        $method=$connect->serverreq();
      if($method == 1){
    
             if($connect->postof($input) == 1){
                 $par=$input;
                 $particulardata="select * from bank where phone='$par'";
                 $particulardataconnect=$connect->select($connection,$particulardata);
                 $norofparticulardata=$connect->noofRows($particulardataconnect);
    }

    }
    return $norofparticulardata;
}
    public function dataconnectiondetails($input){
        $connect=new Functions();
        $connection=$connect->getConection();
        $par=$input;
        $particulardata="select * from bank where phone='$par'";
        $particulardataconnect=$connect->select($connection,$particulardata);
        return $particulardataconnect;

    }
}