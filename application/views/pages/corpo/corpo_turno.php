<script src="<?php echo base_url(); ?>fich_jquery/turno.js"></script> 

 <!-- Content Header (Page header) -->
    <section class="content-header">
   <!--  tituo -->
       <!-- <h1>
        Fruto&Pão
        <small> Africa Business</small>
             </h1> -->
      <ol class="breadcrumb">
        <li><a href="<?= base_url();?>funcionario"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Turno</li>
      </ol>
      <br>
    </section>

    <!-- Main content -->
    <section class="content">
   <!-- Info boxes -->
    <!--   <div class="row">
    
     <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box  hvr-grow">
          <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
    
          <div class="info-box-content">
            <span class="info-box-text">Funcionarios</span>
            <span class="info-box-number">20</span>
          </div>
          /.info-box-content
        </div>
        /.info-box
      </div>
      /.col
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box  hvr-grow">
          <span class="info-box-icon bg-red"><i class="fa fa-cubes"></i></span>
    
          <div class="info-box-content">
            <span class="info-box-text">Armazem </span>
            <span class="info-box-number">41,410</span>
          </div>
          /.info-box-content
        </div>
        /.info-box
      </div>
      /.col
    
      fix for small devices only
      <div class="clearfix visible-sm-block"></div>
    
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box  hvr-grow">
          <span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>
    
          <div class="info-box-content">
            <span class="info-box-text">vendas</span>
            <span class="info-box-number">760</span>
          </div>
          /.info-box-content
        </div>
        /.info-box
      </div>
      /.col
      
       <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box  hvr-grow">
          <span class="info-box-icon bg-aqua"><i class="fa fa-book"></i></span>
    
          <div class="info-box-content">
            <span class="info-box-text">Relatorios</span>
            <span class="info-box-number">90</span>
          </div>
          /.info-box-content
        </div>
        /.info-box
      </div>
      /.col
    </div>
    /.row -->

         <div class="row">
          <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border ">

              <!-- <a type="button" id="add" class="fa fa-plus-circle btn btn-info btn-xs" style="" onclick="modal_turno()"> Novo Turno </a> -->
              <!-- ou -->
           <!--    <a type="button" id="add" class="btn btn-info btn-sm" style="" onclick="modal_turno()">
           <i class="fa fa-plus-circle fa-lg"></i> Novo Turno</a> -->
              <a type="button" id="list_n" class="btn btn-sm active"  >
              <i class=" fa fa fa-table fa-lg label-info"></i></a>

               <a type="button" id="list_a" class="btn btn-sm" style="display: none;" >
              <i class=" fa fa-list fa-lg label-info"></i></a>

              <div class="box-tools pull-right" >

           <div class=" inputWithIcon " id="pacote_pesk_1">
           <input  placeholder="search"  id="pesk_1" name="password" onkeyup="pesquisa_turnos()"  type="text" value="" style="width: 200px; height: 23px" required>
           <i class="fa fa-search" ></i> 
           </div>

             <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
               </button> -->

              </div>
            </div>
            
            <!-- box-body -->
            <div id="lista_loja_turn" class="box-body" style="padding-left: 20px">
            

 </div>

           <!-- ./box-body -->


            <!-- box-footer -->
            <div id="pag_link" class="box-footer" style="text-align: center;">
            

          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
       </div>

      </div>
      <!-- /.row -->


<!-- ====================================================[ modal Turno ]================================================= -->
      <div class="col-md-12">
        <div class="col-md-12 modal fade " id="modal_turno"  >
        <div  class="modal-dialog modal-lg " style="margin-top:30px; width: 80%">
        <div id="myModal" class="modal-content " >
            <div class="modal-header" style="height: 9px">
                <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">  <!-- init -->

                <div class="row">
          <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border label-success">
              <span class="box-title" style="font-size: 14px" >Funcionarios Disponivel</span>

              <div class="box-tools pull-right" >

           <div class=" inputWithIcon" >
           <input  placeholder="search"  id="pesk" name="password" onkeyup="pesquisa()"  type="text" value="" style="width: 200px; height: 23px" required>
           <i class="fa fa-search" ></i> 
           </div>

             <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
               </button> -->

              </div>
            </div>
            
            <!-- box-body -->
            <div id="list_funcionarios_disponivel" class="box-body " style="height: 200px; overflow: auto;">
            

            </div>
           <!-- ./box-body -->


          <!-- /.box -->
        </div>
        <!-- /.col -->
       </div>

          <div class="col-md-12">
          <div class="box">
          <div class="box-header with-border label-warning">
          <span class="box-title" style="font-size: 14px">Turnos Formados</span>
              
         
              <div class="box-tools pull-right">
             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>

               </button>

              </div>
            </div>

            <!-- box-body -->
            <div class="box-body">
            
             <table class="table table-striped table-condensed " id="tab11">

                                <thead id="thead11" >
                                 <th> Nome</th>
                                 <th style="width: 15%;"> Função</th> 
                                 <th style="width: 17%"> Loja </th> 
                                 <th style="width: 10%"> Data</th>
                                 <th style="width: 6%"> Periodo</th>
                                 <th style="width: 10%"> Hora /E</th>
                                 <th style="width: 10%"> Hora /S</th> 
                                 <th> Edit &nbsp;|&nbsp; Deleta</th>
                                 </thead>

                                     <tbody >
                                      
                                     </tbody>

                                     <tfoot>
                                    <tr>
                                      <th></th>
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


            </div>
            <!-- /.box-footer -->
       
          </div>
          <!-- /.box -->

      </div>
      <!-- /.row -->

            </div><!--  fim -->

            <div class="modal-footer"> 

            <button  class="btn btn-danger" onclick="relatorio()"> Finalizar turno </button>

            </div>

     </div>
     </div>
     </div>
     </div>
