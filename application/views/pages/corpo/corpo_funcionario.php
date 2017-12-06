 
 <!-- chamado  -->
<script src="<?php echo base_url(); ?>fich_jquery/funcionario.js"></script> 



 <!-- Content Header (Page header) -->
    <section class="content-header">
   <!--  tituo -->
       <!-- <h1>
        Fruto&Pão
        <small> Africa Business</small>
             </h1> -->
      <ol class="breadcrumb">
        <li><a href="<?= base_url();?>funcionario"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Funcionario</li>
      </ol>
      <br>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
      
       <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box  hvr-grow">
            <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Funcionarios</span>
              <span class="info-box-number" id="n_func"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box  hvr-grow">
            <span class="info-box-icon bg-red"><i class="fa fa-cubes"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Armazem </span>
              <span class="info-box-number">___</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box  hvr-grow">
            <span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">vendas</span>
              <span class="info-box-number">___</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
         <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box  hvr-grow">
            <span class="info-box-icon bg-aqua"><i class="fa fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Relatorios</span>
              <span class="info-box-number">___</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
             <!--  <h3 class="box-title">Funcionarios</h3> -->
              
             <!--  <a type="button"  class="fa fa-plus-circle btn" data-toggle="modal" data-target="#myModal"></a> -->

           <!--    <a type="button" id="adicionar" class="fa fa-plus-circle btn btn-primary btn-xs" style="display: none;  "> Novo </a> -->
                                    <!-- ou -->

              <a type="button" class="btn btn-primary btn-sm"  id="adicionar" style="display: none;">
              <i class="fa fa-plus-circle fa-lg"></i> Novo</a>

              <div class="box-tools pull-right">
             <span type="button" class="btn btn-box-tool" ><i class="fa fa-minus"></i>

               </span>

          <!--      <div class="btn-group">
          <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-wrench"></i></button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
                         </div> -->
               <!--  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            
            <!-- box-body -->
            <div class="box-body">
            
              <table class="table table-striped table-condensed " id="tabl">
                                  <thead id="thead1">
                                 <th>Nome  (Detalhes)</th>
                                 <th  style="width: 17%">Morada</th>
                                 <th>Função</th> 
                                 <th>Email</th> 
                                 <th>Contacto</th>
                                 <th >Acesso</th> 
                                 <th id="edit_del" style="display: none;">Edit | Delete</th> 
                                 
                                     </thead>
                                     <tbody >
                                      
                                     </tbody>

                            <tfoot>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th style="display: none;"></th>
                              <th style="display: none;"></th>
                              <th style="display: none;"></th>
                            </tr>
                            </tfoot>

                                </table>
           

            </div>
           <!-- ./box-body -->


            <!-- box-footer -->
            <div class="box-footer">
        
            </div>
            <!-- /.box-footer -->
       
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


<div class="col-sm-12">
   <!--  ******************************************* modal_ cliente ********************************************* -->
 <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="modal_funcionario" >
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" >
    
    <form action="" method="post" enctype='multipart/form-data'>
      <div class="modal-header label-info">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><strong>Info Funcionario</strong> </h4>

        <input type="hidden" id="id_cl" name="id_cliente" >
        </div>
            <div class="modal-body">
            <div class="" >
                 <div style="text-align:center ; margin-bottom: 10px;" >
      
               <div class='input-wrapper'>
                  
               <label for='input-fil'>
               <img type="file" id="olho"  src="<?= base_url();?>fich_compente/winy.png" class=" img-responsive img-rounded hvr-pulse-grow" alt="" style="height:190px; width:100%">
               </label>
               <input id='input-fil' name="photo"  type='file' value='' accept="image/*" />
               <span id='file-nam'></span>
               </div>
         </div>
            <div class="caption ">
            <p><strong>Data Nascimento:</strong> <span id="dn"></span></p>
            <p ><strong>N° BI:</strong> <span id="nb"></span>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;   <strong>N° NIF:</strong> <span id="nn"></span></p>
            <p></p>
            <p><strong>Sexo:</strong> <span id="sx"></span></p>
            <p><strong>Data Inicio Contrato:</strong> <span id="di"></span></p>
            <p><strong>Data Fim Contrato:</strong> <span id="df"></span></p>
            <br>

     <label for="" >Descricao de funcionario:</label>
      <p id="detalh" style="border-color: #B3A8A8; border-width: 1px; border-left: 0px; border-right: 0px; border-top: 1px; font-weight: bold; border-style: solid; text-align: justify; size: 9px; border-radius: 4px"> <span id="decrib">Detalhes</span></p>
         
            <a onclick="detalhes()" style="float: right; margin-top: 10px">
              <i id="icon" class="fa fa-chevron-circle-down "></i></a>
              <br> 
            </div>
            <!-- <button type="submit" class="btn btn-primary btn-sm btn-block"> Altera Foto </button> -->
            </div>
            
            </div>
            

         </form>

    </div>
  </div>
