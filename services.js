document.getElementById("add-service-btn").onclick = addService

function addService () {
  const textService = document.getElementById("new-service").value
  let formTextService = document.getElementById("add-service-input")
  formTextService.setAttribute("value", textService)

  document.servicesFormAdd.submit()
}

document.getElementsByName("delete-service-btn").forEach((delete_btn) => {
  delete_btn.onclick = deleteService
});

function deleteService (event) {
  const tSize = event.target.id.split('-').length
  const idNumber = event.target.id.split('-')[tSize - 1]
  let formIdService = document.getElementById("delete-service-input")
  formIdService.setAttribute("value", idNumber)

  document.servicesFormDelete.submit()
}

document.getElementsByName("update-service-btn").forEach((update_btn) => {
  update_btn.onclick = updateService
});

function updateService (event) {
  const tSize = event.target.id.split('-').length
  const idNumber = event.target.id.split('-')[tSize - 1]

  document.querySelectorAll(".update-input").forEach((update_input) => {
    update_input.setAttribute("disabled", "disabled")  
  });

  let validateBtn = document.getElementById("validate-service-btn-"+idNumber)
  validateBtn.removeAttribute("disabled")
  let inputId = document.getElementById("service-text-"+idNumber)
  inputId.removeAttribute("disabled")
  inputId.focus()
}

document.getElementsByName("validate-service-btn").forEach((validate_btn) => {
  validate_btn.onclick = validateService
});

function validateService (event) {
  const tSize = event.target.id.split('-').length
  const idNumber = event.target.id.split('-')[tSize - 1]
  let formIdService = document.getElementById("update-service-id")
  formIdService.setAttribute("value", idNumber)
  let newText = document.getElementById("service-text-"+idNumber)
  let formTextService = document.getElementById("update-service-input")
  formTextService.setAttribute("value", newText.value)

  document.servicesFormUpdate.submit()
}