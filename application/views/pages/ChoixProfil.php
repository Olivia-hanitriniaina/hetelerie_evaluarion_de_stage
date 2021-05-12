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
                            <div class="card-title">
                            <?php foreach($V as $a){?>
                                 <h4>votre Manager est : <?php echo $a->{'PRENOM'}?></h4>
                            <?php }?>
                            </div>
                            <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="<?php echo site_url("Affectation/getInsertAffectationManager")?>" method="post">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Choisir un Manager<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="utilisateur">
                                                    <option value=""><--Veilleiz choisir un seul Manager--></option>
                                                    <?php foreach($Valiny as $res){?>
                                                        <option value="<?php echo $res->{'IDUTILISATEUR'}?>"><?php echo $res->{'PRENOM'}?></option>
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
                                <div class="card-body">
                                <label class="col-lg-4 col-form-label" for="val-skill">Choisir un Team<span class="text-danger">*</span></label>
                                <form class="form-valide" action="<?php echo site_url("Affectation/getInsertAffectationTeamLeader")?>" method="post">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Choix</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                           <tr>
                                                <td><select class="form-control" id="val-skill" name="utilisateur">
                                                    <option value=""><--Veilleiz choisir votre Team Lead--></option>
                                                    <?php foreach($valiny as $v){?>
                                                        <option value="<?php echo $v->{'IDUTILISATEUR'}?>"><?php echo $v->{'PRENOM'}?></option>
                                                    <?php }?>
                                                </select></td>
                                                <td>
                                                 <div class="featured-btn-wrap">
                                                    <button type= "submit" class="btn btn-danger ">Valider</button>
                                                    </div>    
                                                </td>
                                           </tr>
                                    </table>
                                </div></form>
                            </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                <div class="card">
                            <div class="card-title">
                                <h4>Liste Team Lead</h4>
                            </div>
                            <div class="row justify-content-center">
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                    <thead>
                                            <tr>
                                                <th>Utilisateur</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($Val as $res){?>
                                            <tr>
                                                <td><?php echo $res->{'PRENOM'}?></td>
                                                <td>
                                                <button type= "button" class="btn btn-danger " data-toggle="modal" data-target="#myTeam">Ajouter Developpeur</button></td>     
                                        </tr><?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                               <?php foreach($uniques as $un){?>
                              
                                <p> <?php echo $un .""?></p>
                                
                               <?php }?>
                                    
                           <p>---------------------------</p>
                           
                           <?php if($valeur !=null){?>
                                <?php foreach($valeur as $d){?>
                                    <?php if(isset($d['ligneerreur'])){?>
                                      
                                        <?php if($d['erreur']!=null){?>
                                            <p> <?php echo $d['ligneerreur']?><p>
                                            <?php foreach($d['erreur'] as $a){?>
                                               <p> <?php echo $a?><p>
                                           <?php }?>
                                           <p>---------------------------</p>
                                     <?php } ?>    
                                     <?php } ?> 
                               
                                    <?php } ?>
                                   
                          <?php  } ?>
                        
                         
                               

                                <form method="post" class="import_form" enctype="multipart/form-data" action="<?php echo site_url("Affectation/upload")?>">
                               
                                <select class="form-control" id="val-skill" name="categorie">
                                    <option value=""><--Veuillez choisir votre Categorie de tache--></option>
                                    <?php foreach($categorie as $v){?>
                                        <option value="<?php echo $v->{'IDCATEGORIE'}?>"><?php echo $v->{'CATEGORIE'}?></option>
                                    <?php }?>
                                </select>
                               
                                <br>
                                     <input type="file" name="file" id="file" required accept=".xls, .xlsx" />
                                   <br>
                                   <br>
                                   <input type="submit" value="Valider" class="btn btn-info" />
                                   
                                   </form>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                           
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
        
         <!-- The Modal -->
         <div class="card" style="height: 150px;">
                                        <p id="teamleadlab"></p>
                                    </div>
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>Action</th>
                        <input type="hidden">
                    </tr>
                </thead>
                <tbody>
                <?php $i =0; foreach($Valiny as $v){?>
                    <tr>
                        <td><?php echo $v->{'PRENOM'}?></td>
                        <td><input id="teamlead<?php echo $i; ?>" type="checkbox"></td>
                        <input type="hidden" id="idteamlead<?php echo $i; ?>" value="<?php echo $v->{'IDUTILISATEUR'}?>">
                        <input type="hidden" id="nomteamlead<?php echo $i; ?>" value="<?php echo $v->{'PRENOM'}?>">
                </tr><?php $i++; }?>
            </table>
        </div>
        </div>
        <!-- Modal body -->
        <!-- Modal footer -->
        <div class="modal-footer">
         <button onclick="chooseTeamlead(<?php echo $i; ?>)" type="button" class="btn btn-danger" data-dismiss="modal">Choisir</button>
        </div>
        
      </div>
    </div>
  </div>
  <div class="modal" id="myTeam">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>Action</th>
                        <input type="hidden">
                    </tr>
                </thead>
                <tbody>
                <?php $i =0; foreach($valiny as $v){?>
                    <tr>
                        <td><?php echo $v->{'PRENOM'}?></td>
                        <td><a href="<?php echo site_url("Affectation/getAjouter_developpeur/".$v->{'IDUTILISATEUR'});?>" class="btn btn-primary">ok</a></td>
                </tr><?php $i++; }?>
            </table>
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