document.getElementById("add-service-btn").onclick = addService;

function addService () {
  const textService = document.getElementById("new-service").value
  let formTextService = document.getElementById("add-service-input")
  formTextService.setAttribute("value", textService)
  console.log(formTextService)

  document.servicesForm.submit()
}