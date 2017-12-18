
//====================================================[Arranque]===============================================================
$("#pesk").keyup(pesquisa()); // isso ja chama metodo automaticamente listar 
$("#pesk_1").keyup(pesquisa_turnos());

defenir_permissoes();
//logo_inicio_turno(); automatico

/*===================================================================================================================*/


//======================================================[delete_turno]======================================================================
function deleta_turno(id_turno){


swal({
  title: "Pretende remove-lo de turno?",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "ya, remove",
  closeOnConfirm: false
},
function(){


$.ajax({
          url: base+'turno/remover_turno',
          type: 'POST',
          data:{'id_turno': id_turno},

          success: function (data){
          if (data==true) {
            
          swal({
          title:"",
          text:"funcionario retirado de Turno !",
          type:"info",
          timer:2000,
          showConfirmButton:false,
          });
          listar_funcionario_diponivel();
          tabela_turno.ajax.reload();

            }

            else{
           
          swal({
          title:"",
          text:"Funcionario ainda não retirado em turno",
          type:"error",
          timer:2000,
          showConfirmButton:false,
           });

            }
          }

      
   });

});
}
//======================================================[end_deleta_turno]======================================================================



/*===========================================================================List - funcionario===================================*/
function listar_funcionario_diponivel(){


                   $.post(base+'turno/lista_funcionario_diponivel',
                   { }, 
                   function(data) {

                  // alert(data);   //teste de request
                   var c=JSON.parse(data);
                   $('#list_funcionarios_disponivel').html(''); //isso importante permite que nao repiti nada
                   $.each(c, function(index, val) {

                  var nome_= val.nome;
                  var nome_formado = nome_.split(" ");
                  
                  if (nome_formado.length>1) {
                  var nome=nome_formado[0]+' '+nome_formado[1];
                  }

                  else{
                  var nome=nome_formado[0];
                  }  

                //==========================================================================
             

                  $('#list_funcionarios_disponivel').append('<div class="col-md-2 hvr-grow" style="text-align: center; font-size:10px"><img src="'+base+'fich_compente/people_2.png" style="height:108px; width:80%"  class="img-rounded" alt="curso"><div class="caption"  style="text-align: center;"><strong>Nome:</strong> <span >'+nome+'</span><br><strong>Função:</strong> <span >'+val.funcao+'</span><br>  <p style="float: left;" > <a class="fa fa-eye btn" ></a></p>    <p style="float: right;"> <a class="fa fa-user-plus btn text-success hvr-pop" onclick="pick_turno(\''+val.id_user+'\', \''+val.nome+'\', \''+val.funcao+'\')"></a></p></div></div>');
                 
              
                   });

                  });


                        
    
}  


/*====================================================[pesauisa_filtrado]=================================================*/

function pesquisa(){

//$('#list_funcionarios_disponivel').html('');
 
 var campo=$('#pesk').val();
 //alert(campo);
console.log(campo);
if (campo!='' || campo!=null && campo.length>0) {

$.ajax({
                 url: base+'turno/pesquisa_filtro',
                 type: 'POST',
                 data:{'campo_pesquisa': campo},

                 success: function (data){
                  
               if(data==false){
               $('#list_funcionarios_disponivel').html('');
               $('#list_funcionarios_disponivel').append('<div class="col-md-12 text-danger" style="text-align: center; margin-top:35px"><h3>Nenhum funcionario encontrado  <i class="fa fa-low-vision text-danger" ></i></h3></div>');
               }

                else{
                    campo='';
                $('#list_funcionarios_disponivel').html(''); //isso importante permite que nao repiti nada
                 var c=JSON.parse(data);
                 $.each(c, function(index, val) {
           
                var nome_= val.nome;
                var nome_formado = nome_.split(" ");

                if (nome_formado.length>1) {
                var nome=nome_formado[0]+' '+nome_formado[1];
                }

                else{
                var nome=nome_formado[0];
                }
             
                $('#list_funcionarios_disponivel').append('<div class="col-md-2 hvr-grow" style="text-align: center;  font-size:12px;  border:2px solid; border-color:#46EB5D; border-left: 0px; border-right: 0px; border-top: 0px; border-radius: 10px;"><img src="'+base+'fich_compente/people_2.png" style="height:108px; width:80%"  class="img-rounded" alt="curso"><div class="caption"  style="text-align: center;"><strong>Nome:</strong> <span >'+nome+'</span><br><strong>Função:</strong> <span >'+val.funcao+'</span><br>  <p style="float: left;" > <a class="fa fa-eye btn" ></a></p>    <p style="float: right;"> <a class="fa fa-user-plus btn text-success hvr-pop" onclick="pick_turno(\''+val.id_user+'\', \''+val.nome+'\', \''+val.funcao+'\')"></a></p></div></div>');
                 });
                }
              }

       
   });

}

else{
$('#list_funcionarios_disponivel').html('');  
listar_funcionario_diponivel();
}


 
  
}

