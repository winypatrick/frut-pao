<style type="text/css">
  .azul {
    background-color: e;
    color:white;
    font-size: 12px;
  }

  .red {
    background-color: red;
    color:white;
    font-size: 12px;
  }
  .mr {
    margin-right: 5px;
  }
  .ml {
    margin-left:  5px;
  }
</style>

<script type="text/javascript" src="<?php base_url();?>/fich_jquery/loja.js"></script>
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="<?= base_url();?>/funcionario"><i class="fa fa-dashboard"></i> Home</a></li>
    
  </ol> 
  
</section>
<br><br>
<div class="container">
  <div class="row">
    <div class="col-md-1 btn-primary"></div>
    <div class="col-md-10">
      <div class="box">
       <div class="box-header with-border">
      <button class="btn btn-primary">Avaliar</button>
      <div class="box-tools pull-right" id="editar">
        <!--<button id="edit_info" class="btn btn-primary"><i class="fa fa-edit"></i></button>-->
       <!--<button class="btn btn-primary"><i class="fa fa-gear"></i></button> -->
      </div> 
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2">
          <i class="fa fa-home fa-5x " style="font-size: 120px"></i>
          </div>
        <div class="col-md-4">
           <ul id="list" class="list-unstyled ">
            
           </ul>
        </div>        
      
    </div>
       <!-- inicio -->

      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          


          <div class="box">
              <div class="box-header azul btn-primary">
                Mais Informações
              </div>
              <div class="box-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody id="list2">
                   
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
      <!-- fim -->
       <!-- inicio -->
      <br><br>
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          


          <div class="box">
              <div class="box-header azul btn-primary">
                Ultimos Turnos
              </div>
              <div class="box-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Data</th>
                      <th>Responsavel</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>1-2-1222</th>
                      <th>Ailton Mendes duarte</th>
                    </tr>
                    <tr>
                      <th>1-2-1222</th>
                     <th>Ailton Mendes duarte</th>
                    </tr>
                    <tr>
                      <th>1-2-1222</th>
                     <th>abd paulista</th>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
      <!-- fim -->
       <!-- inicio -->
      <br><br>
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          


          <div class="box">
              <div class="box-header azul btn-primary">
                Avaliação
              </div>
              <div class="box-body">
                
              </div>
            </div>
          </div>
      </div>
      <!-- fim -->
    </div>
    </div>
    </div>
  </div>
</div>

<!-- Inicio do modal criar nova loja -->
  <div class="modal fade" id="modal_loja_info">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header btn-primary">
          <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <h4 class="modal-title">Nova Loja</h4>
        </div>
        <div class="modal-body">
          <form id="form_2" action="" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-5">
                  <!-- aqui vai ficar img do home -->
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <fieldset class="form-group">
                    <input type="hidden" name="id_lojja" id="id_lojja">
                      <label for="">Localidade <spam class="text-danger">(*)</span></label>
                      <input type="text" class="form-control" id="zona" placeholder="Zona" name="zona" required>
                    </fieldset>


                      <fieldset class="form-group">
                        <label for="">Endereço <spam class="text-danger">(*)</span></label>
                        <input type="text" class="form-control" id="rua" placeholder="Endereço" name="rua" required>
                      </fieldset>
                  <fieldset class="form-group">
                    <label for="">Estado <spam class="text-danger">(*)</span></label>
                        <select id="estado" class="form-control" name="estado">
                          <option value="1">Activo</option>
                          <option value="0">Fechado</option>
                        </select>
                    </fieldset>
                  </div>
                  <div class="col-md-6">
                    <fieldset class="form-group">
                      <label for="">Data Inaugoração <spam class="text-danger">(*)</span></label>
                      <input type="date" class="form-control" id="data_i" placeholder="data" name="data_i" required>
                    </fieldset>
                    <fieldset class="form-group">
                      <label for="">Contacto <spam class="text-danger">(*)</span></label>
                      <input type="number" class="form-control" id="contacto" placeholder="contacto" name="contacto" required>
                    </fieldset>
                    <fieldset class="form-group">
                      <label for="">Data Encerramento</label>
                      <input type="date" class="form-control" id="data_E" placeholder="data" name="data_E" >
                    </fieldset>
                  </div>
                <div class="col-md-12">
                  <label for="">Descrição</label>
                  <textarea id="desc" name="desc" class="form-control" rows="4" cols="90"></textarea>
                </div>
              </div>
              <div class="modal-footer">
              <b style="" class="pull-left text-danger"><spam class="text-danger">(*)</span> - Campos com preenchimento obrigatorio</b>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Canselar</button>
              <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->