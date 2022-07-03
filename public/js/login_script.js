//-------LOGIN---------

//Inizializzazione variabili
//variabili grafica
const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");

//variabili login
const loginForm = document.querySelector('#formLogin'),
      inEmail = loginForm.querySelector('#emailLogin'),
      inPass = loginForm.querySelector('.password'),
      textEmail = loginForm.querySelector('#textErrEmail'),
      textPass = loginForm.querySelector('#textErrPass');

//variabili registrazione
const regForm = document.querySelector('#formReg'),
      nome = document.querySelector('#nome'),
      inEmailR = regForm.querySelector('#emailReg'),
      inPassR = regForm.querySelector('#password'),
      inPassRConf = regForm.querySelector('#confirmPassword'),
      textNome = regForm.querySelector('#textErrNome'),
      textEmailR = regForm.querySelector('#textErrEmail'),
      textPassR = regForm.querySelector('#textErrPass'),
      icons = regForm.querySelectorAll('.icon');


 //Event listener per check registrazione
      nome.addEventListener('blur', checkName);
      inEmailR.addEventListener('blur', checkEmailR);
      inPassR.addEventListener('blur', checkPasswordR);
      inPassRConf.addEventListener('blur', checkConfirmPassword);

      const formStatus = {};  //controllo errori


    //icona occhio per vedere password
      pwShowHide.forEach(eyeIcon =>{
          eyeIcon.addEventListener("click", ()=>{
              pwFields.forEach(pwFields =>{
                  if(pwFields.type === "password"){
                      pwFields.type = "text";

                      pwShowHide.forEach(icon =>{
                          icon.classList.replace("bx-low-vision","bx-show");
                      })
                  }else{
                      pwFields.type = "password";
 
                      pwShowHide.forEach(icon =>{
                        icon.classList.replace("bx-show","bx-low-vision");
                    })
                  }
              })
          })
      })

//cambio container

      signUp.addEventListener("click", ()=>{
          container.classList.add('active');
          loginForm.classList.remove('error');
          textEmail.textContent = "";
          textPass.textContent = "";
      })

      login.addEventListener("click", ()=>{
        container.classList.remove('active');
        regForm.classList.remove('error');
        textNome.textContent = "";
        textEmailR.textContent = "";
        textPassR.textContent = "";
    })

    
//controllo dati login

loginForm.querySelector("#btnLogin").addEventListener("click", validazioneLog); 

function validazioneLog(event){

    
    let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    if(inEmail.value == ""){
        loginForm.classList.add('error');
        textEmail.textContent = "Email can't be blank";
        event.preventDefault();
    }else if(!inEmail.value.match(pattern)) {
        loginForm.classList.add('error');
        textEmail.textContent = "Please enter a valid email";
        event.preventDefault();
    }else
    {
        textEmail.textContent = "";
    }

    if(inPass.value == ""){
        loginForm.classList.add('error');
        textPass.textContent = "Password can't be blank";
        event.preventDefault();
    }else{
        textPass.textContent = "";
    }

    
}


//controllo dati register

let patternPass = /^(?=^.{6,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/; 
let patternEmail = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

function checkEmailR(event) {

  
  if(inEmailR.value == ""){

    regForm.classList.add('error');
    textEmailR.textContent = "Email can't be blank";
    formStatus.email = false;
    checkForm();

  }else if(!inEmailR.value.match(patternEmail)) {

    regForm.classList.add('error');
    textEmailR.textContent = "Please enter a valid email";

    formStatus.email = false;
    
    checkForm();


  }else{

     fetch(REGISTER_ROUTE+"/email/"+encodeURIComponent(String(inEmailR.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);

  }
}

function checkPasswordR(event) {

  if(inPassR.value == ""){
    regForm.classList.add('error');
    textPassR.textContent = "Password can't be blank";
    formStatus.password = false;
    

  }else if(!inPassR.value.match(patternPass) ){
    regForm.classList.add('error');
    textPassR.textContent = "Inserisci almeno 6 caratteri, un numero, una lettera maiuscola, una lettera minuscola e un carattere speciale";
    formStatus.password = false;


  }else{
    textPassR.textContent = "";
    formStatus.password = true;
  }

  checkForm();
}

function checkConfirmPassword(event) {

  if(inPassRConf.value == ""){
    regForm.classList.add('error');
    textPassR.textContent = "Password can't be blank";
    formStatus.confirmPassord = false;
    
  }else if (inPassRConf.value !== inPassR.value) {
    regForm.classList.add('error');
    textPassR.textContent = "Please insert same passwords";
    formStatus.confirmPassord = false;

  }else if(!inPassRConf.value.match(patternPass) ){
    regForm.classList.add('error');
    textPassR.textContent = "Inserisci almeno 6 caratteri, un numero, una lettera maiuscola, una lettera minuscola e un carattere speciale";
    formStatus.confirmPassord = false;


  }else{
    textPassR.textContent = "";
    formStatus.confirmPassord = true;
  }

  checkForm();
}

function checkName(event) {

  if(nome.value == ""){

    regForm.classList.add('error');
    textNome.textContent = "Nome can't be blank";
    formStatus.name = false;

    }else{
        textNome.textContent = "";
        formStatus.name = true;
    }

    checkForm();
 
}


function fetchResponse(response) {
  if (!response.ok) return null;
  return response.json();
}


function jsonCheckEmail(json) {
  console.log(json.exists);
  if (formStatus.email = !json.exists) {

      textEmailR.textContent = "";
  } else {
      textEmailR.textContent = "Email alredy exists";
      regForm.classList.add('error');
  }
  checkForm();
}


function checkForm() {
  let check = Object.keys(formStatus).length !== 4 || Object.values(formStatus).includes(false);
  document.getElementById('btnReg').disabled = check;

  if(!check)
  regForm.classList.remove('error');
}
