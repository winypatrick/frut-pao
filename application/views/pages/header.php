<!DOCTYPE html>
<html>

  <link rel="stylesheet" href="<?= base_url();?>fich_compente/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url();?>fich_compente/font-awesome-4.7.0/css/font-awesome.css">
  <!-- Ionicons -->

  <!-- jvectormap -->
   <link href="<?= base_url();?>fich_compente/bootstrap/css/hover/hover-min.css" rel="stylesheet" />
    <link href="<?= base_url();?>fich_compente/bootstrap/css/hover/hover.css" rel="stylesheet" />
    <link href="<?= base_url();?>fich_compente/bootstrap/css/img.css" rel="stylesheet" />
    
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url();?>fich_compente/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url();?>fich_compente/dist/css/skins/_all-skins.min.css">


<!-- ======================================================================================================== -->
<link href="<?= base_url();?>fich_compente/bootstrap/css/campo_pesquisa.css" rel="stylesheet" >
<!-- ======================================================================================================== -->

  <script src="<?= base_url();?>fich_compente/bootstrap/js/jquery.js"></script>  
  <!-- Bootstrap 3.3.6 -->
<script src="<?= base_url();?>fich_compente/bootstrap/js/bootstrap.min.js"></script>


  <!-- Meus plugins  -->

<!-- alert de loader -->
<script src="<?php echo base_url(); ?>fich_plugins/blockUI/jquery.blockUI.js"></script>

<!-- datepicker -->
<link  rel="stylesheet" href="<?= base_url()?>fich_plugins/datepicker/css/bootstrap-datepicker.css" > 
<script src="<?= base_url()?>fich_plugins/datepicker/js/bootstrap-datepicker.js"></script> 



<!-- material_datepicer_hora -->

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="<?= base_url()?>fich_plugins/datapicker_material/css/bootstrap-material-datetimepicker.css">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
     


    <!-- <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script> -->
    <!--  ou-->
    <script type="text/javascript" src="<?= base_url()?>fich_plugins/datapicker_material/js/moment-with-locales.min.js"></script> 

    <script type="text/javascript" src="<?= base_url()?>fich_plugins/datapicker_material/js/bootstrap-material-datetimepicker.js"></script> 

<!-- datatable -->
<script src="<?= base_url()?>fich_plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>fich_plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- //////////////////////////////////////// /////////////////////////////////////////////////--> 

<!-- plugin aler SweetAlert.htm -->
<script src="<?= base_url()?>fich_plugins/plugin_alert/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url()?>fich_plugins/plugin_alert/sweetalert.css">
<!--  -->   


<!-- styless para datatable-->
<link rel="stylesheet" href="<?= base_url();?>fich_compente/bootstrap/css/corpo_a.css">
<!--  -->

<!-- scripts para funcionario quel ir para -->
<script src="<?php echo base_url(); ?>fich_jquery/funcionario.js?v=<?=rand() ?>"></script>

<!-- scripts para funcionario quel ir para -->
<script src="<?php echo base_url(); ?>fich_jquery/header.js?v=<?=rand() ?>"></script>



<!-- Favicon -->
<link href="<?= base_url(); ?>fich_compente/favicon_1.png" rel="shortcut icon">

 <title>frut&Pão</title>

</head>

<body class="hold-transition skin-blue sidebar-mini">


<div class="wrapper">

      <div class="col-md-12">
        <!--                                    modal de mudar senha                                 -->
   <div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="mySmallModal" id="modal_mudar_senha">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="margin-top:110px">

      <div class="modal-header label-primary">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Muda Senha</h4>
      </div>
      <div class="modal-body">
        <div class="row ">

        <div class="col-md-12">
        <div class="form-group">
        <label for="nova">Senha Antiga :</label>
      <input type="password" class="form-control" id="senha_1" name="senha_1" onkeyup="change_()"  placeholder="Entre Senha Antiga" >
        </div> 
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label for="nova">Senha Nova :</label>
      <input type="password" class="form-control " id="senha_2" name="senha_2" onkeyup="change_()" placeholder="Entre Nova Senha" >
        </div> 
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label for="nova">Confirma Senha :</label>
      <input type="password" class="form-control" id="senha_3" name="senha_3" onkeyup="change_()"  placeholder="Confirmar a senha" >
        </div> 
        </div>

        <div id="feed" class="col-sm-12" >
             
         </div>

       </div>
      </div>

       <div class="modal-footer">
       <button class="btn btn-primary" onclick="muda_senha()" id="mudar">
        <i class="fa fa-check" aria-hidden="true" ></i> Modifica </button> 
         </div>

       </form>

       </div>
      
   </div>
 </div>
</div>
<!--                                                     fim_modal_senha                                 -->
   

  <header class="main-header">

    <!-- Logo -->
    <a href="<?= base_url();?>funcionario" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>F</b><span style="color: #0A0909">&</span>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Frut<span style="color: #0A0909">&</span></b>Pã<span style="font-size: 16px; " class="fa fa-cog fa-spin"></span ></span> 
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top ">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
       

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url();?>fich_compente/log11.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Africa Business</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= base_url();?>fich_compente/dist/img/avatar.png" class="img-circle" alt="User Image">

                <!-- <p>
                  Africa Business
                </p> -->
                <p><strong>Hi <?= $perfil_nome ?></strong></p>
                <strong style="color: #FFFFFF"><span>E-mail:</span> <?= $perfil_email ?> </strong>
              </li>
         
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a class="btn btn-default btn-flat" data-toggle="modal" data-target="#modal_mudar_senha">Mudar Senha</a>
                </div>
                <div class="pull-right">
                  <a class="btn btn-default btn-flat" onclick="lagout()">Sair</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
      <!--     <li>
        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
      </li> -->
      <!-- end -->


        </ul>
      </div>

    </nav>

  </header>