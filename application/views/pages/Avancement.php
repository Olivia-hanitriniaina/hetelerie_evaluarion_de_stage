
</html><!DOCTYPE html>
<html lang="en">

<head>
<?php include("css.php")?>
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
                    <div class="col-lg-12">
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
                                                <th>Tache</th>
                                                <th>Estimation</th>
                                                <th>ResteAffaire</th>
                                                <th>Tempspasser</th>
                                                <th>Pourcentage</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($valiny as $es){?>
                                            <tr>
                                                <td><?php echo $es->{'NOMTACHE'}?></td>
                                                <td><?php echo $es->{'ESTIMATION'}?></td>
                                                <td><?php echo $es->{'TEMPSPASSER'}?></td>
                                                <td><?php echo $es->{'RESTEAFFAIRE'}?></td>
                                                <td><?php echo ($es->{'TEMPSPASSER'}*100)/($es->{'RESTEAFFAIRE'}+$es->{'TEMPSPASSER'})?> %</td>    
                                        </tr><?php }?>
                                        </tbody>
                                    </table>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>total</th>
                                                <th>Sum Estimation</th>
                                                <th>Sum ResteAffaire</th>
                                                <th>Sum Tempspasser</th>
                                                <th>Pourcentage</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($Valiny as $res){?>
                                            <tr>
                                            <td></td>
                                                <td><?php echo $res->{'e'}?></td>
                                                <td><?php echo $res->{'r'}?></td>
                                                <td><?php echo $res->{'t'}?></td>
                                                <td><?php echo ($res->{'t'}*100)/($res->{'r'}+$res->{'t'})?> %</td>    
                                        </tr><?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Liste occupation d' un developpeur</h4>
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
                                                <th>Utilisateur</th>
                                                <th>taux d'occupation</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach($reponse as $va){?>
                                            <tr>
                                                <td><?php echo $va['prenom']?></td>
                                                <td><?php echo $va['taux']?> %</td>
                                               
                                        </tr><?php }?>
                                        </tbody>
                                    </table>
                                   
                                </div>
                            </div>
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

    <!-- End Wrapper -->
    
    <!-- scripit init-->
</body>

</html>