<?php
session_start();
require 'connect.php';
require 'functions.php';
require 'func.php';
if(empty($_SESSION["hemail"])) {
    header("location: index");
} else {
    $useremail = $_SESSION['hemail'];
    $userphone = getphonefromemail($useremail);
    $uname = getnamefromemail($useremail);
    
    #select user account...
    $queryMemb = $connect->dbrow("select * from members where phoneno='$userphone'");
    $airtimePay = $queryMemb["airtimePay"];
    $pay_Online = $queryMemb["payOnline"];
    $userbal = $queryMemb["bal"];
    $userid = getuseridfromemail($useremail);
    $userplan = getusrPlan($useremail);
    
    $getapp = $connect->dbrow("select * from appinfo");
    $dapp = $getapp;
    $cashback_appinfo = $dapp['cashback'];
    $logolink = $dapp['logolink'];
    $min_wallet = $dapp['min_wallet'];
    $stampduty = $dapp['stampduty'];
    $bankdet = $dapp['bankdet'];
    $rave_allow = $dapp['rave_allow'];
    $pay_allow = $dapp['pay_allow'];
    $theme = $dapp['theme'];
    $sms_r = json_decode($dapp["sms"], true);
	$senderid = $sms_r["senderName"];
	$choosednd = $sms_r["gateway"];
    $announcement = json_decode($dapp['announcement'], true);
    
    //get pending payment...
    $loadPaymen = $connect->dbarray("select * from payn where email='$useremail' and status='0' and method='Online'");
	if(count($loadPaymen) > 0) {
		$memo = json_decode($loadPaymen["0"]["memo"], true);
		$txcode = $memo["txref"];
		$type = $memo["type"];
		$_SESSION["orderID"] = $loadPaymen["0"]["id"];
		if(count($loadPaymen) > 0) { ?>
			<script>
				alert("You currently hava a pending payment");
				window.location = "approvetrans?txcode=<?php echo $txcode;?>&type=<?php echo $type;?>";
			</script>
		<?php }
	}
   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Price List</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  
    <link rel="shortcut icon" href="<?php echo $logolink;?>">
    <link href="css/<?php echo $theme;?>" rel="stylesheet">
  <script src="jquery-2.2.3.min.js"></script>
  <script src="vtutop.js"></script>
    <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    
        <script>
        window.onload = function() {
		    var eSelect = document.getElementById('category');
		    eSelect.onchange = function() {
			    var dopt = eSelect.value;
			    loadCategory(dopt);
		    }
        }
        </script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
<?php echo sideMenu($userphone);?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


            <!-- Nav Item - Alerts -->
            
            <!-- Nav Item - Messages -->
            
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    <?php echo $uname . "<br>".$userphone;?></span>
                <div class="img rounded-circle">
                    <i class="fa fa-user fa-2x"></i>
                </div>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php
                    if(check_admin()) {
                        foreach(explode(",", getadminLinks($userphone)) as $adminLinks) { ?>
                            
                            <a class="dropdown-item" href="<?php echo $adminLinks;?>">
                              <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                              <?php echo getadminLinksName($adminLinks);?>
                            </a>
                        <?php
                        }
                    } else { ?>
                
                    <a class="dropdown-item" href="#">
                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                      Payment History
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                      Manage Product
                    </a>
                <?php } ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Price List</h1> <button class="btn btn-danger calculat">Calculate</button>
            <div id="usrbal"></div>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-md-12">
                
                <div class="card-header"><strong>Price List</strong></div>
            		<div class="card-body table-responsive">
        		        <table class="table table-striped table-bordered table-hover">
    						<thead class="thead-dark"><tr><th>#</th>
    							<th>Category</th><th>Product</th><th>Price</th><?php if($cashback_appinfo == "yes") { ?><th>Cashback</th> <?php } ?></tr>
							</thead>
    						<tr>
    						    
						        <?php
						        $i = 1;
						        $query = $connect->dbarray("select * from products where planname='$userplan' order by pname asc");
						        foreach($query as $queries) { 
						            if($queries["category"] == "Airtime Topup") {
                                        $amountFee = $queries["percent"]."%";
                                    } else { $amountFee = CURRENCY.number_format(($queries["price"] + $queries["commission"]), 2); }
						        ?>
						            <td><?php echo $i++;?></td>
                                    <td><?php echo $queries["category"];?></td>
                                    <td><?php echo $queries["pname"];?></td>
                                    <td><?php echo $amountFee;?></td>
                                    <td><?php 
                                    if(getplan($userplan)["cashbackType"] == 'percent') {
                                        echo $queries["cashback"]."%";
                                    } else { echo "&#8358;".$queries["cashback"]; } ?></td>
        						</tr>
						        <?php } ?>	
    					
    					</table>
        		    
    		    </div>
                
                
              <!-- Tab panes -->
              <!--
            	<div class="card" onmouseover="chkbtn()">
            		<div class="card-header"><strong>Price List</strong></div>
            		<div class="card-body table-responsive">
            			
            				<div class="col-sm-7 pull-right" style="margin-bottom:2%">
            					<form class="form-inline" onsubmit="return false">
            						<b>Category:</b><select class="form-control input-sm" id="category" name="category">
            									<option value="">-- select --</option>
            								<?php $loadCat = $connect->dbarray("select * from category order by catname asc");
            								foreach($loadCat as $loadCats) { ?>
            									<option value="<?php echo $loadCats["catname"];?>"><?php echo $loadCats["catname"];?></option>
            								<?php } ?>
            						</select>
            						&nbsp; &nbsp;
            						<div id="prod_sel"></div>
            						 &nbsp; &nbsp;
            						<button class="btn btn-primary" id="loadPrice" onclick="confirmation()"><b>Sort Price</b></button>
            					</form>
            				</div>
            			
            				<div id="emptyTable">
            					<table class="table table-striped table-bordered table-hover">
            						<thead class="thead-dark"><tr><th>#</th>
            							<th>Category</th><th>Product</th><th>Price</th></tr></thead>
            							
            					
            					</table>
            				</div>
            				<div id="write_prod"></div>
            			
            			
            		</div>
            	</div>
              -->
            </div>
          </div>

          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php require "footer.php"; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

    <script type="text/javascript">
        var loadPrice = document.getElementById('loadPrice');
        loadPrice.disabled = true;
        
        function chkbtn() {
            
            var category = document.getElementById('category').value;
            
            if((category == "")) {
                loadPrice.disabled = true; 
                document.getElementById("emptyTable").style.display = "block";
                document.getElementById("write_prod").style.display = "none";
            } else { loadPrice.disabled = false;
                document.getElementById("write_prod").style.display = "block";
                document.getElementById("emptyTable").style.display = "none"; }
        }
        
        function confirmation() {
            document.getElementById("emptyTable").style.display = "none";
            var cats = document.getElementById('category').value;
            var prods = document.getElementById('products').value;
            var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	    if (this.readyState == 4 && this.status == 200) {
        	        document.getElementById("write_prod").innerHTML = this.responseText;
        	    }
        	};
        	
        	xmlhttp.open("GET", "ajax?loadProds&cats=" + cats+"&product="+prods, true);
        	xmlhttp.send();
        	
        }
        
        function loadCategory(dopt) {
            var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        		if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("prod_sel").innerHTML = this.responseText;
        		}
        	};
        	
        	xmlhttp.open("GET", "ajax?fetchPrice&category=" + dopt, true);
        	xmlhttp.send();
        }
        
    </script>
    
    
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
