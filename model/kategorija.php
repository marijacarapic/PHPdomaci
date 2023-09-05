<?php
class Kategorija{
  public $kategorijaId;
  public $imeKategorije;
  function __construct($kategorijaId=null,$imeKategorije=null) {
        $this->kategorijaId = $kategorijaId;
        $this->imeKategorije = $imeKategorije;
    }
   
}
?>