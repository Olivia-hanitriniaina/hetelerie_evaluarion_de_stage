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
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Affectation</span></a>
                        </li>
                        <li> <a class="has-arrow  " href="<?php echo site_url("Tache/getDetailAffectation")?>" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">DetailAffectation</span></a>
                        </li>
                        <li> <a class="has-arrow  " href="<?php echo site_url("Tache/getRechercheGlobale")?>" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">RechercheGlobale</span></a>
                        </li>
                        <li> <a class="has-arrow  " href="<?php echo site_url("Affectation/erreur")?>" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">tache</span></a>
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
                    <div class="col-lg-6">
                        <div class="card">
                           
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="<?php echo site_url("Affectation/getSuppression")?>" method="post">
                                        <div class="form-group row">
                                               <h5>voulez-vous vraiment supprimer le tache </h5>
                                            <br>
                                               <h4 style="color:red"><?php echo $nom ?></h4>
                                                       
                                            
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6 ml-auto">
                                                <a href="<?php echo site_url("Affectation/getSuppressionTC")?>" class="btn btn-primary" name="oui">oui</a>
                                                <a href="<?php echo site_url("Tache/gettache/$idprojet")?>" class="btn btn-primary" name="nom">nom</a>
                                            </div>
                                        </div>
                                    </form>
       
    </div>


</body>
<script type="text/javascript">
    function chooseTeamlead(nombre) {
    var i = 0;
        var string = '';
                for(i = 0; i < nombre; i++) {
                var doc = document.getElementById('teamlead'+i);
                if(doc.checked) {
                    string += '<p>'+document.getElementById('nomteamlead'+i).value+'</p>';
                    var id = document.getElementById('idteamlead'+i).value;
                    var baseUrl= "<?php echo site_url('Affectation/getInsertAffectation'+"/"+id); ?>";
                }
             }
        document.getElementById('teamleadlab').innerHTML = string;
    } 
</script>
</html>