//=======================================================[fim_pesauisa]===================================================================

/*===========================================================================List - loja por turno e paginacao===================================*/
function lista_turno_loja(page){

                     var dt= new Date();
                    
                    if (dt.getDate()<10)
                     {
                       var format_dia='0'+dt.getDate();
                     } 
                     else {
                       var format_dia=dt.getDate();
                     }


                     var Date_atual_=format_dia+"/"+(dt.getMonth()+1)+"/"+dt.getFullYear();
                     var time = dt.getHours();
                    if (time>=6 && time<=14 ) {var periodo_ = 1 ; }
                    else{ var periodo_ = 2 ; }

                   $.post(base+'turno/paginacao_/'+page,
                   { }, 
                   function(data) {


                   var c=JSON.parse(data);
                   
                   $('#pag_link').html(c.pagina_link); 
                   $('#lista_loja_turn').html(''); 

                   $.each(c.tabela, function(index, val) {



                  if ((val.data==Date_atual_ && val.periodo==periodo_ ) && val.Disponivel==1 || (val.Disponivel==1 && val.data==Date_atual_)) {

                  if (val.id_loja==c.id_loja_logado ) {
                  
                    $('#lista_loja_turn').append('<div class="col-md-2 hvr-glow" style="text-align: center; font-size:12px; border:2px solid; border-color:#4DE21F; border-left: 0px; border-right: 0px; border-top: 0px; border-radius: 20px; margin-right: 13px; margin-top: 10px; margin-left: 12px">'+
                  '<img src="'+base+'fich_compente/turno_.png" style="height:130px; width:100%"  class="img-rounded" alt="curso"> <div class="caption "  style="text-align: center; "> <p><strong>Loja:</strong><span >'+val.zona+'</span></p>'+
                  '<p><strong>Data:</strong><span >'+val.data+'</span>&nbsp;&nbsp;<strong>Periodo:</strong><span >'+val.periodo+'</span></p>'+
                  ''+
                  '<p style="float: left;" > <a class="fa fa-info-circle fa-lg btn text-info  hvr-pop" style="font-size: 18px" onclick="modal_turno(\''+val.zona+'\')"></a> </p>'+
                  '<p style="float: right;"> <a class="fa fa-file-text-o fa-lg btn text-info  hvr-pop text-info" style="font-size: 15px"></a> </p>'+
                  '</div>'+
                  '</div>');

                  }

                  else{
                    
                    $('#lista_loja_turn').append('<div class="col-md-2 hvr-glow" style="text-align: center; font-size:12px; border:2px double; border-color:#161818; border-left: 0px; border-right: 0px; border-top: 0px; border-radius: 20px; margin-right: 13px; margin-top: 10px; margin-left: 12px">'+
                   '<img src="'+base+'fich_compente/turno_.png" style="height:130px; width:100%"  class="img-rounded" alt="curso"> <div class="caption "  style="text-align: center;"> <p><strong>Loja:</strong><span >'+val.zona+'</span></p>'+
                   '<p><strong>Data:</strong><span >'+val.data+'</span>&nbsp;&nbsp;<strong>Periodo:</strong><span >'+val.periodo+'</span></p>'+
                   ''+
                   '<p style="float: left" > <a class="fa fa-refresh fa-spin fa-lg btn text-info  hvr-pop" style="font-size: 18px" onclick="info_turno(\''+val.zona+'\', \''+val.data+'\', \''+val.periodo+'\')"></a> </p>'+
                   '<p style="float: right"> <a class="fa fa-file-text-o fa-lg btn text-info  hvr-pop text-info" style="font-size: 15px"></a> </p>'+
                   '</div>'+
                   '</div>');

                  }
                
                 
                  }

                
               else{

                  if (val.congelado) {

                  $('#lista_loja_turn').append('<div class="col-md-2 hvr-glow " style="text-align: center; font-size:12px; border:2px double; border-color:#161818; border-left: 0px; border-right: 0px; border-top: 0px; border-radius: 20px; margin-right: 13px; margin-top: 10px; margin-left: 12px">'+
                   '<img src="'+base+'fich_compente/turno_.png" style="height:130px; width:100%"  class="img-rounded" alt="curso"> <div class="caption "  style="text-align: center;"> <p><strong>Loja:</strong><span >'+val.zona+'</span></p>'+
                   '<p><strong>Data:</strong><span >'+val.data+'</span>&nbsp;&nbsp;<strong>Periodo:</strong><span >'+val.periodo+'</span></p>'+
                   ''+
                   '<p style="float: left" > <a class="fa fa-info-circle fa-lg btn text-info  hvr-pop " style="font-size: 18px" onclick="info_turno(\''+val.zona+'\', \''+val.data+'\', \''+val.periodo+'\')"></a> </p>'+
                   '<p style="float: right"> <a class="fa fa-file-text fa-lg btn text-info  hvr-pop text-info" style="font-size: 15px" onclick="modal_pdf(\''+val.id_turno+'\')"></a> </p>'+
                   '</div>'+
                   '</div>');
                  }

                   else {

                  $('#lista_loja_turn').append('<div class="col-md-2 hvr-glow" style="text-align: center; font-size:12px; border:2px double; border-color:#161818; border-left: 0px; border-right: 0px; border-top: 0px; border-radius: 20px; margin-right: 13px; margin-top: 10px; margin-left: 12px">'+
                   '<img src="'+base+'fich_compente/turno_.png" style="height:130px; width:100%"  class="img-rounded" alt="curso"> <div class="caption "  style="text-align: center;"> <p><strong>Loja:</strong><span >'+val.zona+'</span></p>'+
                   '<p><strong>Data:</strong><span >'+val.data+'</span>&nbsp;&nbsp;<strong>Periodo:</strong><span >'+val.periodo+'</span></p>'+
                   ''+
                   '<p style="float: left" > <a class="fa fa-info-circle fa-lg btn text-info  hvr-pop" style="font-size: 18px" onclick="info_turno(\''+val.zona+'\', \''+val.data+'\', \''+val.periodo+'\')"></a> </p>'+
                   '<p style="float: right"> <a class="fa fa-file-text-o fa-lg btn text-info  hvr-pop text-info" style="font-size: 15px"></a> </p>'+
                   '</div>'+
                   '</div>');

                   } 
                  

               }


                   });

                  });


}
lista_turno_loja(1);