<!-- ====================================================[ end modal truno]================================================= -->



<!-- ====================================================[ modal informacao turno antigas ]============================================= -->
        <div class="col-md-12 modal fade " id="modal_info_turno"  >
        <div  class="modal-dialog modal-xs " style="margin-top:60px; border-radius: 9px; border: solid; border-color: #BBE8EB" >
          <div id="modal_info_turno" class="modal-content" >

   
          <div class="box">
            <div class="box-header with-border label-info">
              <span class="box-title" style="font-size: 15px; font-weight: bold; " id="titulo_info_turno"></span>

              <div class="box-tools pull-right" >

            <button type="button " class="close" data-dismiss="modal">&times;</button>

            </div>

            </div>
            
            <div id="adiciona_funcionario" class="box-body" style="height: 160px;  ">


            </div>

        </div>


            <div class="modal-footer"> 
           
               </div> 

     </div>
     </div>
     </div>
<!-- ====================================================[ end modal informacao de turno]================================================ -->


     <div class="col-sm-12">
 <!--  ******************************************* modal_ cliente ********************************************* -->

        <div class="col-md-12 modal fade " id="modal_pick"  >
        <div  class="modal-dialog modal-xs">
        <div id="myModal" class="modal-content hvr-wobble-skew" style="margin-top: 200px" >
        <div class="modal-header label-info">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><strong>Hora Entrada / Saida</strong> </h4>
                <input type="hidden" id="id_user_" name="id_cliente">
        </div>

            <div class="modal-body">
            
            <div class="col-xs-6">
            <div class="form-group">
            <label for="antiga">Nome :</label>
            <input type="text" class="form-control" id="nome_" name="nome_" placeholder="Digita nome completo " disabled>
            </div> 
            </div>

            <div class="col-xs-3">
            <div class="form-group">
            <label for="dt">Hora Entrada :</label>
            <div class="input-group " >
            <input type="text" class="form-control" name="hora_entrada_" id="hora_entrada_" style="background: #B4F3B4">
            <div class="input-group-addon"><i class="fa fa-clock-o fa-lg"></i></div>
            </div>
            </div> 
            </div>

            <div class="col-xs-3">
            <div class="form-group">
            <label for="dt">Hora Saida :</label>
            <div class="input-group " >
            <input type="text" class="form-control" name="hora_saida_" id="hora_saida_" style="background: #F37777">
            <div class="input-group-addon"><i class="fa fa-clock-o fa-lg"></i></div>
            </div>
            </div> 
            </div>

           </div>
          
            <div class="modal-footer">
                <button  class="btn btn-primary" onclick="picar_hora()"> Pick </button>
                </div>

     </div>
     </div>
     </div>
 <!-- ******************************************************************************************************* -->  
     </div>

<!-- ====================================================[ modal Relatorio ]================================================= -->
      <div class="col-md-12">
        <div class="col-md-12 modal fade " id="modal_relatorio"  >
        <div  class="modal-dialog modal-lg " style="margin-top:10px; width: 58%; border-radius: 10px">
        <div id="myModal" class="modal-content " >
           
          <div class="box">

           <div class="box-header with-border label-primary">
            <span class="box-title" style="font-size: 15px; font-weight: bold; ">Relatorio turno</span>
            <div class="box-tools pull-right" >
            <button type="button " class="close" data-dismiss="modal">&times;</button>
            </div>
            </div>
            
            <!-- box-body -->
            <div  class="box-body " >
            
            <div class="col-md-12">
            <div class="form-group">
            <label for="desc">Congelado:</label>
            <textarea class="form-control label-default" name="des" id="des" rows="4" style="border-radius: 10px"></textarea>
            </div> 
           </div>

           <br>

           <div class="col-md-12">
            <div class="form-group">
            <label for="desc">Frescos/Padaria:</label>
            <textarea class="form-control label-default" name="des" id="des" rows="4" style="border-radius: 10px"></textarea>
            </div> 
           </div>

           <br>

           <div class="col-md-12">
            <div class="form-group">
            <label for="desc">Stock/Armazem:</label>
            <textarea class="form-control label-default" name="des" id="des" rows="4" style="border-radius: 10px"></textarea>
            </div> 
           </div>

           <br>

           <div class="col-md-12">
            <div class="form-group">
            <label for="desc">Caixa/Equipamentos:</label>
            <textarea class="form-control label-default" name="des" id="des" rows="4" style="border-radius: 10px"></textarea>
            </div> 
           </div>
           
           <div class="modal-footer">
            <button  class="btn btn-primary" onclick=""> Confirma </button>
            </div>

            </div>
           <!-- ./box-body -->


          <!-- /.box -->
        </div>
        <!-- /.col -->

     </div>
     </div>
     </div>
     </div>
<!-- ====================================================[ modal Relatorio end]================================================= -->



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


