var base='http://192.168.1.68/frut&pao/';

$("#add").click(function(){
  //limpar campos
  //limpar();
  $("#modal_loja").modal({backdrop: "static"});
});
 
 function limpar() {
   $('#zona').val('');
   $('#data_i').val('');
   $('#data_E').val('');
   $('#rua').val('');
   $('#contacto').val('');
   $('#desc').val('');
 }

$("#form_1").submit(function(event) {
  var form = $('#form_1');
  event.preventDefault();

  $.ajax({
    url: base+'loja/criar_loja',
    type: "POST",
    data: form.serialize(),
    success: function(data){
     
      if (data==true) {
        swal({
          title:"",
          text: "Loja Criada com sucesso",
          button:false,
          timer:1000,
          type: "success",
          showConfirmButton:false,
        });
        tabela_turno.ajax.reload();
        limpar();
      }else {
        swal({
          title:"",
          text: "Erro na Criação da loja",
          button:false,
          timer:2000,
          type: "error",
          showConfirmButton:false,
        });
      }
    }
  });
  $('#modal_loja').modal('hide');
});

// DataTable
var tabela_turno=$('#tab22').DataTable(
{
'paging':true,
'info':false,
'filter':false,
"pageLength": 5,
'statesave':false,
"responsive":true,
"autoWidth": false,
"processing": true,
"oLanguage": {
      "sEmptyTable":     "Nenhum registro de loja encontrado",
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
          "sNext": '<span style="font-weight: bold; font-size: 14px; color: #0274BD"> &gt; </span>',
            "sPrevious": '<span style="font-weight: bold; font-size: 14px; color: #0274BD"> &lt; </span>',
          "sFirst": "Primeiro",
          "sLast":"Ultimo"
      },
      "oAria": {
          "sSortAscending":  ": Ordenar colunas de forma ascendente",
          "sSortDescending": ": Ordenar colunas de forma descendente"
      }
  },
'ajax':{

"url":base+'loja/listar_loja',
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


// mudar de pagina
function ir_para_(controller, id){

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
                     $.unblockUI();

                  }

                  else
                  {

                    window.location.href = ' ';  
                  }


              }


   });

  if (id)
  {
     set_info(id);
   }

}

function set_info(id){
      $.ajax({
      url: base+'loja/listas_loja_dados',
      type: 'POST',
      data:{'id_loja':id},
      success: function (data){

        $('#editar').html('');
        $('#list').html('');
        $('#list2').html('');

        var c = JSON.parse(data);
        $.each(c, function(index, val) {
                var status;
                var id= val.id_lojja;
                var zona= val.zona;
                var endereco = val.rua;
                var contacto = val.contacto;
                var data_i = val.data_inaugoracao;
                var data_e = val.data_encerramento;
                var statu = val.estado;
                var desc = val.descricao;

                if (statu==1) {
                  status = '<span style="background:green; color:white">Activo</span>';
                }else {
                  status = '<span style="background:red; color:white">Inactivo</span>';
                }
               

                $('#editar').append('<button  class="btn btn-primary" onclick="set_loja(\''+id+'\',\''+zona+'\',\''+endereco+'\',\''+contacto+'\',\''+data_i+'\',\''+data_e+'\',\''+statu+'\',\''+desc+'\',)"><i class="fa fa-edit"></i></button>&nbsp;&nbsp;<button class="btn btn-primary "><i class="fa fa-gear"></i></button>');
                $('#list').append("<li><strong><span>Zona: </span></strong>"+zona+"</li><li><strong> <span>Endereço: </span></strong>"+endereco+"</li><li> <strong><span>Contacto: </span></strong> "+contacto+"</li>");
                $('#list2').append('<tr><th>Data Inaugoração</th><th>'+data_i+'</th></tr><tr><th>Data Encerramento</th><th>'+data_e+'</th></tr><tr><th>Estado</th><th>'+status+'</th></tr>');
                 });
      }
    });

}

// ajax return value '+zona+', '+endereco+', '+data_i+', '+data_e+', '+contacto+', '+statu+', '+desc+'
function set_loja(id, zona, endereco,contacto, data_i, data_e,  statu, desc) {
  //alert("terrasystem: "+statu+":"+zona+":"+endereco+":"+data_i+":"+data_e+":"+contacto+":"+desc+":");
  $('#id_lojja').val(id);
  $('#zona').val(zona);
  $('#rua').val(endereco);
  $('#data_i').val(data_i);
  $('#data_E').val(data_e);
  $('#contacto').val(contacto);
  $('#estado').val(statu).change();
  $('#desc').val(desc);

  $("#modal_loja_info").modal({backdrop: "static"});
}

// editar loja form

var form1 = $('#form_2');

form1.submit(function(event) {
event.preventDefault();
id_=$('#id_lojja').val();

   $.ajax({
    url: base+'loja/update_loja',
    type: "POST",
    data: form1.serialize(),
    success: function(data){

      if (data==true) {

        $("#modal_loja_info").modal('hide');

        swal({
          title:"",
          text: "Loja alterao com sucesso",
          button:false,
          timer:1000,
          type: "success",
          showConfirmButton:false,
        });

        set_info(id_);

        tabela_turno.ajax.reload();
        limpar();

      }
      else {

        swal({
          title:"",
          text: "erro em altera loja",
          button:false,
          timer:2000,
          type: "error",
          showConfirmButton:false,
        });
      }

    },

  });
 
});