//pagina feito para dar click aqui
 $(document).on("click", ".pagination li a", function (event){
event.preventDefault();
var pagina=$(this).data('ci-pagination-page');
lista_turno_loja(pagina);
 });
//=================================================================[lista com paginacao]=====================================================


/*====================================================[pesauisa_Turnos]=================================================*/

function pesquisa_turnos(){

 var campo=$('#pesk_1').val();
 //alert(campo);
//console.log(campo);

if (campo!='' || campo!=null && campo.length>0) {

$.ajax({
                 url: base+'turno/pesquisa_turnos_',
                 type: 'POST',
                 data:{'campo_pesquisa_1': campo},

                 success: function (data){
               
               if(data==false){
                $('#lista_loja_turn').html('');
               $('#lista_loja_turn').append('<div class="col-md-12 text-danger" style="text-align: center; margin-top:35px"><h3>Nenhum Turno encontrado  <i class="fa fa-low-vision text-danger" ></i></h3></div>');
              $('#pag_link').html(' ');
               }

                else{
                $('#lista_loja_turn').html(''); //isso importante permite que nao repiti nada
                 var c=JSON.parse(data);

                    $.each(c, function(index, val) {
             
                  $('#lista_loja_turn').append('<div class="col-md-2 hvr-glow" style="text-align: center; font-size:11px; border:2px double; border-color:#35CAC1; border-left: 0px; border-right: 0px; border-top: 0px; border-radius: 20px; margin-right: 13px; margin-top: 10px; margin-left: 12px">'+
                   '<img src="'+base+'fich_compente/turno_.png" style="height:130px; width:100%"  class="img-rounded" alt="curso"> <div class="caption "  style="text-align: center;"> <p><strong>Loja:</strong><span >'+val.zona+'</span></p>'+
                   '<p><strong>Data:</strong><span >'+val.data+'</span>&nbsp;&nbsp;<strong>Periodo:</strong><span >'+val.periodo+'</span></p>'+
                   '<p></p>'+
                  ' <p style="float: left;" > <a class="fa fa-info-circle fa-lg btn text-info  hvr-pop" style="font-size: 17px" onclick="info_turno(\''+val.zona+'\', \''+val.data+'\', \''+val.periodo+'\')"></a> </p>'+
                  ' <p style="float: right;"> <a class="fa fa-book fa-lg btn text-info  hvr-pop text-info" style="font-size: 17px"></a> </p>'+
                  '</div>'+
                 '</div>');
                 
                   });

                }
              }

       
   });

}

else{
$('#lista_loja_turn').html('');  
lista_turno_loja(1);
}


 
  
}

