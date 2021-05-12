<!DOCTYPE html>
<html lang="en">

<head>
<?php include("css.php");?>
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
                <div class="row">
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-title">
                                <h4>Liste de projet</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nom du projet</th>
                                                <th>Date debut</th>
                                                <th>Date fin</th>
                                                <th>Action</th>
                                                <th>Action</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($Valiny as $res){?>
                                            <tr>
                                                <td><?php echo $res->{'PROJET'}?></td>
                                                <td><?php echo $res->{'DateDebut'}?></td>
                                                <td><?php echo $res->{'DateFin'}?></td>
                                                <td>
                                                <a href="<?php echo site_url('Affectation/getchoixProfil/'.$res->{'IDPROJET'})?>">affecter</a></td> 
                                                <td>
                                                <a href="<?php echo site_url('Tache/gettache/'.$res->{'IDPROJET'})?>">listetache</a></td>
                                                <td>
                                                <a href="<?php echo site_url('Affectation/getSupprimerProjet/'.$res->{'IDPROJET'})?>">supprimer</a></td>      
                                                       
                                        </tr><?php }?>
                                        </tbody>
                                    </table>
                                    <br>
                                    <br>
                                    <div class="card-title">
                                    <h4>liste utlisateur</h4>
                                </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th> prenom</th>
                                                <th>ETAT</th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($utilisateur as $res){?>
                                            <tr>
                                                <td><?php echo $res->{'NOM'}?></td>
                                                <td><?php echo $res->{'PRENOM'}?></td>
                                                <td><?php echo $res->{'ETAT'}?></td>
                                    <td>
                                                <a href="<?php echo site_url('Affectation/getSupprimerU/'.$res->{'IDUTILISATEUR'}.'/'.$res->{'IDPROFILE'})?>">supprimer</a></td>      
                                                       
                                        </tr><?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-md-4">
               
            </div>
            </div>
            <div class="col-md-12">
            <div class="row" id ="row">
                    <div class="wrap-division" id= "t1">
                        <div id="contenu">
                            <div class="col-md-12 col-sm-12">
                                <div class="tour">									
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
        <!-- End Page wrapper  -->
    </div>

    <!-- End Wrapper -->

    <!-- scripit init-->
</body>

</html>