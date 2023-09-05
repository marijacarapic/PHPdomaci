<?php
class Korisnik{
    public $korisnikId;
    public $username;
    public $password;
    

    public function __construct($korisnikId=null,$username=null,$password=null)
    {
        $this->korisnikId = $korisnikId;
        $this->username=$username;
        $this->password=$password;
    }

    public static function login($korisnik, mysqli $conn)
    {
        $query = "SELECT * FROM korisnik WHERE username='$korisnik->username' and password='$korisnik->password'";
        return $conn->query($query);
    }

}