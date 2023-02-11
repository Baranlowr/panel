<?php
include_once "../server/rolecontrol.php";
$customCSS = array('<link href="../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">',
'<link href="../assets/plugins/DataTables/style.css" rel="stylesheet">'
);
$customJAVA = array(
    '<script src="../assets/plugins/DataTables/datatables.min.js"></script>',
    '<script src="../assets/plugins/printer/main.js"></script>',
    '<script src="../assets/js/pages/datatables.js"></script>',
    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>'
);

$page_title = 'TC Sorgu';
include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');

?>
<!--<div class="page-content">-->
<!--BAŞLANGIC-->
<div class="overlay">
        <video id="myvideo" autoplay="true" loop muted >
            <source src="../assets/images/matrix.mp4" type="video/mp4">
        </video>
    </div>
<div class="row">
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                       <div class="card">
                                        <div class="card-body">
										<h1 class="h3 font-w700 mb-2">
<h4 class="fs-base lh-base fw-medium text-muted mb-0"><i class="fas fa-id-card-alt"></i> NavAtlas Ad Soyad Sorgu</h4>

<br>
<h2 class="h6 font-w500 text-muted mb-0">
Merkezi Nüfus İdaresi Sistemi Mernis sorgu bölümünde aradığınız kişileri Ad Soyad ile sorgulayabilirsiniz.
</h2>

</div>
</div>


<br>
		
 <div class="card">
                                        <div class="card-body">


<h5> T.C. Kimlik Sorgu ile ne yapabilirim ?</h5>
<p>
    İstediğiniz kişinin <b>Adı ve Soyadı</b> ile Kimlik, Adres, Hane, Nüfus bilgilerini sorgulayabilirsiniz.
</p>
                        <form method="POST" action="">
                                  
                                   <input class="form-control" type="text" name="ikibinonbestc"  id="ikibinonbestc" placeholder="T.C. Kimlik No"><br>                                                                  
</div>

<center>
<button type="submit" name="yolla" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-search"></i> Sorgula</button> </form>
<button id="durdurButon" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i><a href="mernis2015.php" class="text-white"> Sıfırla </a></button>
<button id="temizleButon" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-print"></i> Yazdır Detay</button><br><br>
</center>
      </div>
      
       <?php
$link = mysqli_connect("127.0.0.1", "root", "", "hsys");

if($link){
  
}
if(!$link){echo "<h1>Bağlanılmadı</h1>";
} 


$port = $_POST["ikibinonbesad"];
$time = $_POST["ikibinonbessoyad"];
$il_sorgu = $_POST["ikibinonbesadil"];
$tc_sorgu = $_POST["ikibinonbestc"];
$sql = "SELECT * FROM 101m WHERE TC='$tc_sorgu'   ;";


if(isset($_POST['yolla']))

if($result = mysqli_query($link, $sql))
{   
    $bulunans = $result->num_rows;
    $bulunans2 = "Bulunan kisi sayisi: $bulunans ";
}

?>
                                    </div>
                                </div>
                            </div>
							</div>
							
	<div class="col-xl-12 col-md-6">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
									
										<div class="table-responsive">
                                            <table class="table mb-0">
        


                  <tr>
                       
<?php
if($result = mysqli_query($link, $sql))
{   
    $bulunans = $result->num_rows;
    $bulunans2 = "Bulunan kisi sayisi: $bulunans ";    
    if(mysqli_num_rows($result) > 0){ ?>

    <script>
    $(document).ready(function(){
      $('#Sorgu').toast('show');
    });
    </script>
   <?php 
        while($row = mysqli_fetch_array($result)){
            echo '                                             <thead class="thead-light">
<tr>
<th scope="col">T.C.</th>
<th scope="col">Adı</th>
<th scope="col">Soyadı</th>
<th scope="col">Doğum Tarihi</th>
<th scope="col">İl</th>
<th scope="col">İlçe</th>
<th scope="col">Anne Adı</th>
<th scope="col">Anne T.C.</th>
<th scope="col">Baba Adı</th>
<th scope="col">Baba T.C.</th>
<th scope="col">UYRUK</th>
</tr>
                            </thead>';
            echo "    <td>" . $row['TC'] . "</td>";
            echo "    <td>" . $row['ADI'] . "</td>";
            echo "    <td>" . $row['SOYADI'] . "</td>";
            echo "    <td>" . $row['DOGUMTARIHI'] . "</td>";
            echo "    <td>" . $row['NUFUSIL'] . "</td>";
            echo "    <td>" . $row['NUFUSILCE'] . "</td>";
            echo "    <td>" . $row['ANNEADI'] . "</td>";
            echo "    <td>" . $row['ANNETC'] . "</td>";
            echo "    <td>" . $row['BABAADI'] . "</td>";
            echo "    <td>" . $row['BABATC'] . "</td>";
            echo "    <td>" . $row['UYRUK'] ."<br>". "</td>";
       
        ?>

<?php    }?>
<?php   echo " </table>";
        echo "</div>";
        
        ?>
<?php
        echo "</table>";
        mysqli_free_result($result);
    } else{ ?>
          
        <?php
    }
} else{ ?>


<?php    
}
 
mysqli_close($link);
?>
    <?php
    include('inc/footer_native.php');
    include('inc/footer_main.php');
    ?>