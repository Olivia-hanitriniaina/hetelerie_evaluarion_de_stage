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

                            <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <p style="color:red;">
                                <div class="table-responsive">
                                <form method="post" class="import_form" enctype="multipart/form-data" action="<?php echo site_url("Affectation/ajouter")?>">
                                <?php echo $uniques?>
						
                                <?php 
                                    if($erreur!=null){
                                        foreach($erreur as $err){ ?>
                                           <p><?php echo $err?></p>
                                        <?php }
                                    }
                                ?>
                                
                                <select class="form-control" id="val-skill" name="idcategorie">
                                    <option value=""><--Veuillez choisir votre Categorie de tache--></option>
                                    <option value=""></option>
                                    <?php foreach($categorie as $v){?>
                                        <option value="<?php echo $v->{'IDCATEGORIE'}?>"><?php echo $v->{'CATEGORIE'}?></option>
                                    <?php }?>
                                </select>
                                <br>

                                     <input type="text" name="nomtache" id="file" class="form-control" value="<?php echo $nomtache?>"/>
                                     <br>
                                     <input type="text" name="estimation" id="file" class="form-control" value="<?php echo $estimation?>"/>
                                     <br>
                                     <input type="date" name="datedebut" id="file" class="form-control" value="<?php echo $datedebut?>"/>
                                     <br>
                                     <input type="date" name="datefin" id="file" class="form-control" value="<?php echo $datefin?>" />
                                     <br>
                                   <br>
                                   <br>
                                   <input type="submit" value="Valider" class="btn btn-info" />
                                   
                                   </form>
                                </div>
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