//=======================================================[fim_pesauisa]===================================================================


/*===============================================[info turno]===========================================================*/
function info_turno(zona, data, periodo){
 // alert('sinalizador'+data);

   $('#titulo_info_turno').html(+periodo+'° Turno &nbsp;&nbsp;'+zona+'&nbsp;&nbsp;'+data);
  
  $.ajax({
                 url: base+'turno/info_turno',
                 type: 'POST',
                 data:{'zona': zona, 'data': data, 'periodo': periodo},

                 success: function (data_){
             
                  $('#adiciona_funcionario').html('');
                   var c=JSON.parse(data_);
                   
                    $.each(c.data, function(index, val) {
                   //alert(val);// sinalizador
                   $('#adiciona_funcionario').append(val);

                    });

              }

       
   });

   $('#modal_info_turno').modal('show');
}
/*===============================================[info turno]===========================================================*/


/*===========================================================================Data-table===================================*/
  var tabela_turno=$('#tab11').DataTable(
{

'paging':true,
'info':false,
'filter':true,
"pageLength": 4,
'statesave':false,
"responsive":true,
"autoWidth": false,
"processing": true,
"oLanguage": {
        "sEmptyTable":     "Nenhum registro encontrado na tabela",
        "sInfo": "Mostrar _START_ até _END_ do _TOTAL_ registros",
        "sInfoEmpty": "Mostra 0 até 0 de 0 Registros",
        "sInfoFiltered": "(Filtrar de _MAX_ total registros)",
        "sInfoPostFix":    "",
        "sInfoThousands":  ".",
        "sLengthMenu": "Mostrar _MENU_ ",
        "sLoadingRecords": "Carregando...",
        "sProcessing":     "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "Pesquisar",
        "oPaginate": {
            "sNext": "Prox",
            "sPrevious": "Ant",
            "sFirst": "Primeiro",
            "sLast":"Ultimo"
        },
        "oAria": {
            "sSortAscending":  ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
        }
    },
     "search": {
  },
'ajax':{

"url":base+'turno/lista_turno',
"type":'post',
//dataSrc:''


error: function(){
                        /*$("#tab11").html("");
                        $("#tab11").append('<tbody class="employee-grid-error"><tr><th colspan="3">Nenhum Turno encontrado</th></tr></tbody>'); */                 
                    }
},

"order":[ [2, "asc"], [3, "asc"], [4, "asc"]], //ordenar coluna de coluna 0 que e id_cid por ordem
 //ordenar coluna de coluna 0 que e id_cid por ordem

});

  $('#tab11 tfoot th').each( function () {
    var title = $(this).text();
    $(this).html( '<input  class=" filtro " style="width: 90%; height: 23px" type="text" placeholder="" />' );  
  } );

  //$('#tabl tfoot th:last-child input').css('display','none'); // oculta ultimo input

 tabela_turno.columns().every( function () {
        var that = this;

        $( '.filtro', this.footer() ).on( 'keyup change', function () {
          if ( that.search() !== this.value ) {
            that
            .search( this.value )
            .draw();
          }
        } );
      } );  
 /*===========================================================================////////////////////////////////// */

 
   //====================================================================[Adicionar Turno]================================================
 function pick_turno(id_, nome){

 var dt= new Date();

 if (dt.getDate()<10)
                     {
                       var format_dia='0'+dt.getDate();
                     } 
                     else {
                       var format_dia=dt.getDate();
                     }

var Data_atual=format_dia+"/"+(dt.getMonth()+1)+"/"+dt.getFullYear();


var time = dt.getHours();


if (time>=6 && time<=14 ) {
var periodo = 1 ;
}


else{
var periodo = 2 ;
}


//alert(periodo);

 $.ajax({

                 url: base+'turno/criar_turno',
                 type: 'POST',
                 data: {'nome': nome, 'data':Data_atual, 'periodo':periodo, 'id_userr':id_},
                 success: function (data){
                 // alert(data);

              if (data!='null' && data!='never') {
                  
                   if (data==true ) {

                   $('#modal_turno').modal('show');

                   $('#modal_pick').modal('hide');
                   
                       swal({
                        title:"",
                        text:"funcionario foi adicionado ao Turno!",
                        type:"success",
                        timer:2000,
                        showConfirmButton:false,
                        });
                       listar_funcionario_diponivel();
                       lista_turno_loja(1);
                       tabela_turno.ajax.reload();

                   


                }

      
                    else{
                  
                   swal({
                        title:"",
                        text:"funcionario nao foi adicionado ao Turno !",
                        type:"error",
                        timer:2000,
                        showConfirmButton:false,
                        });
                        tabela_turno.ajax.reload();
                        //limpa_form_funcionario();
                       // tabela_funcionario.ajax.reload();


                      }

              }

              else{

               /*  swal({
                        title:"",
                        text:"Funcionario ja Contem um Turno!",
                        type:"info",
                        timer:2000,
                        showConfirmButton:false,
                        });*/
               if (data=='never') {
                        swal({
                        title:"",
                        text:"Ja passou hora Indicado para adicionar funcionario no Turno!",
                        type:"info",
                        timer:2000, 
                        showConfirmButton:false,
                        }); }

           

              }  

         
 }
    
   });  

 }

