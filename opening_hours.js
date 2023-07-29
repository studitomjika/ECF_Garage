document.getElementsByName("update-hours-btn").forEach((update_btn) => {
  update_btn.onclick = updateHours
});

function updateHours (event) {
  const tSize = event.target.id.split('-').length
  const idNumber = event.target.id.split('-')[tSize - 1]

  document.querySelectorAll(".update-input").forEach((update_input) => {
    update_input.setAttribute("disabled", "disabled")  
  });

  let validateBtn = document.getElementById("validate-hours-btn-"+idNumber)
  validateBtn.removeAttribute("disabled")
  let inputId = document.getElementById("hours-text-"+idNumber)
  inputId.removeAttribute("disabled")
  inputId.focus()
}

document.getElementsByName("validate-hours-btn").forEach((validate_btn) => {
  validate_btn.onclick = validateHours
});

function validateHours (event) {
  const tSize = event.target.id.split('-').length
  const idNumber = event.target.id.split('-')[tSize - 1]
  let formIdHours = document.getElementById("update-hours-id")
  formIdHours.setAttribute("value", idNumber)
  let newText = document.getElementById("hours-text-"+idNumber)
  let formTextHours = document.getElementById("update-hours-input")
  formTextHours.setAttribute("value", newText.value)

  document.hoursFormUpdate.submit()
}