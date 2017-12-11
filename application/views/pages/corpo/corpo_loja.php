<style media="screen">
.afasta {
  margin-left: 5%;
}
.longe {
  margin-left: 10%;
}
 
</style> 

<script type="text/javascript" src="<?php echo base_url();?>/fich_jquery/loja.js"></script>
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="<?= base_url();?>funcionario"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Loja</li>
  </ol>
  
</section>
<br>
<br>
<div class="container-fluid">
  <div class="row">
   <div class="col-md-12">
   <div class="box">
     <div class="box-header with-border ">
      <a type="button" class="btn btn-primary btn-sm"  id="add" >
              <i class="fa fa-plus-circle fa-lg"></i> Criar loja</a>
      
             <div class="box-tools pull-right" >
       </div>
     </div> 
     <!-- box body -->
     <div id=" " class="box-body" >
       <div class="row ">
         <div class="col-md-6">

           <div class="box">
             <table class="table table-striped table-condensed " id="tab22">
               <thead>
                 <tr>
                   <th>Zona</th>
                   <th>Endereço</th>
                   <th>Contacto</th>
                   <th>Ver</th>
                   <th>Ir para</th>
                 </tr>
               </thead>
               <tbody><!-- aqui sera prenxido pelo controler com ajax -->


               </tbody>
             </table>
           </div>


         </div>
         <div class="col-md-6">
           <div id="gra" class="box">
             <img src="<?= base_url();?>fich_compente/im.png" width="500"  height="250" alt="">
           </div>
           <table class="table">
             <thead>
               <tr>
                 <th>Ranking</th>
                 <th>Zona</th>
                 <th>Relatorios novos</th>
                 <th>Caixa</th>
                 <th>Ver</th>
               </tr>
             </thead>
             <tbody>
               <tr>
                 <td>1º</td>
                 <td>Fazenda</td>
                 <td>2</td>
                 <td>30.000</td>
                 <td><button type="button" class="btn btn-default" onclick="draw_graphic()">Detalhes</button></td>
               </tr>
               <tr>
                 <td>2º</td>
                 <td>Achada S. Antonio</td>
                 <td>2</td>
                 <td>22.000</td>
                 <td><button type="button" class="btn btn-default" >Detalhes</button></td>
               </tr>
               <tr>
                 <td>3º</td>
                 <td>São Domingos</td>
                 <td>2</td>
                 <td>18.000</td>
                 <td><button type="button" class="btn btn-default">Detalhes</button></td>
               </tr>
             </tbody>
           </table>
         </div>
       </div>
     </div>
       <div class="box-footer">
         
       </div>
      </div>
    </div>
  </div>
</div>

  <!-- Inicio do modal criar nova loja -->
  <div class="modal fade" id="modal_loja">
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
          <form id="form_1" action="" method="post" enctype="multipart/form-data">
                          <div class="row">
                <div class="col-md-12">
                  <!-- imagem -->
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <fieldset class="form-group">
                      <label for="">Localidade <spam class="text-danger">(*)</span></label>
                      <input type="text" class="form-control" id="zona" placeholder="Zona" name="zona" required>
                    </fieldset>


                      <fieldset class="form-group">
                        <label for="">Endereço <spam class="text-danger">(*)</span></label>
                        <input type="text" class="form-control" id="rua" placeholder="Endereço" name="rua" required>
                      </fieldset>
                  <fieldset class="form-group">
                    <label for="">Estado <spam class="text-danger">(*)</span>)</label>
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
              <b style="" class="pull-left text-danger">(*) - Campos com preenchimento obrigatorio</b>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
