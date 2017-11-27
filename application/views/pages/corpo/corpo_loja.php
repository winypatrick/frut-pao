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
  <br>
</section>

<div class="container-fluid">
  <div class="row">
   <div class="col-md-12">
   <div class="box">
     <div class="box-header with-border ">

       <a type="button" id="add" class="fa fa-plus-circle btn btn-info btn-xs" style="" onclick="modal_loja()">Criar Loja </a>

       <div class="box-tools pull-right" >

    <div class=" inputWithIcon" >
    <input  placeholder="Pesquisar"  id="pesk_1" name="password" onkeyup=""  type="text" value="" style="width: 200px; height: 23px" required>
    <i class="fa fa-search" ></i>
    </div>
       </div>
     </div>

     <!-- box-body -->
     <div id=" " class="box-body" style="">
       <div class="row ">
         <div class="col-md-6">

           <div class="box">
             <table class="table">
               <thead>
                 <tr>
                   <th><i class="fa fa-wpforms" aria-hidden="true"></th>
                   <th>Zona</th>
                   <th>Endereço</th>
                   <th>Contacto</th>
                   <th>Ver</th>
                   <th>Ir para</th>
                 </tr>
               </thead>
               <tbody><!-- aqui sera prenxido pelo controler com ajax -->
                 <tr>
                   <td>1</td>
                   <td>Latada</td>
                   <td>Campo Baxo</td>
                   <td>2939384</td>
                   <td><button type="button" class="btn btn-default" onclick="analisar()">Analise</button></td>
                   <td><button type="button" class="btn btn-default" onclick="ir_para("corpo_info")">Detalhes</button></td>
                 </tr>
                 <tr>
                   <td>2</td>
                   <td>Latada</td>
                   <td>Campo Baxo</td>
                   <td>2939384</td>
                   <td><button type="button" class="btn btn-default" onclick="analisar()">Analise</button></td>
                   <td><button type="button" class="btn btn-default" onclick="ir_para("corpo_info")">Detalhes</button></td>
                 </tr>
                 <tr>
                   <td>3</td>
                   <td>Latada</td>
                   <td>Campo Baxo</td>
                   <td>2939384</td>
                   <td><button type="button" class="btn btn-default" onclick="analisar()">Analise</button></td>
                   <td><button type="button" class="btn btn-default" onclick="ir_para("corpo_info")">Detalhes</button></td>
                 </tr>
                 <tr>
                   <td>4</td>
                   <td>Latada</td>
                   <td>Campo Baxo</td>
                   <td>2939384</td>
                   <td><button type="button" class="btn btn-default" onclick="analisar()">Analise</button></td>
                   <td><button type="button" class="btn btn-default" onclick="ir_para("corpo_info")">Detalhes</button></td>
                 </tr>
                 <tr>
                   <td>5</td>
                   <td>Latada</td>
                   <td>Campo Baxo</td>
                   <td>2939384</td>
                   <td><button type="button" class="btn btn-default" onclick="analisar()">Analise</button></td>
                   <td><button type="button" class="btn btn-default" onclick="ir_para("corpo_info")">Detalhes</button></td>
                 </tr>
                 <tr>
                   <td>6</td>
                   <td>Latada</td>
                   <td>Campo Baxo</td>
                   <td>2939384</td>
                   <td><button type="button" class="btn btn-default" onclick="analisar()">Analise</button></td>
                   <td><button type="button" class="btn btn-default" onclick="ir_para("corpo_info")">Detalhes</button></td>
                 </tr>
                 <tr>
                   <td>7</td>
                   <td>Latada</td>
                   <td>Campo Baxo</td>
                   <td>2939384</td>
                   <td><button type="button" class="btn btn-default" onclick="analisar()">Analise</button></td>
                   <td><button type="button" class="btn btn-default" onclick="ir_para("corpo_info")">Detalhes</button></td>
                 </tr>
                 <tr>
                   <td>8</i></td>
                   <td>Latada</td>
                   <td>Campo Baxo</td>
                   <td>2939384</td>
                   <td><button type="button" class="btn btn-default" onclick="analisar()">Analise</button></td>
                   <td><button type="button" class="btn btn-default" onclick="ir_para("corpo_info")">Detalhes</button></td>
                 </tr>

               </tbody>
             </table>
           </div>


         </div>
         <div class="col-md-6">
           <div id="gra" class="box">
             <img src="im.png" width="500"  height="250" alt="">
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
                 <td><button type="button" class="btn btn-default" onclick="draw_gra()">Detalhes</button></td>
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
  </div>

  <!-- Inicio do modal criar nova loja -->
  <div class="modal fade" id="modal-loja">
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
          <form>
            <fieldset class="form-group">
              <label for="formGroupExampleInput">Zona</label>
              <input type="file" class="form-control" id="formGroupExampleInput" placeholder="Example input">
            </fieldset>
            <fieldset class="form-group">
              <label for="formGroupExampleInput">Zona</label>
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
            </fieldset>
            <fieldset class="form-group">
              <label for="formGroupExampleInput2">Rua</label>
              <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
            </fieldset>
            <fieldset class="form-group">
              <label for="formGroupExampleInput2">Data Inaugoração</label>
              <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
            </fieldset>
            <fieldset class="form-group">
              <label for="formGroupExampleInput2">Contacto</label>
              <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
            </fieldset>
            <fieldset class="form-group">
              <label for="formGroupExampleInput2">Estato</label>
                  <select class="" name="estado">
                    <option value="1">Activo</option>
                    <option value="0">Fechado</option>
                  </select>
              </optgroup>
            </fieldset>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Canselar</button>
          <button type="button" class="btn btn-primary">Confirmar</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div>
