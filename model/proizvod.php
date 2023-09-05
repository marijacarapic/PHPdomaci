<?php
class Proizvod{
  public $proizvodId;
  public $imeProizvoda;
  public $kolicina;
  public $cena;
  public $kategorijaId;

  function __construct($proizvodId=null,$imeProizvoda=null,$kolicina=null,$cena=null,$kategorijaId=null) {
        $this->proizvodId = $proizvodId;
        $this->imeProizvoda = $imeProizvoda;
        $this->kolicina = $kolicina;
        $this->cena = $cena;
        $this->kategorijaId=$kategorijaId;
    }

    public function insert($conn){
      return $conn->query("INSERT INTO proizvodi(imeProizvoda,kolicina,cena,kategorijaId) VALUES ('$this->imeProizvoda','$this->kolicina','$this->cena','$this->kategorijaId')");
  }

  public function delete($conn,$id){
    return $conn->query("DELETE FROM proizvodi where proizvodId=$id");
  }

  public function update($conn){
    return $conn->query("UPDATE proizvodi SET imeProizvoda='$this->imeProizvoda',kolicina='$this->kolicina' where proizvodId=$this->proizvodId");
}

public static function getById($id, $conn){
  return $conn->query("SELECT * FROM proizvodi WHERE proizvodId = $id");
}


}

?>