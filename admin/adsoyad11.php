<?php
$customCSS = array('<link href="../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">',
'<link href="../assets/plugins/DataTables/style.css" rel="stylesheet">'
);
$customJAVA = array(
    '<script src="../assets/plugins/DataTables/datatables.min.js"></script>',
    '<script src="../assets/plugins/printer/main.js"></script>',
    '<script src="../assets/js/pages/datatables.js"></script>',
    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>',
    '<script src="../assets/plugins/jquery.toast/jquery.toast.js"></script>'

);

$page_title = 'Ad Soyad';
include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');

error_reporting(0);

?>
<!--<div class="page-content">-->
<!--BAŞLANGIC-->

    <head>
        
       <?php
        include_once("includes/head.php");
       
        ?>

<style>
	.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
	background: #dd3d36;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
	background: #5cb85c;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
		
    </head>

    
   <?php
        include_once("includes/menu.php");
        ?>
		
		  <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="col-lg-12">
                                

                
                                              <div class="card">
                                        <div class="card-body">
										<h1 class="h3 font-w700 mb-2">
<h4 class="fs-base lh-base fw-medium text-muted mb-0"><i class="fas fa-id-card-alt"></i> Lisandra Checker Ad Soyad Sorgu</h4>

<br>
<h2 class="h6 font-w500 text-muted mb-0">
Merkezi Nüfus İdaresi Sistemi Mernis sorgu bölümünde aradığınız kişileri Ad Soyad ile sorgulayabilirsiniz.
</h2>

</div>
</div>


<br>
		
 <div class="card">
                                        <div class="card-body">


<h5>Ad Soyad Sorgu ile ne yapabilirim ?</h5>
<p>
    İstediğiniz kişinin <b>Adı ve Soyadı</b> ile Kimlik, Adres, Hane, Nüfus bilgilerini sorgulayabilirsiniz.
</p>
				    			     
										
                                <form method="POST" action="">
                                  
                                   <input class="form-control" type="text" name="ikibinonbesad"  id="ikibinonbesad" placeholder="Ad"><br>
                                   <input class="form-control" type="text" name="ikibinonbessoyad"  id="ikibinonbessoyad" placeholder="Soyad"><br>
                                  
                                  
                                
</div>

<center>
<button type="submit" name="yolla" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-search"></i> Sorgula</button> </form>
<button id="durdurButon" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i><a href="mernis2015.php" class="text-white"> Sıfırla </a></button>
<button id="temizleButon" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-print"></i> Yazdır Detay</button><br><br>
</center>
      </div>
      
       <?php
$link = mysqli_connect("127.0.0.1", "root", "hhazar3421", "hsys");

if($link){
  
}
if(!$link){echo "<h1>Bağlanılmadı</h1>";
} 


$port = $_POST["ikibinonbesad"];
$time = $_POST["ikibinonbessoyad"];
$il_sorgu = $_POST["ikibinonbesadil"];
$sql = "SELECT * FROM 101 WHERE ADI='$port' and SOYADI='$time' and NUFUSIL='$il_sorgu'  ;";


if(isset($_POST['yolla']))
{
  if (empty($il_sorgu) && empty($port)){
    $sql = "SELECT * FROM 101m WHERE  SOYADI='$time'  ;";
    }else{
    if (empty($il_sorgu)){
        $sql = "SELECT * FROM 101m WHERE ADI='$port' and SOYADI='$time'  ;";
    }else{
    } 
    if (empty($il_sorgu) && empty($time)){
        $sql = "SELECT * FROM 101m WHERE ADI='$port'  ;";
    }else{
    }
    if (empty($port)){
        $sql = "SELECT * FROM 101m WHERE NUFUSIL='$il_sorgu' and SOYADI='$time'  ;";
    }else{
    } 
    if (empty($time)){
        $sql = "SELECT * FROM 101m WHERE NUFUSIL='$il_sorgu' and ADI='$port'  ;";
    }else{
    } 



}
}
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
<th scope="col">Baba Adı</th>
<tr>

                            </thead>';
            echo "    <td>" . $row['TC'] . "</td>";
            echo "    <td>" . $row['ADI'] . "</td>";
            echo "    <td>" . $row['SOYADI'] . "</td>";
            echo "    <td>" . $row['DOGUMTARIHI'] . "</td>";
            echo "    <td>" . $row['NUFUSIL'] . "</td>";
            echo "    <td>" . $row['NUFUSILCE'] . "</td>";
            echo "    <td>" . $row['ANNEADI'] . "</td>";         
            echo "    <td>" . $row['BABAADI'] . "</td>";                       
       
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
												</tr></td>
</table>
</div>
</div>
</div>
</div>
</div>
</div>


</div>

</main>
                    <!-- FOOTER -->
				<?php
        include_once("includes/footer.php");
        ?>
				
           


        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/libs/simplebar/simplebar.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/libs/node-waves/waves.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
          <script src="assets/libs/apexcharts/apexcharts.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/js/pages/dashboard.init.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/js/app.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="c0746b70745e39c225c525b8-|49" defer=""></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"660d5bcaaa6be186","token":"e6744a75b48847d79ca94b903ae51a33","version":"2021.5.2","si":10}'></script>
      
</body>

</html>

<?php    

mysqli_close($link);
?>