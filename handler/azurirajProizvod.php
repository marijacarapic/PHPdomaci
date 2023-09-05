<?php
 require '../konekcija.php';
 require '../model/proizvod.php';
 require '../model/kategorija.php';


 if(isset($_POST['proizvodId']) && isset($_POST['kategorija'])&& isset($_POST['imeProizvoda']) && isset($_POST['kolicina']) ){
  $proizvodId=$_POST['proizvodId'];
  $imeProizvoda=$_POST['imeProizvoda'];
  $kolicina=$_POST['kolicina'];


  $proizvod=new Proizvod($proizvodId,$imeProizvoda,$kolicina);
  $rezultat=$proizvod->update($conn);
  
  if($rezultat){
    echo 'Ok';
 }else{ 
   echo 'Not okay';
   echo $status;
 }
 } 
  ?>