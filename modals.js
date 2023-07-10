document.querySelectorAll(".open-modal-onclick").forEach(el => {
  el.addEventListener("click", (evt) => {
    let idModal = el.getAttribute("data-modal");
    console.log("idModal:", idModal)
    document.querySelector("#"+idModal).classList.add("show");
    evt.preventDefault();
  })
});

document.querySelectorAll(".close-modal-onclick").forEach(el => {
  el.addEventListener("click", (evt) => {

    let formFailElement = document.querySelector("#modal-connect .form-fail")
    if(formFailElement) formFailElement.remove()
    
    document.querySelectorAll(".modal").forEach(el => {
        el.classList.remove('show');
    })

    evt.preventDefault();
  })
});


var emailConnect = document.getElementById("login");
emailConnect.addEventListener("keyup", function (event) {
  if(emailConnect.validity.typeMismatch) {
    emailConnect.setCustomValidity("Veuillez entrer un mail");
  } else {
    emailConnect.setCustomValidity("");
  }
});

var emailContact = document.getElementById("mail");
emailContact.addEventListener("keyup", function (event) {
  if(emailContact.validity.typeMismatch) {
    emailContact.setCustomValidity("Veuillez entrer un mail");
  } else {
    emailContact.setCustomValidity("");
  }
});

var telContact = document.getElementById("tel");
telContact.addEventListener("keyup", function (event) {
  if(telContact.validity.patternMismatch) {
    telContact.setCustomValidity("Veuillez entrer un numéro de téléphone");
  } else {
    telContact.setCustomValidity("");
  }
});