/*====================================================== Pickagem de hora/ entrada================================================*/
 function altera_r(id, nome, hora_entrada, hora_saida){
  
  $('#id_user_').val(id);
  $('#nome_').val(nome);
  $('#hora_entrada_').val(hora_entrada);
  $('#hora_saida_').val(hora_saida);

  $('#modal_pick').modal('show');


 }


/*======================================================Alterar Hora/entrada/saida================================================*/

 function picar_hora(){
//$('#modal_turno').modal('hide');

var id_turno=$('#id_user_').val();
var hora_entrada=$('#hora_entrada_').val();
var hora_saida=$('#hora_saida_').val();


 $.ajax({

                 url: base+'turno/alterar_turno',
                 type: 'POST',
                 data: {'id_turno': id_turno, 'hora_entrada':hora_entrada, 'hora_saida':hora_saida},
                 success: function (data){
                  
                      if (data==true ) {

                     $('#modal_pick').modal('hide');
                       swal({
                        title:"",
                        text:"alterado Hora E/S!",
                        type:"success",
                        timer:2000,
                        showConfirmButton:false,
                        });
                       tabela_turno.ajax.reload();

                           $('#modal_turno').modal('hide');
                       setTimeout(function() {
                         $('#modal_turno').modal('show');
                       },1100);

                }

                 else{

                     $('#modal_pick').modal('hide');

                       swal({
                        title:"",
                        text:"confusão em pick Hora de E/S!",
                        type:"success",
                        timer:2000,
                        showConfirmButton:false,
                        });
                       tabela_turno.ajax.reload();

                }
                //$('#modal_turno').modal('show');
 }
    
   });  
}