</div>
<!-- ***************************************************************************************************** -->


       <!-- ********************************************modal funcionario************************************** -->
        <div class="col-md-12 modal fade " id="myModal"  >
        <div  class="modal-dialog modal-lg " style="margin-top: 53px">
        <div id="myModal" class="modal-content " >
         <form action="" id="form" method="post" enctype='multipart/form-data'>
            <div class="modal-header label-info">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><strong>Informação relevantes</strong> </h4>
            </div>

            <div class="modal-body">
             <input type="hidden" id="id_f" name="id_funcionario" >

            <fieldset>
              
                <div class="col-md-2">
                <div class='input-wrapper' >
                <br>
               <label for='input-fil'>
               <img type="file" id="look"  src="<?= base_url();?>fich_compente/winy.png" class=" img-responsive img-rounded hvr-pulse-grow" alt="" style="height:109px; width:150%;" >
               </label>
               <input id='input-file_' name="photo"  type='file' value='' accept="image/*" />
               <span id='file-name_'></span>
               </div>
              </div>

               <div class="col-md-4">
            <div class="form-group">
            <label for="antiga">Nome de Funcionario :</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digita nome do funcionario" >
            </div>
              </div>
            

          <div class="col-md-3">
            <div class="form-group">
            <label for="dt">Data de Nascimento:</label>
            <div class="input-group " >
            <input type="text" class="form-control" placeholder="Data nascimento" name="datetimepicker1" id="datetimepicker1">
            <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
            </div>
            </div> 
            </div>

             <div class="col-md-3">
            <div class="form-group">
            <label for="nova">Sexo :</label>
            <select id="selecao" class="form-control" name="selecao" >
                <option value="1" selected="selected" disabled>Escolhe um</option>
                <option value="M" class="fa fa-mars">Masculino</option>
                <option value="F" class="fa fa-venus">Feminino</option>
            </select>
            </div> 
            </div>

            <div class="col-md-2">
            <div class="form-group">
            <label for="nova">Morada :</label>
            <input type="text" class="form-control" id="morada" name="morada"  placeholder="Digite Morada" >
            </div> 
            </div>

            
            <div class="col-md-2">
            <div class="form-group">
            <label for="nova">BI :</label>
            <input type="text" class="form-control" id="bi_" name="bi_"  placeholder="Digite BI" >
            </div> 
            </div>

            <div class="col-md-2">
            <div class="form-group">
            <label for="nova">NIF :</label>
            <input type="text" class="form-control" id="nif" name="nif"  placeholder="Digite NiF" >
            </div> 
            </div>


            <div class="col-md-4">
            <div class="form-group">
            <label for="nova">E-mail :</label>
            <input type="email" class="form-control" id="email" name="email"  placeholder="Digita email do funcionario" >
            </div> 
            </div>


            <div class="col-md-12">
              
            <hr>
            </div>


             <div class="col-md-3">
            <div class="form-group">
            <label for="preco">Nº Telemovel</label>
            <div class="input-group">
            <div class="input-group-addon">+(238)</div>
            <input type="text" class="form-control" id="number" name="number"  placeholder="Digite numero Telemovel" >
            </div>
            </div> 
            </div>
                     

            <div class="col-md-3">
             <div class="form-group">
            <label for="dt">Data de inicio-Contrato :</label>
                <div class="input-group " >
            <input type="text" class="form-control" placeholder="Data de in/ contrato" name="datetimepicker2" id="datetimepicker2" >
            <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
            </div>
            </div>
            </div>


             <div class="col-md-3">
             <div class="form-group">
            <label for="dt">Data de Fim-Contrato :</label>
                <div class="input-group " >
            <input type="text" class="form-control" name="datetimepicker3" id="datetimepicker3" placeholder="Data de fin/ contrato" required>
            <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
            </div>
            </div>
            </div>
            

            <div class="col-md-3" >
            <div class="form-group">
            <label for="for">Funcão a Desempenhar:</label>
            <select id="funcao" class="form-control" name="funcao" >
                <option value="1" selected="selected" disabled>Escolhe um</option>
                <option value="Responsavel">Responsavel</option>
                <option value="Assistente">Assistente</option>
            </select>
            </div> 
            </div>
            
            <div class="col-md-12">
            <div class="form-group">
            <label for="desc">Descricao de  funcionario:</label>
            <textarea class="form-control" name="des" id="des" rows="3"></textarea>
            <!-- <input rows="5"  type="" class="form-control" id="conferir" name="conferir" onkeyup="checarsenha()" placeholder="Digita novamente " required> -->
            </div> 
           </div>



             <!-- sprimenta de time <div class="col-md-6">
                       <div class="form-control-wrapper">
                         <input type="text" id="time" class="form-control floating-label" placeholder="Time">
                       </div>
                     </div> -->

           </fieldset>
           </div>
              <div class="col-md-12" id="feed">
               
             </div> 
           

          
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="submit" id="send" class="btn btn-primary" >Guardar</button>
                </div>
</form>
     </div>
     </div>
     </div>
 <!-- ******************************************************************************************************* -->  



</div>


      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
       
          <div class="row">
            <div class="col-md-6">
           
            </div>
            <!-- /.col -->

            <div class="col-md-6">
             
                </div>
                <!-- /.box-body -->
               <!--  <div class="box-footer text-center">
                 <a href="javascript:void(0)" class="uppercase">View All Users</a>
               </div> -->
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

            </div>
          
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->


