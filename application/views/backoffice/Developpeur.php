<!DOCTYPE html>
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
                    <li> <a class="has-arrow  " href="<?php echo site_url("Profile/crud_profil")?>" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Profile</span></a>
                        </li>
						<li> <a class="has-arrow  " href="<?php echo site_url("Utilisateur/crud_utilisateur")?>" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Utilisateur</span></a>
                        </li>
                        
                        <li> <a class="has-arrow  " href="<?php echo site_url("Tache/getDetailAffectation")?>" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Developpeur</span></a>
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
                                    <form class="form-valide" action="<?php echo Site_url("Tache/AjouterTache")?>" method="POST">
                                       
                                       <!-- <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Choisir un team <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="team">
                                                    <option value=""><--Veilleiz choisir un team--></option>
                                                  <!--  <?php foreach($response as $res){?>
                                                        <option value="<?php echo $res->{'IDUTILISATEUR'}?>"><?php echo $res->{'PRENOM'}?></option>  
                                                        
                                                    <?php }?>
                                                    <?php foreach($Valiny as $res){?>
                                              
                                                    <input type="hidden" name="idprojet" value="<?php echo $res->{'IDPROJET'}?>"> <?php }?> 
                                                </select>
                                            </div>
                                        </div>-->
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Choisir un Devoloppeur<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="utilisateur">
                                                    <option value=""><--Veilleiz choisir un Devoloppeur--></option>
                                                    <?php foreach($Valiny as $res){?>
                                                        <option value="<?php echo $res->{'IDUTILISATEUR'}?>"><?php echo $res->{'PRENOM'}?></option>  
                                                        <input type="hidden" name="email" value="<?php echo $res->{'EMAIL'}?>">
                                                    <?php }?>
                                                    <?php foreach($Valiny as $res){?>
                                              
                                                    <input type="hidden" name="idprojet" value="<?php echo $res->{'IDPROJET'}?>"> <?php }?> 
                                                </select>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Choisir un Tache<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="tache">
                                                    <option value=""><--Veilleiz choisir un taches--></option>
                                                    <?php foreach($v as $r){?>
                                                        <option value="<?php echo $r->{'IDTACHE'}?>"><?php echo $r->{'NOMTACHE'}?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6 ml-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                    <div class="col-lg-12">
                   
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                <div class="col-lg-12">
                        <div class="card">
                        <h3 class="text-primary">liste tache fini</h3> 
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                    <thead>
                                            <tr>
                                                <th>Taches</th>
                                                <th>Estimation</th>
                                                <th>RESTEAFFAIRE</th>
                                               

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($reponse as $res){?>
                                            <tr>
                                                <td><?php echo $res->{'NOMTACHE'}?></td>
                                                <td><?php echo $res->{'ESTIMATION'}?></td>
                                                
                                                <td><?php echo $res->{'RESTEAFFAIRE'}?></td>
                                                 
                                        </tr><?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                        <h3 class="text-primary">Liste tache Depasser l'éstimation</h3> 
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                    <thead>
                                            <tr>
                                                <th>Taches</th>
                                                <th>Estimation</th>
                                                <th>TEMPSPASSER</th>
                                                <th>RESTEAFFAIRE</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($val as $res){?>
                                            <tr>
                                                <td><?php echo $res->{'NOMTACHE'}?></td>
                                                <td><?php echo $res->{'ESTIMATION'}?></td>
                                                <td><?php echo $res->{'TEMPSPASSER'}?></td>
                                                <td><?php echo $res->{'RESTEAFFAIRE'}?></td>
                                        </tr><?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                        </div>
                                </div>
                            </div>
                            <div class="container-fluid">
                    <div class="col-lg-9">
                    <h3 class="text-primary">liste des page non_affecter</h3> 
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                    <thead>
                                            <tr>
                                                <th>Taches</th>
                                                <th>Estimation</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($v as $res){?>
                                            <tr>
                                                <td><?php echo $res->{'NOMTACHE'}?></td>
                                                <td><?php echo $res->{'ESTIMATION'}?></td>
                                        </tr><?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                        </div>
                    <h3 class="text-primary">liste tache affeter</h3> 
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                    <thead>
                                            <tr>
                                                <th>Taches</th>
                                                <th>Estimation</th>
                                                <th>ACTION</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($resp as $res){?>
                                            <tr>
                                                <td><?php echo $res->{'NOMTACHE'}?></td>
                                                <td><?php echo $res->{'ESTIMATION'}?></td>
                                                 <td><a href="<?php echo site_url('Tache/getDetailAffectation/'.$res->{'IDTACHE'})?>">Estimer</a></td>
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
                        </div></div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        <!-- End Page wrapper  -->
    </div>
    <?php include("css.php")?>
    <!-- scripit init-->
</body>

</html>