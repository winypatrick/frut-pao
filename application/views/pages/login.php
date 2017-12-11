<!DOCTYPE html>
<html >
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link href="<?= base_url(); ?>fich_compente/14469563_595253984008889_3422939138102187882_n.png" rel="shortcut icon">
<head>


    <title>frut&Pão</title>
    

   

     <link href="<?= base_url();?>fich_compente/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
     <link href="<?= base_url();?>fich_compente/bootstrap/css/hover/hover-min.css" rel="stylesheet" />
    <link href="<?= base_url();?>fich_compente/bootstrap/css/hover/hover.css" rel="stylesheet" />

    <!-- configurando campos de login costumizados css qual sena modfifica -->
    <link href="<?= base_url();?>fich_compente/bootstrap/css/login.css" rel="stylesheet" />

    <!-- css pre loader -->
    <link href="<?= base_url();?>fich_compente/bootstrap/css/style.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="<?= base_url();?>fich_compente/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url();?>fich_compente/bootstrap/css/bootstrap.css">

<!-- ======================================================================================================== -->
  <script src="<?= base_url();?>fich_compente/bootstrap/js/jquery.js"></script>  
  <!-- Bootstrap 3.3.6 -->
<script src="<?= base_url();?>fich_compente/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>fich_jquery/utilizador.js"></script> 

<!-- plugin aler SweetAlert.htm -->
<script src="<?= base_url()?>fich_plugins/plugin_alert/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url()?>fich_plugins/plugin_alert/sweetalert.css">
<!--  -->   

<!-- alert de loader -->
<script src="<?php echo base_url(); ?>fich_plugins/blockUI/jquery.blockUI.js"></script>


<style>
    #add{
     margin-top: 8px;
    }
  </style>
</style>
</head>

    
             
<body >

  <!-- preloader -->
    <div class="loader">
     <div class="inner one"></div>
     <div class="inner two"></div>
     <div class="inner three"></div>
 </div> 

 
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-8 " style="margin-top: 150px">
                <div class="login-panel panel" style="border-radius:10px; background-color:#F1EBEB; margin-top: 12px" >
                    <div class="panel-heading label-success">
                         <h2 class="panel-title text-center " style="margin-top:10px; color: #fff; font-weight: bold;"> <strong>Frut&Pão</strong> </h2> 
                       
                    </div>
                    <div class="panel-body">
                        <form action="<?= base_url();?>login/acesso" method="post">
                            <fieldset>
                                
                                     <label for="nome">Username:</label>  
                                <div class=" inputWithIcon ">
                                <input placeholder="E-mail" name="email" type="email"  required>
                                <i class="fa fa-user" ></i>
                                </div>
                                  <label for="nome">Senha:</label>
                                <div class=" inputWithIcon" >
                                <input  placeholder="Password"  id="entrad" name="password" type="password" value="" required>
                                <i class="fa fa-key" ></i>
                                </div>
                                <div id="ver" style="color:#DF3737; text-align:center; margin-bottom:10px;" class="col-md-12">
                                <div >
                            <?=  $msg; ?>
                                </div>
                                </div>
                                <br>

                                <button type="submit" class="btn btn-sm btn-primary btn-block">Login</button>
                                <a  class="btn text-danger" style="margin-top:5px" data-toggle="modal" data-target="#modal_log" >Esqueci senha Click Aqui</a>
                                <br>
                            </fieldset>
                     </form>
                    </div>
                </div>
            </div>



        </div>
    </div>
<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="mySmallModal" id="modal_log">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="margin-top:190px">
      <div class="modal-header label-success" style="height: 50px; color: white; font-weight: bold; ">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Recuperação De Senha</h5>
      </div>
      <div class="modal-body" style="background-color:#F1EBEB;">
        <div class="row padding-row">
          <div class="col-lg-9 col-md-9 col-sm-8 padding-col">
           <input type="email" class="form-control" id="id_email" name="quantia_"  placeholder="Entre o email da sua conta..." required />
          </div>
         <div class="col-lg-2 col-md-3 col-sm-4 padding-col"> 
          <button type="Button" class="btn btn-success " id="add"  onclick="recover()">
            <i class="fa fa-envelope" aria-hidden="true" ></i> Recupera</button> 
         </div>
       </div>
      </div>
   </div>
 </div>
</div>




</body>

</html>