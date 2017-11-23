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

       <a type="button" id="add" class="fa fa-plus-circle btn btn-info btn-xs" style="" onclick="modal_loja()">Adicionar Loja </a>

       <div class="box-tools pull-right" >

    <div class=" inputWithIcon" >
    <input  placeholder="search"  id="pesk_1" name="password" onkeyup=""  type="text" value="" style="width: 200px; height: 23px" required>
    <i class="fa fa-search" ></i>
    </div>
       </div>
     </div>

     <!-- box-body -->
     <div id=" " class="box-body" style="">
       <div class="row ">
         <div class="col-md-6">
           <div class="box">
             <div class="box-header with-border">
               <i class="fa fa-wpforms" aria-hidden="true"></i>
               <b class="afasta"> <span id="lojaLocal">Fazenda</span> </b>
               <b class="afasta"> <span id="lojaRua">rua abilio cabral</span> </b>
               <b class="longe"> <span id="lojaContacto">2640987</span> </b>
               <div class="box-tools pull-right">
                 <button type="button" class="btn btn-default" onclick="insert_loja()">Detalhes</button>
               </div>
             </div>
           </div>
           <div class="box">
             <div class="box-header with-border">
               <i class="fa fa-wpforms" aria-hidden="true"></i>
               <b class="afasta"> <span id="lojaLocal">Fazenda</span> </b>
               <b class="afasta"> <span id="lojaRua">rua abilio cabral</span> </b>
               <b class="longe"> <span id="lojaContacto">2640987</span> </b>
               <div class="box-tools pull-right">
                 <button type="button" class="btn btn-default">Detalhes</button>
               </div>
             </div>
           </div>
           <div class="box">
             <div class="box-header with-border">
               <i class="fa fa-wpforms" aria-hidden="true"></i>
               <b class="afasta"> <span id="lojaLocal">Fazenda</span> </b>
               <b class="afasta"> <span id="lojaRua">rua abilio cabral</span> </b>
               <b class="longe"> <span id="lojaContacto">2640987</span> </b>
               <div class="box-tools pull-right">
                 <button type="button" class="btn btn-default">Detalhes</button>
               </div>
             </div>
           </div>
           <div class="box">
             <div class="box-header with-border">
               <i class="fa fa-wpforms" aria-hidden="true"></i>
               <b class="afasta"> <span id="lojaLocal">Fazenda</span> </b>
               <b class="afasta"> <span id="lojaRua">rua abilio cabral</span> </b>
               <b class="longe"> <span id="lojaContacto">2640987</span> </b>
               <div class="box-tools pull-right">
                 <button type="button" class="btn btn-default">Detalhes</button>
               </div>
             </div>
           </div>
           <div class="box">
             <div class="box-header with-border">
               <i class="fa fa-wpforms" aria-hidden="true"></i>
               <b class="afasta"> <span id="lojaLocal">Fazenda</span> </b>
               <b class="afasta"> <span id="lojaRua">rua abilio cabral</span> </b>
               <b class="longe"> <span id="lojaContacto">2640987</span> </b>
               <div class="box-tools pull-right">
                 <button type="button" class="btn btn-default">Detalhes</button>
               </div>
             </div>
           </div>
         </div>
         <div class="col-md-6">
           <div class="box">
             <img src="im.png" width="500"  height="200" alt="">
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
                 <td><button type="button" class="btn btn-default">Detalhes</button></td>
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
