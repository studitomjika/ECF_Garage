document.querySelectorAll(".open-modal-onclick").forEach(el => {
  el.addEventListener("click", (evt) => {
    let idModal = el.getAttribute("data-modal");
    document.querySelector("#"+idModal).classList.add("show");
    evt.preventDefault();
  })
});

document.querySelectorAll(".close-modal-onclick").forEach(el => {
  el.addEventListener("click", (evt) => {
    document.querySelectorAll(".modal").forEach(el => {
        el.classList.remove('show');
    })

    evt.preventDefault();
  })
});