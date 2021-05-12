
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
  <?php include("css.php");?>
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
                            <p style="color:red;">
                            <?php 
                            if( $this->session->flashdata('error') )
                            {
                                echo $this->session->flashdata('error');
                            }
                            if( $this->session->flashdata('ok') )
                            {
                                echo $this->session->flashdata('ok');
                            }
                        ?></p>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>tache</th>
                                                <th>Estimation</th>
                                                <th>Action</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($Valiny as $res){?>
                                            <tr>
                                                <td><?php echo $res->{'NOMTACHE'}?></td>
                                                <td><?php echo $res->{'ESTIMATION'}?></td>
                                                <td><a href="<?php echo site_url("Tache/getUpdate/".$res->{'IDTACHE'})?>">Modifier</a></td>
                                                <td><a href="<?php echo site_url("Tache/getSuprimer/".$res->{'IDTACHE'})?>">suprimer<a></td>
                                                  
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
                <div class="featured-btn-wrap">
                    <?php for($i = 1; $i<=$page; $i++){?>
                    <a href="<?php echo site_url('Tache/getListetachepaginer/'.$i)?>"class="btn btn-danger"><?php echo $i ?></a><?php }?>
                    </div>
                </div>
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

    <!-- scripit init-->
</body>

</html>