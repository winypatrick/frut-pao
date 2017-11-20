
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url();?>fich_compente/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <!-- <p>Oscar Borges</p> -->
          <p><?= $perfil_nome_menu?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu navegacao </li>
        <li class="treeview " id="t_a">
          <a href="javascript:void(0)" onclick="ir_para('funcionario')">
            <i class="fa fa-users"></i> <span>Funcionarios</span>
          </a>
         
        </li>
        
         <li class=" treeview" id="t_b">
          <a href="javascript:void(0)" onclick="ir_para('turno')">
            <i class="fa fa-desktop"></i> <span>Turnos</span>
          </a>
        </li>

        <li class="treeview" id="t_c">
          <a href="javascript:void(0)" onclick="ir_para('loj')">
            <i class="fa fa-dashboard"></i> <span>Lojas</span>
          </a>
        </li>

       <li class=" treeview" id="t_d">
          <a href="Relatorios.html">
            <i class="fa fa-book"></i> <span>Relatorios</span>
          </a>
        </li>



        </ul>
    
    </section>
    <!-- /.sidebar -->
  </aside>