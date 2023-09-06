<?php
include 'konekcija.php';
include 'model/proizvod.php';
include 'model/kategorija.php';

session_start();

$user="";

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}
if (isset($_COOKIE["admin"]))
    {
        $user=$_COOKIE["admin"];
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Knjizara</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="stranica"   >

    <nav class="navbar navbar-expand-lg navbar-light" id="navCont" style="height:100px; ">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav p-lg-0 " style="margin-left: 2%; margin-top:10px;   ">
                    
                    <li><a id="btn-Pocetna" href="index.php" type="button" class="btn btn-success btn-block" style="margin-left:100px" >
                        Pocetna</a></li>
                    <li><a id="btn-Dodaj" type="button" class="btn btn-success btn-block"  style="margin-left:100px" data-toggle="modal" data-target="#my" >
                        Nova knjiga </a></li>
                    <li><a id="btn-Prikazi" href="prikaziProizvode.php" type="button" style="margin-left:100px" class="btn btn-success btn-block">
                        Sve knjige</a></li>
                    <li><a id="btn-Pocetna" href="odjava.php" type="button" class="btn btn-success btn-block"  style="margin-left:100px">
                    Odjavi se</a> </li>
                </div>
            </div>
    </nav>

    <div id="ww">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 centered">
                    <div class="slikeKontejner">
                    <img src="https://images.pexels.com/photos/8064312/pexels-photo-8064312.jpeg" alt="pocetna" class="img img-circle">
                    <img src="https://images.pexels.com/photos/11213475/pexels-photo-11213475.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="pocetna" class="img img-circle">
                    <img src="https://images.pexels.com/photos/5644710/pexels-photo-5644710.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="pocetna" class="img img-circle">
                    </div>
                    <div style="color:white ; background-color:#C0C0C0; padding:15px; border-radius:25px; margin-top:40px ;margin-left:-150px;  margin-right:-150px">
                        <h3> Dobro došli u našu knjižaru. Pratite vaša omiljena dela najpopularnih pisaca iz celog sveta! </h3>
                        <br>
                        <h4> "Čovek koji ne čita dobre knjige nema nikakve prednosti nad čovekom koji ih uopšte ne zna čitati" - Mark Tven
                            <br>
                        "Kad god dođem do nešto novca, ja kupim knjige, a ako nešto ostane, kupim hranu i odeću" - Erazmo Roterdamski  </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt" style="margin-top:20px; margin-bottom: 200px; ">
    <div id="searchDiv" >
        <label for="pretraga"style="color:white ;font-weight:bold ;font-size:20px; padding-bottom:20px">Pretraga knjiga na osnovu kategorije</label>
        <select id="pretraga" onchange="pretraga()" class="form-control" style=" font-size:20px ;" >
            <?php
            $rez = $conn->query("SELECT * from kategorija");

            while ($red = $rez->fetch_assoc()) {
            ?>
                <option 
                value="<?php echo $red['kategorijaId'] ?>"> <?php echo $red['imeKategorije'] ?></option>
            <?php   }
            ?>
        </select>
    </div>

    <div id="podaciPretraga"style="font-size:18px ; margin-top:-40px" ></div>
    </div>

    <div class="modal fade" id="my" role="dialog" >
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="align-items:center; justify-content: center;" >
                    <div class="container prijava-form">
                        <form action="#" method="post" id="dodajForm">
                            <h3 style="color:#37322F; text-align: center ">Dodaj knjigu:</h3>
                            <div class="row" >
                                <div class="col-md-11 ">
                                    <div class="form-group">
                                        <label style="color:#37322F" for="">Ime knjige:</label>
                                        <input type="text" style="border: 1px solid black" name="imeProizvoda" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label style="color:#37322F"for="">Kolicina:</label>
                                        <input type="text" style="border: 1px solid black" name="kolicina" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label style="color:#37322F" for="">Cena knjige:</label>
                                        <input type="text" style="border: 1px solid black" name="cena" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <select id="kategorijaId" name="kategorijaId" class="form-control">
                                            <?php
                                            $rez = $conn->query("SELECT * from kategorija");
                                            while ($red = $rez->fetch_array()) {
                                            ?>
                                                <option name="value" value="<?php echo $red['kategorijaId'] ?>"> <?php echo $red['imeKategorije'] ?></option>
                                            <?php  }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button id="btnDodaj" type="submit" class="btn btn-success btn-block" style="background-color: #37322F">
                                            Dodaj novu knjigu</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script>
        function pretraga() {
            $.ajax({
                url: "handler/pretragaProizvoda.php",
                data: {
                    kategorijaId: $("#pretraga").val()
                },
                success: function(html) {
                    $("#podaciPretraga").html(html);
                }
            })
        }
    </script>


    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>


</body>
          