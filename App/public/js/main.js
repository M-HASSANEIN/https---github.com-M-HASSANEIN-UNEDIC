
let button;
document.addEventListener('DOMContentLoaded', function () {
    function delestudent(event) {
        event.preventDefault();
        const id = event.target.getAttribute("data-id")
        console.log(id)

        let overlay = document.getElementById("overlay");
        console.log(overlay)
        let modal = document.querySelector(".modal");

        overlay.classList.add('visible');
        modal.style.display = "block";

        let close = document.querySelector(".close");
        close.addEventListener("click", () => {
            overlay.classList.remove('visible');
            modal.style.display = "none";
        });
        let cancel = document.getElementById("cancel");
        cancel.addEventListener("click", () => {
            overlay.classList.remove('visible');
            modal.style.display = "none";
        });

        let yes = document.getElementById("yes");
        yes.addEventListener("click", () => {
            window.location = this.href;
        });
    }

    button = document.querySelectorAll(".delete-student");
    for (let index = 0; index < button.length; index++) {
        const but = button[index];
        but.addEventListener("click", delestudent)
    }

});
