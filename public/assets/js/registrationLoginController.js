if(document.body.id === "registration"){
  document.getElementById("passwordConfirmation").addEventListener("blur", CheckPassword);
}

(() => {
  'use strict'

  const forms = document.querySelectorAll('.needs-validation');

  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      //console.log(CheckPassword());
      console.log("sono dentro il controllo");
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      
      if(document.body.id === "registration"){
        if (!CheckPassword()) {
          event.preventDefault();
          event.stopPropagation();
        }
      }

      form.classList.add('was-validated')
    }, false)
  })
})()

function CheckPassword() {
    let password = document.getElementById("password");
    let conferma_password = document.getElementById("passwordConfirmation");
    console.log(password.value+' '+conferma_password.value);
    
    if (password.value !== conferma_password.value) {
      conferma_password.setCustomValidity("Le password non corrispondono.");
      console.log("password differenti");
      return false;
    }else{
      conferma_password.setCustomValidity("");
      return true;
    }

}