/*====================================================== pick_data================================================*/
  
   $(function (){
  var today = new Date();
  $('#hora_entrada_').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm'
      });

   $('#hora_saida_').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm'
      });   


    
   });

/*   ================================================pick=================================================*/

function modal_turno(){   //aqui vou verificar se ele responsavel ou nao

listar_funcionario_diponivel();
$('#modal_turno').modal('show');

}


function logo_inicio_turno(){

  //Costumizada de 
$('#list_a').css({'background': '#FFFFFF'});
$('#list_n').css({'background': '#EFE9E9'});
$('#list_a').removeClass('active');
$('#list_n').addClass('active'); 
  //

   $.ajax({
                 url: base+'turno/pega_info_logado',
                 type: 'POST',
                 success: function (pacote){
               // alert(pacote);
                var c=JSON.parse(pacote);
            
               if (c.resposta==true) {

                    $.each(c.dados_user, function(index, val) {
                    pick_turno(val.id, val.nome);
                    });

                }
                else{
                     swal({
                        title:"",
                        text:"olha ja foste incluido no Turno!",
                        type:"info",
                        timer:2000,
                        showConfirmButton:false,
                        });
                    }
                
                   }

   });
}

$('#list_n').click(function(event) {

Menu_zinho(1);
lista_turno_loja(1);
});

