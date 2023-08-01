document.getElementsByName("validate-comments-btn").forEach((validate_btn) => {
    validate_btn.onclick = validateComments
  });
  
  function validateComments (event) {
    
    let commentCheckBoxes = document.getElementsByName("comment_cb")

    
    let formIdComments = document.getElementById("update-comments-id")
    formIdComments.setAttribute("value", ids)

    let newText = document.getElementById("hours-text-"+idNumber)
    let formTextHours = document.getElementById("update-comments-input")
    formTextHours.setAttribute("value", newText.value)
  
    document.hoursFormUpdate.submit()
  }