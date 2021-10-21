

let button;
document.addEventListener('DOMContentLoaded', function () {

    function delestudent(event) {
        event.preventDefault();
        const id = event.target.getAttribute("data-id")
        console.log(id)
        if (confirm("Are you sure you want to delete this student ?")) {
            window.location = this.href
        }
    }

    button = document.querySelectorAll(".delete-student");
    for (let index = 0; index < button.length; index++) {
        const but = button[index];
        but.addEventListener("click", delestudent)
    }

});
