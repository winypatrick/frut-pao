<style media="screen">
  section {
    margin-bottom: 2%;
  }
</style>

<script type="text/javascript" src="<?php base_url();?>/fich_jquery/loja.js"></script>
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="<?= base_url();?>funcionario"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Loja</li>
  </ol>
  <br>
</section>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
         <!--  <h3 class="box-title">Funcionarios</h3> -->

         <!--  <a type="button"  class="fa fa-plus-circle btn" data-toggle="modal" data-target="#myModal"></a> -->
          <a type="button" id="adicionar" class="fa fa-plus-circle btn btn-primary btn-xs" style="display: none;  "> Novo </a>


          <div class="box-tools pull-right">
         <span type="button" class="btn btn-box-tool" ><i class="fa fa-minus"></i>

         </span>
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
  </div>
  <div class="row ">
    <div class="col-md-6">

    </div>
    <div class="col-md-6">

    </div>
  </div>
  <!-- Inicio do modal criar nova loja -->
  <div class="modal fade" id="modal-1">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times; ba bal</span>
            <span class="sr-only">Close</span>
          </button>
          <h4 class="modal-title">Nova Loja</h4>
        </div>
        <div class="modal-body">
          <form>
            <fieldset class="form-group">
              <label for="formGroupExampleInput">Example label</label>
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
            </fieldset>
            <fieldset class="form-group">
              <label for="formGroupExampleInput2">Another label</label>
              <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
            </fieldset>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Confirmar</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div>
