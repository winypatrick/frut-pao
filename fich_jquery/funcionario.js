//========================================
var base='http://192.168.1.68/frut&pao/';
//var base='http://localhost/frut&pao/';
//========================================

//=================================================Arranque===============================================
estatistica_numero();
defenir_permissoes();  //definir permissao consoente a funcao d outilizador pego nessa funcao


//==========================================================================================================



 //=========================================parte gravar em banco de dados =====================================================



 var form = $('#form');

  form.submit(function (Evento){ //Event

  Evento.preventDefault(); //isso pra evitar para que atualizar e obrigatorio colocar nome na inputs <radio, select checkbox>

var id_=$('#id_f').val();

if (id_=='') {
 $.ajax({

                 url: base+'funcionario/criar_funcioanrio',
                 type: 'POST',
                 data: form.serialize(),
                 success: function (data){
                if (data==true) {
                estatistica_numero();
                   $('#myModal').modal('hide');

                       swal({
                        title:"",
                        text:"funcionario adicionado com sucesso!",
                        type:"success",
                        timer:2000,
                        showConfirmButton:false,
                        });

                        limpa_form_funcionario();
                        tabela_funcionario.ajax.reload();

                }
                else{
                  
                   swal({
                        title:"",
                        text:"funcionario adicionado sem sucesso verifica email !",
                        type:"error",
                        timer:2000,
                        showConfirmButton:false,
                        });
                        //limpa_form_funcionario();
                       // tabela_funcionario.ajax.reload();


                }
 }
       
   });
}


else{
/*alert('alterar');*/
//alert(id_); sinalizador

  $.ajax({
                 url: base+'funcionario/altera_funcioanrio',
                 type: 'POST',
                 data: form.serialize(),
                 success: function (data){
               if (data==true) {

                   $('#myModal').modal('hide');
                   swal({
                  title:"",
                  text:"dados alterado com sucesso!",
                  type:"success",
                  timer:2000,
                  showConfirmButton:false,
                    });
           
                  limpa_form_funcionario();
                 tabela_funcionario.ajax.reload();

               }

               else{

                   swal({
                  title:"",
                  text:"dados alterado sem sucesso veerifica email!",
                  type:"error",
                  timer:2000,
                  showConfirmButton:false,
                    });

               } 

              }
       
   });


}


 });
//===========================================================================================================

//===================================================================================//abrir modal fx=================================

$('#adicionar').click(function(event) {
 $('#myModal').modal({  });  
 $('#id_f').val('');

 limpa_form_funcionario();

});

//==========================================================================================================================================






  var tabela_funcionario=$('#tabl').DataTable(
{
'paging':true,
'info':false,
'filter':true,
"pageLength": 5,
"responsive":true,
"autoWidth": false,
"processing": true,
'statesave':true,
 "oLanguage": {
        "sEmptyTable":     "Nenhum registro encontrado na tabela",
        "sInfo": "Mostrar _START_ até _END_ do _TOTAL_ registros",
        "sInfoEmpty": "Mostra 0 até 0 de 0 Registros",
        "sInfoFiltered": "(Filtrar de _MAX_ total registros)",
        "sInfoPostFix":    "",
        "sInfoThousands":  ".",
        "sLengthMenu": "Mostrar _MENU_ registros por pagina",
        "sLoadingRecords": "Carregando...",
        "sProcessing":     "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "Pesquisar: ",
        "oPaginate": {
            "sNext": "Proximo",
            "sPrevious": "Anterior",
            "sFirst": "Primeiro",
            "sLast":"Ultimo"
        },
        "oAria": {
            "sSortAscending":  ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
        }
    },
'ajax':{

"url":base+'funcionario/lista_funcionario',
"type":'post',
//dataSrc:''


error: function(){
                      //  $("#tabl").html("");
                       // $("#tabl").append('<tbody class="employee-grid-error"><tr><th colspan="3">Nenhum Registro incluido</th></tr></tbody>');
                       
                    }

},



"order":[[0, "asc"]], //ordenar coluna de coluna 0 que e id_cid por ordem
});

//*****************************************isso e pra colocar filtro dps de colocar foot em view mportante issso ***********************************************

  $('#tabl tfoot th').each( function () {
    var title = $(this).text();
    $(this).html( '<input  class=" filtro " style="width: 90%; height: 23px" type="text" placeholder="" />' );  
  } );

  //$('#tabl tfoot th:last-child input').css('display','none'); // oculta ultimo input

 tabela_funcionario.columns().every( function () {
        var that = this;

        $( '.filtro', this.footer() ).on( 'keyup change', function () {
          if ( that.search() !== this.value ) {
            that
            .search( this.value )
            .draw();
          }
        } );
      } );

 /*=======================================================================================================================*/



