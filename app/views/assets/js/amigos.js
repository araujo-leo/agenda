function editarAmigo(cod) {
    let elements = document.querySelectorAll(".amigoDado" + cod);
    elements.forEach(element => {
        element.removeAttribute("readonly");
        element.classList.add("editavel");
        element.classList.remove("nao-editavel");
    });

    document.getElementById("editAmigo" + cod).style.display = "none";
    document.getElementById("deleteAmigo" + cod).style.display = "none";
    document.getElementById("confirmEditAmigo" + cod).style.display = "inline";
    document.getElementById("cancelEditAmigo" + cod).style.display = "inline";
}

function cancelarEditAmigo(cod) {
    let elements = document.querySelectorAll(".amigoDado" + cod);
    elements.forEach(element => {
        element.setAttribute("readonly", "readonly");
        element.classList.remove("editavel");
        element.classList.add("nao-editavel");
    });

    document.getElementById("editAmigo" + cod).style.display = "inline";
    document.getElementById("deleteAmigo" + cod).style.display = "inline";
    document.getElementById("confirmEditAmigo" + cod).style.display = "none";
    document.getElementById("cancelEditAmigo" + cod).style.display = "none";
}

function deleteAmigo(cod) {
    Swal.fire({
        title: 'Você tem certeza?',
        text: "Você não poderá reverter isso!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Prosseguir',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Deletado!',
                text: 'O item foi deletado.',
                icon: 'success',
                showConfirmButton: false,
                timer: 1500 
            }).then(() => {
                window.location.href = '../public/deletaramigo?id=' + cod + "autentication=confirmed";
            });
        }
    });
}

document.getElementById("mostrarOcultarBtn").addEventListener("click", function() {
    var formulario = document.getElementById("cadastrar_amigos");
    if (formulario.style.display === "none") {
        formulario.style.display = "block";
        this.textContent = "Ocultar Formulário";
    } else {
        formulario.style.display = "none";
        this.textContent = "Mostrar Formulário";
    }
});