/*=========================================================================[Inicio_view_detalhado]=========================================================*/
$('#list_a').click(function(event) {
Menu_zinho(2);

 $('#pag_link').html(''); 
 $('#lista_loja_turn').html(''); //isso importante permite que nao repiti nada
$('#lista_loja_turn').append('<table class="table table-striped table-condensed box" id="tab_detalhes">'+
                               '<thead id="thead12">'+
                                ' <th > Nome</th>'+
                                 '<th style="width: 15%;"> Função</th>'+ 
                                 '<th style="width: 17%"> Loja </th>'+ 
                                 '<th style="width: 10%"> Data</th>'+
                                ' <th style="width: 6%"> Periodo</th>'+
                                ' <th style="width: 10%"> Hora /E</th>'+
                                ' <th style="width: 10%"> Hora /S</th>'+
                                ' <th> Edit &nbsp;|&nbsp; Deleta</th>'+
                                ' </thead>'+
                                '<tbody class="box"> </tbody>'+
                                    ' <tfoot> <tr> <th></th> <th></th> <th></th><th></th><th></th>'+
                                     ' <th style="display: none;"></th>'+
                                     ' <th style="display: none;"></th>'+
                                     ' <th style="display: none;"></th>'+
                                    '</tr> </tfoot>'+
                                '</table>');

  var tabela_detalhes=$('#tab_detalhes').DataTable(
{


'paging':true,
'info':false,
'filter':true,
"pageLength": 8,
'statesave':false,
"responsive":true,
"autoWidth": false,
"processing": true,
"oLanguage": {
        "sEmptyTable":     "Nenhum registro encontrado na tabela",
        "sInfo": "Mostrar _START_ até _END_ do _TOTAL_ registros",
        "sInfoEmpty": "Mostra 0 até 0 de 0 Registros",
        "sInfoFiltered": "(Filtrar de _MAX_ total registros)",
        "sInfoPostFix":    "",
        "sInfoThousands":  ".",
        "sLengthMenu": "Mostrar _MENU_ ",
        "sLoadingRecords": "Carregando...",
        "sProcessing":     "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "Pesquisar",
        "oPaginate": {
            "sNext": '<span style="font-weight: bold; font-size: 14px; color: #2ECDC4"> &gt; </span>',
            "sPrevious": '<span style="font-weight: bold; font-size: 14px; color: #2ECDC4"> &lt; </span>',
            "sFirst": "Primeiro",
            "sLast":"Ultimo"
        },
        "oAria": {
            "sSortAscending":  ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
        }
    },
     "search": {
  },
'ajax':{

"url":base+'turno/lista_turno_detalhes',
"type":'post',
//dataSrc:''


error: function(){
                        /*$("#tab11").html("");
                        $("#tab11").append('<tbody class="employee-grid-error"><tr><th colspan="3">Nenhum Turno encontrado</th></tr></tbody>'); */                 
                    }
},


});

  $('#tab_detalhes tfoot th').each( function () {
    var title = $(this).text();
    $(this).html( '<input  class=" filtro text-info" style="width: 90%; height: 23px" type="text" placeholder="" />' );  
  } );

 tabela_detalhes.columns().every( function () {
        var that = this;

        $( '.filtro', this.footer() ).on( 'keyup change', function () {
          if ( that.search() !== this.value ) {
            that
            .search( this.value )
            .draw();
          }
        } );
      } );  

});
/*================================================================[fim_list_detalheado]============================================*/


