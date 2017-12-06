//========================================
//var base='http://192.168.1.86/frut&pao/';
var base='http://frutapao.cv/';
//========================================
//alert('merda');
function recover() {

var email=$('#id_email').val();
var dt= new Date();
var senha_gerado="frut&pao"+dt.getFullYear()+""+dt.getDate()+""+(dt.getMonth()+1)+""+dt.getHours()+""+dt.getMinutes()+""+dt.getSeconds();


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
  message: '<img width="100px" height="80px" src="'+base+'preloader.gif" /><h4><span style="font-weight: bold;">Aguarda ...</span></h4>'


});

		  $.post(base+'funcionario/recupera_senha', 
  {
      parm1:email,
      parm2:senha_gerado,
  },
   function(data) {

    if(data==true)
    {   
    	$('#id_email').val('');
    	$('#modal_log').modal('hide');
      $.unblockUI();

        swal({
        title:"",
        text:"Consulta Email senha foi enviado!",
        type:"success",
        timer:2000,
        showConfirmButton:false,
   });

    }

    else
    {
    	$('#id_email').val('');
    	$('#modal_log').modal('hide');
    	$.unblockUI();
        swal({
        title:"",
        text:"Erro em recuperacao verifica Email!",
        type:"error",
        timer:2000,
        showConfirmButton:false,
                              });


    }
   
});
 // alert(email);
	}	