
    <!-- Content Header (Page header) -->
    <section class="content-header">
   <!--  tituo -->
       <!-- <h1>
        Fruto&Pão
        <small> Africa Business</small>
             </h1> -->
      <ol class="breadcrumb">
        <li><a href="<?= base_url();?>funcionario"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Loja</li>
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
              <span class="info-box-number">20</span>
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
              <span class="info-box-number">41,410</span>
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
              <span class="info-box-number">760</span>
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
              <span class="info-box-number">90</span>
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
              <h3 class="box-title">Lojas</h3>
              
              <a type="button" class="fa fa-plus-circle btn" data-toggle="modal" data-target="#modal_loja"></a>
              

              <div class="box-tools pull-right">
             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>

               </button>

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

       
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

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

 


<!-- ********************************************modal loja************************************** -->
        <div class="col-md-12 modal fade " id="modal_loja" >
        <div  class="modal-dialog modal-lg ">
        <div id="myModal" class="modal-content " >
         <form action="" id="form" method="post">
            <div class="modal-header label-info">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><strong>Informação de lojas</strong> </h4>
            </div>

            <div class="modal-body">
            
               <div class="col-md-4">
            <div class="form-group">
            <label for="antiga">endereço de loja:</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digita nome completo " required>
            </div> 
            </div>

             <div class="col-md-4">
            <div class="form-group">
            <label for="dt">Data de Abertura :</label>
            <div class="input-group " >
            <input type="text" class="form-control" name="date" id="datetimepicker1">
            <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
            </div>
            </div> 
            </div>

            <div class="col-md-4">
            <div class="form-group">
            <label for="dt">N° tel:</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="N° telefone " required>
            </div>  
            </div>



            

          
           
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

 <script>
    $(function (){

    $('#datetimepicker1').datepicker("setDate", new Date());
   
   });
 </script>