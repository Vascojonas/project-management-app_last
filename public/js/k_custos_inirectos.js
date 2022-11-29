


let monomento = document.getElementById("monomento");
   
if(monomento){
let modal =document.getElementById('btn');


monomento.addEventListener('click', ()=>{
    modal.click();
    modal.parentNode.classList.remove("d-none")
})

let valor_emolumento = document.getElementById("valor_emolumento");
let p_emolumento = document.getElementById("percentual");
let r_emolumento = document.getElementById("emolumento_percentual");

valor_emolumento.addEventListener('keydown', (e)=>{



    console.log(e.target.value);
    if(e.target.value){

        let valor =parseFloat(e.target.value);
        let p='';
        if(valor<=5000000){
            p= 0.95;
        }else if(valor> 5000000 && valor <=15000000){
            p=0.88;
        }else if(valor > 15000000 ){
            p=0.70;
        }
    
        let result=  valor * p;
        p_emolumento.innerHTML = `( ${p*100} %)`;
        r_emolumento.value= result;

        monomento.value= p*100;

        Livewire.emit('getValue1ForInput', monomento.value);
        
    }else{
        p_emolumento.innerHTML=""
        r_emolumento.value=""
        monomento.value=""
        Livewire.emit('getValue1ForInput', 0);

    }

})

}


function custosIndirectos (){
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-outline-success ml-2',
          cancelButton: 'btn btn-outline-secondary'
        },
        buttonsStyling: false
      })
      
      swalWithBootstrapButtons.fire({
        title: '',
        text: "Desejas utilizar o valor já calculado? ",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Não',
        confirmButtonText: 'Sim',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('custos_indirectos_pronto').click()
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
              document.getElementById('custos_indirectos').click()
          }
      })
}

function exibirLegenda(e){
    
    document.getElementById(e.target.getAttribute("data-legenda")).classList.remove("d-none");
  }
  
  function fecharLegenda(e){
  document.getElementById(e.target.getAttribute("data-legenda")).classList.add("d-none");

  }

function despesaInicial(e){
   let btn= document.getElementById("btn-di");
   btn.click()
   btn.parentNode.classList.remove("d-none");
}


function despesaLocal(e){
  let btn= document.getElementById("btn-al")
  btn.click()
  btn.parentNode.classList.remove("d-none");
}

function administracaoCentral(e){
  let btn= document.getElementById("btn-ac")
  btn.click()
  btn.parentNode.classList.remove("d-none");
}

function despesaFinaceira(){
  let btn =document.getElementById("btn-df");
  btn.click()
  btn.parentNode.classList.remove("d-none");
}

function riscos(e){
  let btn= document.getElementById("btn-ri");
  btn.click()
  btn.parentNode.classList.remove("d-none");
}


hiddenModal()
function hiddenModal(){
  console.log("Eu de novo")
  let modals = document.getElementsByClassName("modal-hidden");

  for( m of modals){
      m.classList.add("d-none");
  }
}


function checkRisco(e){
   let risco = e.target.getAttribute("data-risco");
   document.getElementById("risco_input").value=risco;
   document.getElementById("riscos").value=risco;
}

function inputRisco(e){
  
  document.getElementById("riscos").value = (e.target.value)?e.target.value:0;
}


function calcularDi(){
    let cd = document.getElementById("di-cd").value
    let banco = document.getElementById("di-banco").value
    let resultado = document.getElementById("di-resultado")

      cd = (cd)?cd:0;
      banco = (banco)?banco:0;

      resultado.value = cd * 0.315 * banco/100;
      document.getElementById("despesa_inicial").value =cd * 0.315 * banco/100;

}



function calcularAl(){
  let al = document.getElementById("al-al").value
  let cd = document.getElementById("al-cd").value
  let resultado = document.getElementById("al-resultado")

    cd = (cd)?cd:0;
    al = (al)?al:0;

    resultado.value = (cd)?al/cd:0;
    document.getElementById("administracao_local").value =resultado.value;

}

function calcularAc(){
  let ac = document.getElementById("ac-ac").value
  let c = document.getElementById("ac-canual").value
  let resultado = document.getElementById("ac-resultado")

    cd = (ac)?cd:0;
    al = (c)?al:0;

    resultado.value = (c)?ac/c:0;
    document.getElementById("administracao_central").value =resultado.value;

}



function calcularDf(){
  let i = parseFloat( document.getElementById("df-i").value)
  let n = parseFloat(document.getElementById("df-n").value)
  let resultado = document.getElementById("df-resultado")

    i = (i)?i:0;
    n = (n)?n:0;


    resultado.value = (Math.pow((1+i), 2) -1);

    document.getElementById("despesas_finaceiras").value =resultado.value;

}