function ir_para(controller){

   $.blockUI({baseZ: 2000,
  css: {
    border: 'none',
    padding: '0px',
    backgroundColor: '#090808',
    '-webkit-border-radius': '10px',
    '-moz-border-radius': '10px',
    opacity: .3,
    color: '#fff'
  },
/*  message: '<img width="100px" height="80px" src="'+base+'preloader.gif" /><h4><span style="font-weight: bold;">Aguarda ...</span></h4>'*/
  message: '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i> <h4><span style="font-weight: bold;">Aguarda ...</span></h4>'


});


 $.ajax({
                 url: base+'loja/'+controller,
                 type: 'POST',
                 success: function (datad){

                  if(datad!=false)
                  {

                    $(".content-wrapper").html(datad);

                    //alert(controller);
                    if (controller=='funcionario') {

                   $('#t_b').removeClass('active');
                    $('#t_c').removeClass('active');
                    $('#t_d').removeClass('active');
                    $('#t_e').removeClass('active');
                    $('#t_a').addClass(' active');  
                    }
                    if (controller=='turno') {
                    $('#t_a').removeClass('active');
                    $('#t_c').removeClass('active');
                    $('#t_d').removeClass('active');
                    $('#t_e').removeClass('active');
                    $('#t_b').addClass('active'); 
                    }
                    if (controller=='loj') {
                    $('#t_a').removeClass('active');
                    $('#t_b').removeClass('active');
                    $('#t_d').removeClass('active');
                    $('#t_e').removeClass('active');
                    $('#t_c').addClass('active');
                    }

                    if (controller=='relatorio') {
                    $('#t_a').removeClass('active');
                    $('#t_b').removeClass('active');
                    $('#t_c').removeClass('active');
                    $('#t_e').removeClass('active');
                    $('#t_d').addClass('active');
                    }

                    if (controller=='avaliacao') {
                    $('#t_a').removeClass('active');
                    $('#t_b').removeClass('active');
                    $('#t_d').removeClass('active');
                    $('#t_c').removeClass('active');
                    $('#t_e').addClass('active');
                    }

                    if (true) {}  
                     $.unblockUI();
                 
                  }

                  else 
                  {

                    //alert('merda');
                    window.location.href = ' ';  //es aue redemiciona pagina
                  }
                 
                 
              }

       
   });

}

//datepicker
   $(function (){

  var today = new Date();
  var calc_ano_final=today.getFullYear()-16;
 // alert(calc_ano);

 /*  $('#datetimepicker1').datepicker({
    format: 'dd/mm/yyyy',
    endDate: new Date(calc_ano_final, today.getMonth(), today.getDate()),
   });*/ //pega data autal
    
    /*ou*/

   $('#datetimepicker1').bootstrapMaterialDatePicker({ 
    format : 'DD/MM/YYYY',
    lang : 'pt',
    maxDate: new Date(calc_ano_final, today.getMonth(), today.getDate()),
    time:false
  });

//==========================================================

  /*  $('#datetimepicker2').datepicker({
       format: 'dd/mm/yyyy',
      endDate: new Date(today.getFullYear(), today.getMonth(), today.getDate())
    });*/

    /*ou*/
  $('#datetimepicker2').bootstrapMaterialDatePicker({ 
    format : 'DD/MM/YYYY',
    lang : 'pt',
    maxDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
    time:false
  });

  //===============================================================

   /* $('#datetimepicker3').datepicker({
      format: 'dd/mm/yyyy',
     endDate: new Date(today.getFullYear(), today.getMonth(), today.getDate())
   });*/

    /*ou*/
   
    $('#datetimepicker3').bootstrapMaterialDatePicker({ 
    format : 'DD/MM/YYYY',
    lang : 'pt',
    maxDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
    time:false
  });


 /*   $('#datetimepicker1').bootstrapMaterialDatePicker
      ({
        time: false,
        clearButton: true
      });*/
 //=======================================================================     

  $('#time').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm'
      });


    
   });

//setar funcionario
function set_funcionario(id , bi, nif, dt_nasc, sexo, data_ini, data_fin, desb){

  
   $('#detalh').hide(); //vem ocultado campo descricao de deta
   $('#icon').removeClass('fa fa-chevron-circle-up'); 
   $('#icon').addClass('fa fa-chevron-circle-down');
   //vem ocultado campo descricao de deta

 $('#id_cl').val(id);
 $('#nb').html(bi);
 $('#dn').html(dt_nasc);
  $('#nn').html(nif);
  if (sexo='M') {
    $('#sx').html('Masculino');
  }
   if (sexo='F') {
    $('#sx').html('Feminina');
  }
    $('#di').html(data_ini);
     $('#df').html(data_fin);
     $('#decrib').html(desb);

 $('#modal_funcionario').modal('show');
     
}


