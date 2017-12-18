var base='http://192.168.1.66/frut&pao/';
//var base_url='http://localhost/frut&pao/'

 var feedback=$('#feed'); 

//==========================================Arranque del funcao===========================================

$(document).ready(function (){

$("#senha_1").keyup(change_());  
$("#senha_2").keyup(change_());
$("#senha_3").keyup(change_());

abrir_ou_nao_ir_para_turno();

//========================================================================================================



});

function change_(){
var senha=$("#senha_2").val();
var senha_antigo=$("#senha_1").val();
var conferir=$("#senha_3").val();

if(senha=='' || conferir=='' ){
  $("#feed").html("<div style='text-align:center;  font-size: 12px' class='small label label-warning '> <span style='size:100px'>Campos vazios preenche-los</span></div>");
  document.getElementById("mudar").disabled=true;
  feedback.show();
}

else{

if(senha!=conferir){
  $("#feed").html("<div style='text-align:center;  font-size: 12px' class='small label label-danger'> <span>Senha nao corresponde </span></div>");
  document.getElementById("mudar").disabled=true;
  feedback.show();
}

else {

  $("#feed").html("<div style='text-align:center;  font-size: 12px' class='small label label-success'> <span> Senha correspondente </span></div>");
  feedback.show();

  if (senha_antigo!='') {
  document.getElementById("mudar").disabled=false;
  }
  else
  {
    document.getElementById("mudar").disabled=true;
  }

  setTimeout(function(){
        feedback.hide();
     },1000);
}

}

}

function lagout(){
  //alert('lagout');
  $.post(base+'login/logout', { }, 
   function(data) {
    if (data=='pendente') {
    swal({
          title:"",
          text:"Turno ainda pedente Termine-o primeiro!",
          type:"info",
          timer:3000,
          showConfirmButton:false,
          });
  }
   else{
    window.location.href = ' ';
    }

   });
}

function muda_senha(){
// alert('winy');
var senha_=$("#senha_2").val();
var senha_antigo_=$("#senha_1").val();

  $.post(base+'funcionario/mudar_senha', 
  {
      parm1:senha_antigo_,
      parm2:senha_,
  },
   function(data) {

   // alert(data);

    if(data==true)
    {  
       $('#modal_mudar_senha').modal('hide');
       limpa_muda_senha();
        swal({
        title:"",
        text:"Senha foi alterado!",
        type:"success",
        timer:2000,
        showConfirmButton:false,
   });
     
    }

    else
    {$('#modal_mudar_senha').modal('hide');
    limpa_muda_senha();
        swal({
        title:"",
        text:"senha nao foi alterado!",
        type:"error",
        timer:2000,
        showConfirmButton:false,
  });

    }

   
});

}

function limpa_muda_senha(){
  $("#senha_1").val('');
  $("#senha_2").val('');
  $("#senha_3").val('');
}

function ir_para_turno(){
  swal({
  title: "Quer iniciar logo turno",
/*  text: "Quer iniciar logo turno ",*/
  showCancelButton: true,
  confirmButtonColor: "#1BBD39",
  confirmButtonText: "ya, concordo",
  cancelButtonClass: 'btn btn-danger',
  buttonsStyling: false,
  imageUrl: base+'fich_compente/14469563_595253984008889_3422939138102187882_n.png',
  imageWidth: 400,
  imageHeight: 400,
  showLoaderOnConfirm: true,
  customClass: 'animated tada',
},
function(){

 $.ajax({
                 url: base+'loja/turno',
                 type: 'POST',
                 success: function (datad){
                  if(datad!=false)
                  {

                    $(".content-wrapper").html(datad);

                    $('#t_a').removeClass('active');
                    $('#t_c').removeClass('active');
                    $('#t_b').addClass('active'); 
                   
                /*   swal({
                          title:"",
                          text:"",
                          timer:2000,
                          showConfirmButton:false,
                              });*/
                 
                  }

                  else 
                  {

                    //alert('merda');
                    window.location.href = ' ';  //es aue redemiciona pagina
                  } 
              }

       
   });

});

}

function  abrir_ou_nao_ir_para_turno(){

 $.ajax({
                 url: base+'funcionario/pega_funcao',
                 type: 'POST',
                 success: function (data){
                // alert(data);
                if (data!='adim') {

                ir_para_turno();
                
                }
                else{
                
                }

              }

       
   });

}
