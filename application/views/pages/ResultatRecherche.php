<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Ela - Bootstrap Admin Dashboard Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo Base_url()?>assets/BO/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="<?php echo Base_url()?>assets/BO/css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="<?php echo Base_url()?>assets/BO/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="<?php echo Base_url()?>assets/BO/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?php echo Base_url()?>assets/BO/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="<?php echo Base_url()?>assets/BO/css/helper.css" rel="stylesheet">
    <link href="<?php echo Base_url()?>assets/BO/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b><img src="<?php echo Base_url()?>assets/BO/images/logo.png" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span><img src="<?php echo Base_url()?>assets/BO/images/logo-text.png" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                    <li> <a class="has-arrow  " href="<?php echo site_url("Profile/crud_profil")?>" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Profile</span></a>
                        </li>
						<li> <a class="has-arrow  " href="<?php echo site_url("Utilisateur/crud_utilisateur")?>" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Utilisateur</span></a>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Affectation</span></a>
                        </li>
                        <li> <a class="has-arrow  " href="<?php echo site_url("Tache/getDetailAffectation")?>" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">DetailAffectation</span></a>
                        </li>
                        <li> <a class="has-arrow  " href="<?php echo site_url("Tache/State")?>" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">gantt</span></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Liste projet</h3> </div>
                <div class="col-md-7 align-self-center">
                    
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                       <form method="post" class="import_form" enctype="multipart/form-data" action="<?php echo site_url("Tache/getRechercheGlobaleAjax")?>">

<input class="form-control" type="text" name="idprojet"/>
<br>
<br>
<input type="submit" value="recherche" class="btn btn-info" />

</form>
                                        <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nom du projet</th>
                                                <th>type</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($valiny as $res){?>
                                            <tr>
                                                <td><?php echo $res->{'nom'}?></td>
                                                <td><?php echo $res->{'type'}?></td>
                                                <td>
                                                <a href="<?php echo site_url('Tache/Description/'.$res->{'type'}.'/'.$res->{'id'}.'/'.$res->{'p'})?>">Description</a></td>
                                                
                                        </tr><?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        <!-- End Page wrapper  -->
    </div>
    <script>
	function getRecherche(){
        var valeur = document.getElementById("Valeur");
        valeur = valeur.value;
		var xmlhtp = new XMLHttpRequest();
		xmlhtp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			var obj = JSON.parse(this.responseText);
            	
			var t = document.getElementById("t1");
            t.innerHTML= "";
			var table = document.createElement("table");table.setAttribute("class","table");
            var thead = document.createElement("thead");
            var tr = document.createElement("tr");
            var th1 = document.createElement("th");
            var th2 = document.createElement("th");
            var th3 = document.createElement("th");
            
            th1.innerHTML="Nom";th2.innerHTML="type";th3.innerHTML="Action";
            tr.append(th1);tr.append(th2);tr.append(th3);
            thead.append(tr);
           
            
                var tbody = document.createElement("tbody");
			for($i = 0;$i<obj.length; $i++){
                var tr = document.createElement("tr");
                var td1 = document.createElement("td");
                var td2 = document.createElement("td");
                var td3 = document.createElement("td");
                var a = document.createElement("a");
                a.setAttribute("href","<?php echo site_url('Tache/Description/');?>"+obj[$i]['type']+"/"+obj[$i]['id']);
                td1.innerHTML= obj[$i]['nom'];
                td2.innerHTML= obj[$i]['type'];
                a.innerHTML= "Description";
                td3.append(a);
                tr.append(td1);tr.append(td2);tr.append(td3);
                tbody.append(tr);
				}
                table.append(thead);
                table.append(tbody);
				//t.innerHTML= "";
		}
	};
		xmlhtp.open("GET","<?php echo site_url("Tache/getRechercheGlobaleAjax"); ?>/"+valeur+"", true);
		xmlhtp.send();       
	}
	</script>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="<?php echo Base_url()?>assets/BO/js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo Base_url()?>assets/BO/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo Base_url()?>assets/BO/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo Base_url()?>assets/BO/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo Base_url()?>assets/BO/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo Base_url()?>assets/BO/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->

    

	<script src="<?php echo Base_url()?>assets/BO/js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo Base_url()?>assets/BO/js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo Base_url()?>assets/BO/js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo Base_url()?>assets/BO/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo Base_url()?>assets/BO/js/lib/calendar-2/pignose.init.js"></script>

    <script src="<?php echo Base_url()?>assets/BO/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?php echo Base_url()?>assets/BO/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="<?php echo Base_url()?>assets/BO/js/scripts.js"></script>
    <!-- scripit init-->
</body>

</html>