function set_info_funcionario(id_user, nome, data_nasc, sexo, morada, bi, nif, email, n_tel, data_ini, data_fin, func, descr){
 
  
      $('#id_f').val(id_user);
      $('#nome').val(nome);
      $('#datetimepicker1').val(data_nasc);
      $('#selecao').val(sexo).change();
      $('#morada').val(morada);
      $('#bi_').val(bi);
      $('#nif').val(nif);
      $('#email').val(email);
      $('#number').val(n_tel );
      $('#datetimepicker2').val(data_ini); 
      $('#datetimepicker3').val(data_fin);
      $('#funcao').val(func).change(); 
      $('#des').val(descr);
     



}


//deleta funcionario
function deleta_funcionario(id_user)
{
// sinalizador alert(id_user);

swal({
  title: "Pretende remove-lo?",
/*  text: "se deletares funcionario nao vai ser possivel recuperar!",*/
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "sim, apagar ",
  closeOnConfirm: false
},
function(){
  $.post(base+'funcionario/deletar_funcionario', 
  {
      parm1:id_user,
  },
   function(data) {
    if(data==true)
    {   estatistica_numero();
        swal({
        title:"",
        text:"funcionario foi removido!",
        type:"success",
        timer:2000,
        showConfirmButton:false,
   });

      tabela_funcionario.ajax.reload();
     
    }

    else
    {
        swal({
        title:"",
        text:"funcionario nao foi removido!",
        type:"error",
        timer:2000,
        showConfirmButton:false,
                              });

    }
   
});

  
});
 }

//attribuir senha ao usuario
function set_acesso(id_, emaill){
 // alert('tetse');
 swal({
  title: "Quer dar acesso ao funcionario?",
  
  showCancelButton: true,
  confirmButtonColor: "#23CFE3",
  confirmButtonText: "Permite",
  closeOnConfirm: false
},
function(){
       var dt= new Date();
      var senha="frut&pao"+dt.getFullYear()+""+dt.getDate()+""+(dt.getMonth()+1)+""+dt.getHours()+""+dt.getMinutes()+""+dt.getSeconds();

$.post(base+'funcionario/acesso_funcioario', 
  {   parm1:id_,
      parm2:senha,

  },
   function(data) {
    if(data==true)
    {
        sweetAlert(emaill, "senha acesso:  "+senha);
        tabela_funcionario.ajax.reload();
    }

    else
    {
       swal({
        title:"",
        text:"acesso nao atribuido com sucesso",
        type:"error",
        timer:2000,
        showConfirmButton:false,
                              });

    }
   
});
     
});

}


//parte de imagens carregado para ficha de estudante
var input  = document.getElementById('input-fil');
var fileName = document.getElementById('file-nam');
     

input.addEventListener('change', function(){

  //$fileName.textContent = this.value;  //isso e pra mostrar caminho e nome  de ficheiro incluido
   var name=this.value;
  // console.log(name);

   var ext = name.substring(name.lastIndexOf('.') + 1);

    if(ext =="jpeg" || ext=="png"|| ext=="jpg"){
        //*********mostrar***********
  //========================================
   if (this.files && this.files[0]) {
        var file = new FileReader();
        file.onload = function(e) {

           document.getElementById("olho").src="";

            document.getElementById("olho").src = e.target.result;

        };       
        file.readAsDataURL(this.files[0]);
    }
    //================================
    }
    else{
     document.getElementById("olho").src ='<?= base_url();?>fich_compente/winy.png';
    }

 
});


function detalhes(){
 // alert('okkk');


if($('#detalh').is( ":visible" ))
{

$('#detalh').hide();
$('#icon').removeClass('fa fa-chevron-circle-up'); 
$('#icon').addClass('fa fa-chevron-circle-down');
}

else if($('#detalh').is( ":hidden" ))
{

$('#detalh').show();
$('#icon').removeClass('fa fa-chevron-circle-down');
$('#icon').addClass('fa fa-chevron-circle-up'); 
}

}

function  estatistica_numero(){
$.post(base+'funcionario/numero_funcionario', 
  {  },
   function(data) {

  $('#n_func').html('0');

  var c=JSON.parse(data);
  $.each(c, function(index, val) {
          var total=parseInt(val.n_funcionario) - 1 ;
         $('#n_func').html(total);

    });
});
}

function  defenir_permissoes(){

 $.ajax({
                 url: base+'funcionario/pega_funcao',
                 type: 'POST',
                 success: function (data){
                // alert(data);
                if (data=='adim') {
                  $('#adicionar').show();
                  $('#edit_del').show();

                }
                else{

                }

              }

       
   });

}


function limpa_form_funcionario(){
  $('#id_f').val('');
      $('#nome').val('');
      $('#datetimepicker1').val('');
      $('#selecao').val(1).change();
      $('#morada').val('');
      $('#bi_').val('');
      $('#nif').val('');
      $('#email').val('');
      $('#number').val('' );
      $('#datetimepicker2').val(''); 
      $('#datetimepicker3').val('');
      $('#funcao').val(1).change(); 
      $('#des').val('');
}

