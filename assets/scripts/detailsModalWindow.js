document.querySelectorAll(".details-btn").forEach(function(e) {
    e.addEventListener("click",function (){
        document.querySelector(".details-modal-window-bg").classList.toggle("hide");
        console.log(e.parentElement.nextSibling)
    })
})

