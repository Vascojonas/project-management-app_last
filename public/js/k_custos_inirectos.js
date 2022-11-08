


let monomento = document.getElementById("monomento");
   
if(monomento){
let modal =document.getElementById('btn');

monomento.addEventListener('click', ()=>{
    modal.click();
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





