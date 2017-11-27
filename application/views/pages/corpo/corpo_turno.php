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
    <section class="content-fluid">
         <div class="row">
          <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border ">

              <!-- <a type="button" id="add" class="fa fa-plus-circle btn btn-info btn-xs" style="" onclick="modal_turno()"> Novo Turno </a> -->
              <!-- ou -->
              <a type="button" id="add" class="btn btn-info btn-sm" style="" onclick="modal_turno()">
              <i class="fa fa-plus-circle fa-lg"></i> Novo Turno</a>


              <div class="box-tools pull-right" >

           <div class=" inputWithIcon" >
           <input  placeholder="search"  id="pesk_1" name="password" onkeyup=""  type="text" value="" style="width: 200px; height: 23px" required>
           <i class="fa fa-search" ></i>
           </div>
              </div>
            </div>

            <!-- box-body -->
            <div id=" " class="box-body" style="">
<<<<<<< HEAD

            </div>
=======
            
            <div class="col-xs-2 hvr-glow" style="text-align: center; font-size:10px; border:2px double; border-color:#161818; border-left: 0px; border-right: 0px; border-top: 0px; border-radius: 20px; margin-right: 8px"><img src="http://localhost/frut&pao/fich_compente/turno_.png" style="height:130px; width:100%"  class="img-rounded" alt="curso"><div class="caption"  style="text-align: center;"><p style="float: left;" > <a class="fa fa-info-circle fa-lg btn text-info  hvr-pop" style="font-size: 17px"></a> </p><p style="float: right;"> <a class="fa fa-book fa-lg btn text-info  hvr-pop text-info" style="font-size: 17px"></a> </p></div></div>

             <div class="col-xs-2 hvr-glow" style="text-align: center; font-size:10px; border:2px double; border-color:#161818; border-left: 0px; border-right: 0px; border-top: 0px; border-radius: 20px"><img src="http://localhost/frut&pao/fich_compente/turno_.png" style="height:130px; width:100%"  class="img-rounded" alt="curso"><div class="caption"  style="text-align: center;"><p style="float: left;" > <a class="fa fa-info-circle fa-lg btn text-info  hvr-pop" style="font-size: 17px"></a> </p>    <p style="float: right;"> <a class="fa fa-book fa-lg btn text-info  hvr-pop text-info" style="font-size: 17px"></a> </p></div></div>


 </div>

>>>>>>> d5ea6e722b41308b19fbc04dd400356807eddb34
           <!-- ./box-body -->


            <!-- box-footer -->
            <div class="box-footer">


            <!-- /.box-footer -->

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

                                <thead id="thead11">
                                 <th> Nome</th>
<<<<<<< HEAD
                                 <th style="width: 15%;"> Função</th>
                                 <th style="width: 20%"> Loja </th>
                                 <th style="width: 10%"> Data</th>
                                 <th style="width: 6%"> Periodo</th>
                                 <th style="width: 10%"> Hora Entrada</th>
                                 <th style="width: 10%"> Hora Saida</th>
=======
                                 <th style="width: 15%;"> Função</th> 
                                 <th style="width: 17%"> Loja </th> 
                                 <th style="width: 10%"> Data</th>
                                 <th style="width: 6%"> Periodo</th>
                                 <th style="width: 10%"> Hora /E</th>
                                 <th style="width: 10%"> Hora /S</th> 
>>>>>>> d5ea6e722b41308b19fbc04dd400356807eddb34
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

                </div>

     </div>
     </div>
     </div>
     </div>
<!-- ====================================================[ end modal truno]================================================= -->

     <div class="col-sm-12">
 <!--  ******************************************* modal_ cliente ********************************************* -->

        <div class="col-md-12 modal fade " id="modal_pick"  >
        <div  class="modal-dialog modal-xs">
        <div id="myModal" class="modal-content " style="margin-top: 200px" >
            <div class="modal-header label-info">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><strong>Hora Entrada / Saida</strong> </h4>
                <input type="hidden" id="id_user_" name="id_cliente" >
            </div>

            <div class="modal-body">
<<<<<<< HEAD

            <div class="col-xs-4">
            <div class="form-group">
            <label for="antiga">Nome :</label>
            <input type="text" class="form-control" id="nome_" name="nome_" placeholder="Digita nome completo " required>
            </div>
            </div>

            <div class="col-xs-4">
            <div class="form-group">
            <label for="antiga">Função :</label>
            <select id="funcao_" class="form-control" name="funcao_" >
                <option value="1" selected="selected" disabled class="text-info">Escolhe um das:</option>
                <option id="assis" value="Assistente">Assistente</option>
                <option id="respons" value="Responsavel">Responsavel</option>
            </select>
            </div>
            </div>

            <div class="col-xs-4">
            <div class="form-group">
            <label for="dt">Data :</label>
            <div class="input-group " >
            <input type="text" class="form-control" name="data_" id="data_">
            <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
            </div>
            </div>
=======
            
            <div class="col-xs-6">
            <div class="form-group">
            <label for="antiga">Nome :</label>
            <input type="text" class="form-control" id="nome_" name="nome_" placeholder="Digita nome completo " disabled>
            </div> 
>>>>>>> d5ea6e722b41308b19fbc04dd400356807eddb34
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

<<<<<<< HEAD
            <div class="col-xs-4">
            <div class="form-group">
            <label for="antiga">Loja :</label>
            <select id="loja_" class="form-control" name="loja_" >
                <option value="1" selected="selected" disabled>Escolhe um</option>
                <option value="Fazenda">Loja frut&pao, Fazenda </option>
                <option value="Achada grande">Loja frut&pao, Achada grande </option>
                <option value="S.domingos">Loja frut&pao, S.domigos </option>
            </select>
            </div>
            </div>

             <div class="col-xs-2">
            <div class="form-group">
            <label for="antiga">Periodo :</label>
            <select id="periodo_" class="form-control" name="periodo_" >
                <option value="0" selected="selected" disabled>Escolhe um</option>
                <option value="1">1 °</option>
                <option value="2">2 °</option>
           </select>
            </div>
            </div>
            <hr>
             <div class="col-xs-12">
            <div class="form-group">
            <label for="desc">Descricão da Situação:</label>
            <textarea class="form-control" name="des" id="desrib_" rows="2" name="describb_"></textarea>
            <!-- <input rows="5"  type="" class="form-control" id="conferir" name="conferir" onkeyup="checarsenha()" placeholder="Digita novamente " required> -->
            </div>
           </div>
           </fieldset>
=======
>>>>>>> d5ea6e722b41308b19fbc04dd400356807eddb34
           </div>

            <div class="modal-footer">
                <button  class="btn btn-primary" onclick="picar_hora()"> Pick </button>
                </div>

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