function relatorio(){
   //$('#modal_relatorio').modal('show');
  // alert($('#pagina').val());


if ($('#pagina').val()==1) {

$.ajax({
                 url: base+'turno/verifica_fecho_hora_turno',
                 type: 'POST',
                 success: function (count_fecho){
                 // alert(count_fecho);
     if (count_fecho>0) {
          
             swal({
                        title:"",
                        text:"E Preciso Pick Hora de todo Funcionario em Turno!",
                        type:"error",
                        timer:2000,
                        showConfirmButton:false,
                        });

                     } 
     else {

  $('.progresso').removeClass('label-info');
  $('.progresso').addClass('label-success'); 
  
  $('#recebe_corpo').html('<input type="hidden" id="pagina" value="2" name="" ><div class="col-md-12"> <div class="box">'+
            '<div class="box-header with-border label-primary">'+
            '<span class="box-title" style="font-size: 14px">Relatorio turno</span>'+
            '</div><div  class="box-body" ><div class="row-fluid">'+
            
            '<div class="col-md-12">'+
            '<div class="form-group">'+
            '<label for="desc">Congelado:</label>'+
            '<textarea class="form-control label-default" name="des1" id="des1" rows="4" style="border-radius: 10px"></textarea>'+
            '</div></div><br>'+

           '<div class="col-md-12">'+
           ' <div class="form-group">'+
           ' <label for="desc">Frescos/Padaria:</label>'+
            '<textarea class="form-control label-default" name="des2" id="des2" rows="4" style="border-radius: 10px"></textarea>'+
           ' </div></div><br>'+

           '<div class="col-md-12">'+
            '<div class="form-group">'+
            '<label for="desc">Stock/Armazem:</label>'+
            '<textarea class="form-control label-default" name="des3" id="des3" rows="4" style="border-radius: 10px"></textarea>'+
            '</div> '+
           '</div>'+

           '<br>'+
           '<div class="col-md-12">'+
            '<div class="form-group">'+
            '<label for="desc">Caixa/Equipamentos:</label>'+
            '<textarea class="form-control label-default" name="des4" id="des4" rows="4" style="border-radius: 10px"></textarea>'+
            '</div>'+
           '</div>'+
           '</div>'+
           ' </div>'+
        '</div> </div>');

           }

                
                   }

 });
   }


    else if ($('#pagina').val()==2) {
      alert('2');
      //alert($('#des4').val());

  var congelados=$('#des1').val();
  var fresco=$('#des2').val();
  var stock=$('#des3').val();
  var caixa=$('#des4').val();
    if (congelados==='' || fresco==='' || stock==='' || caixa==='') {  /*----------------*/
      swal({
                        title:"",
                        text:"Campos Vazios preenche os favor!",
                        type:"info",
                        timer:2000,
                        showConfirmButton:false,
                        });
    }       /*----------------*/

    else{  /*----------------*/

     $.ajax({

                 url: base+'turno/relatorio',
                 type: 'POST',
                 data: {'congelados': congelados, 'fresco':fresco, 'stock':stock, 'caixa':caixa},
                 success: function (data_){
                 //alert(data_);     
                      if (data_==true ) {
                      $.post(base+'turno/fecho_turno', { },  function(data) { lista_turno_loja(1); });
                      
                      $('.progressoo').removeClass('label-info');
                       $('.progressoo').addClass('label-success'); 

                       swal({
                        title:"",
                        text:"Turno Terminado com sucesso!",
                        type:"success",
                        timer:2000,
                        showConfirmButton:false,
                        });

                       $('#modal_turno').modal('hide');

                      


                                      }

                     else{
                       swal({
                        title:"",
                        text:"Turno ainda nao foi terminado!",
                        type:"error",
                        timer:2000,
                        showConfirmButton:false,
                        });
                                     }
        }
    
   }); 

    }  /*----------------*/

    

    }

}



/*====================================================[end]=======================================================*/

function Menu_zinho(value){   //funcao de costumizacao de menu
if (value==1) {
//alert('normal');
$('#list_a').css({'background': '#FFFFFF'});
$('#list_n').css({'background': '#EFE9E9'});
$('#list_a').removeClass('active');
$('#list_n').addClass('active'); 
$('#pacote_pesk_1').show();
}

if (value==2) {
//alert('anormal');
$('#list_n').css({'background': '#FFFFFF'});
$('#list_a').css({'background': '#EFE9E9'});
$('#list_n').removeClass('active');
$('#list_a').addClass('active'); 
$('#pacote_pesk_1').hide();
}   }

function  defenir_permissoes(){

 $.ajax({
                 url: base+'funcionario/pega_funcao',
                 type: 'POST',
                 success: function (data){
                // alert(data);
                if (data=='adim') {
                  $('#list_a').show();
                  
                }
                else{ $('#inicio_').show();}
              }
 });

}


/*====================================================[end]=======================================================*/

/*================================================atualizacao automatico===========================================*/

var intervalo = window.setInterval(function() {
   listar_funcionario_diponivel();
    merda();
}, 3000);


function merda(){
  listar_funcionario_diponivel();
}
/*====================================================================================================================*/


/*======================================[pdf]===============================================*/



function modal_pdf(id_turno){
  $('#modal_spre').modal('show');
  $('#md_pdf').html('<iframe style="width: 100%; height: 370px" src="'+base+'pddf/'+id_turno+'">');
}


/*======================================[pdf]===============================================*/