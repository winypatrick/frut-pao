//========================================
//var base='http://localhost/frut&pao/';
var base='http://localhost/frut&pao/';
//====================================================[Arranque]===============================================================

$("#pesk").keyup(pesquisa()); // isso ja chama metodo automaticamente listar 
//ou
//listar_funcionario_diponivel();
/*===================================================================================================================*/

document.getElementById('respons').disabled=true;

//====================================================================[Adicionar Turno]================================================
 var form = $('#form');

  form.submit(function (Evento){ //Event

  Evento.preventDefault(); //isso pra evitar para que atualizar e obrigatorio colocar nome na inputs <radio, select checkbox>

//var id_=$('#id_user_').val();

//alert( form.serialize() );  sinalizador

 $.ajax({

                 url: base+'turno/criar_turno',
                 type: 'POST',
                 data: form.serialize(),
                 success: function (data){
                  alert(data);

                if (data!='null') {


                   if (data==true ) {

                   $('#modal_pick').modal('hide');
                       swal({
                        title:"",
                        text:"funcionario foi adicionado ao Turno!",
                        type:"success",
                        timer:2000,
                        showConfirmButton:false,
                        });
                       tabela_turno.ajax.reload();

                }

              
               if(data==false){
                  
                   swal({
                        title:"",
                        text:"funcionario nao foi adicionado ao Turno !",
                        type:"error",
                        timer:2000,
                        showConfirmButton:false,
                        });
                        //limpa_form_funcionario();
                       // tabela_funcionario.ajax.reload();


                }

                }
              
             
               else{

                  if ($('#funcao_').val()=='Assistente') {
                      swal({
                        title:"",
                        text:"Turno ainda não contem Responsavel !",
                        type:"info",
                        timer:2000,
                        showConfirmButton:false,
                        });
                  }

                  else{

                     swal({
                        title:"",
                        text:"Responsavel ja foi inicializado num Turno!",
                        type:"info",
                        timer:2000,
                        showConfirmButton:false,
                        });

                  }
             

                //aqui que vai abrir model de prechimento
               

              }  
 }
    
   });  
 });

//==============================================================[end_add_turno]==========================================================


//======================================================[delete_turno]======================================================================
function deleta_turno(id_turno){

//alert(id_turno);
swal({
  title: "Pretende remove-lo de turno?",
/*  text: "se deletares funcionario nao vai ser possivel recuperar!",*/
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "ya, remove",
  closeOnConfirm: false
},
function(){

  //alert('ddd');

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

//$('#list_funcionarios_disponivel').html('');

                //  alert(data);
                  $.ajax({
                 url: base+'turno/pega_id_user',
                 type: 'POST',
                 success: function (id_users){

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
                  if (val.id_user==id_users) {
                  $('#list_funcionarios_disponivel').append('<div class="col-xs-2 hvr-grow" style="text-align: center; font-size:10px;"><img src="http://localhost/frut&pao/fich_compente/winy.png" style="height:108px; width:70%"  class="img-rounded" alt="curso"><div class="caption"  style="text-align: center;"><strong>Nome:</strong> <span >'+nome+'</span><br><strong>Função:</strong> <span >'+val.funcao+'</span><br>  <p style="float: left;" > <a class="fa fa-eye btn" style=" color:#32E120"></a></p>    <p style="float: right; "> <a class="fa fa-user-plus btn text-success hvr-pop"  onclick="pick_turno(\''+val.id_user+'\', \''+val.nome+'\')"></a></p></div></div>');
                  }

                  else{

                  $('#list_funcionarios_disponivel').append('<div class="col-xs-2 hvr-grow" style="text-align: center; font-size:10px"><img src="http://localhost/frut&pao/fich_compente/winy.png" style="height:108px; width:70%"  class="img-rounded" alt="curso"><div class="caption"  style="text-align: center;"><strong>Nome:</strong> <span >'+nome+'</span><br><strong>Função:</strong> <span >'+val.funcao+'</span><br>  <p style="float: left;" > <a class="fa fa-eye btn" ></a></p>    <p style="float: right;"> <a class="fa fa-user-plus btn text-success hvr-pop" onclick="pick_turno(\''+val.id_user+'\', \''+val.nome+'\')"></a></p></div></div>');
                 
                  }  

             

                   });
               window.id_user_global=id_users;  //declaracao de variavel global

                  });


                            }

       
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
               $('#list_funcionarios_disponivel').append('<div class="col-xs-12 text-danger" style="text-align: center; margin-top:35px"><h3>Nenhum funcionario encontrado  <i class="fa fa-low-vision text-danger" ></i></h3></div>');
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
             
                $('#list_funcionarios_disponivel').append('<div class="col-xs-2 hvr-grow" style="text-align: center; font-size:12px;  border:2px solid; border-color:#46EB5D; border-left: 0px; border-right: 0px; border-top: 0px;"><img src="http://localhost/frut&pao/fich_compente/winy.png" style="height:108px; width:70%"  class="img-rounded" alt="curso"><div class="caption"  style="text-align: center;"><strong>Nome:</strong> <span >'+nome+'</span><br><strong>Função:</strong> <span >'+val.funcao+'</span><br>  <p style="float: left;" > <a class="fa fa-eye btn" ></a></p>    <p style="float: right;"> <a class="fa fa-user-plus btn text-success hvr-pop" onclick="pick_turno(\''+val.id_user+'\', \''+val.nome+'\')"></a></p></div></div>');
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

//=======================================================[]===================================================================


/*===========================================================================Data-table===================================*/
  var tabela_turno=$('#tab11').DataTable(
{

'paging':true,
'info':false,
'filter':true,
"pageLength": 5,
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
                        $("#tab11").html("");
                        $("#tab11").append('<tbody class="employee-grid-error"><tr><th colspan="3">Nenhum Turno encontrado</th></tr></tbody>');                   
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

 
 function pick_turno(id_, nome){
 	/*alert('merda');*/

  $('#nome_').val(nome);
  $('#id_user_').val(id_);
  
  if (id_==id_user_global) {
    document.getElementById('respons').disabled=false;
    document.getElementById('assis').disabled=true;
   $('#funcao_').val('Responsavel').change();
  }
  else{
    document.getElementById('respons').disabled=true;
    document.getElementById('assis').disabled=false;
     $('#funcao_').val('Assistente').change();
  }

 	$('#modal_pick').modal('show');
 }

/*====================================================== pick_data================================================*/
   $(function (){
  var today = new Date();
  /* $('#data_').datepicker({
    // "setDate", new Date(),
     language:'pt-BR', 
     format: 'dd/mm/yyyy',
     startDate:new Date(),
     endDate: new Date(today.getFullYear(), today.getMonth(), today.getDate())
   }); //pega data autal  */

   $('#data_').bootstrapMaterialDatePicker({ 
    format : 'DD/MM/YYYY',
    lang : 'pt',
    minDate : new Date(),
    maxDate : new Date(today.getFullYear(), today.getMonth(), today.getDate()),
    time:false

  });

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

function modal_turno(){

 $('#modal_turno').modal('show');
 //alert('ddfd');

}
