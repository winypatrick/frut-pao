<style media="screen">
  section {
    margin-bottom: 2%;
  }
  .panel-body {
    margin: 0;
    padding: 0;
  }
  .panel-terra {
    border:0;
    background-color: #d7d9d8;
  }
  .terra-cor {
    background-color: #4db438;
  }
  .terra-link:hover {

    cursor: pointer;
    border-bottom-style: outset;
    border-bottom-color: #223636;
  }

  .box {
    padding-bottom: ;
  }
  .afasta {
    margin-left: 5%;
  }
  .afastah {
    margin-left: 30%;
  }
  .longe {
    margin-left: 10%;
  }
  .link:hover {

  }
  .link:visited {
    color: grey;
}
.link:link {
    color: green;
}
.btn {
  color: white;
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
      <nav class="navbar navbar-light bg-faded panel-terra">
        <a id="criar-loja" class="navbar-brand btn-primary terra-link" href="#">Criar Loja</a>
        <form class="form-inline navbar-form pull-right">
          <input class="form-control" type="text" placeholder="Pesquisar">
          <i class="fa fa-search fa-lg" aria-hidden="true"></i>
        </form>
      </nav>
    </div>
  </div>
  <div class="row ">
    <div class="col-md-6">
      <table class="table">
        <thead>
          <tr>
            <th><i class="fa fa-asterisk" aria-hidden="true"></i></th>
            <th>Zona</th>
            <th>Rua</th>
            <th>Contacto</th>
            <th>Ver</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><i class="fa fa-wpforms" aria-hidden="true"></i></td>
            <td>Fazenda</td>
            <td>rua Abilio Cabral</td>
            <td>2643489</td>
            <td class="btn"> <a href="#" class="link">Detalhes</a> </td>
          </tr>

        </tbody>
      </table>
    </div>
    <div class="col-md-6">
      <div class="diagrama">
        <img src="user.png" alt="" class="img-rounded">
        <img src="user.png" alt="" class="img-rounded">
        <img src="user.png" alt="" class="img-rounded">
        <img src="user.png" alt="" class="img-rounded">
      </div>
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
