function editarComercio(cod) {
    let elements = document.querySelectorAll(".comercioDado" + cod);
    elements.forEach(element => {
        element.removeAttribute("readonly");
        element.classList.add("editavel");
        element.classList.remove("nao-editavel");
    });

    document.getElementById("editComercio" + cod).style.display = "none";
    document.getElementById("deleteComercio" + cod).style.display = "none";
    document.getElementById("confirmEditComercio" + cod).style.display = "inline";
    document.getElementById("cancelEditComercio" + cod).style.display = "inline";
}

function cancelarEditComercio(cod) {
    let elements = document.querySelectorAll(".comercioDado" + cod);
    elements.forEach(element => {
        element.setAttribute("readonly", "readonly");
        element.classList.remove("editavel");
        element.classList.add("nao-editavel");
    });

    document.getElementById("editComercio" + cod).style.display = "inline";
    document.getElementById("deleteComercio" + cod).style.display = "inline";
    document.getElementById("confirmEditComercio" + cod).style.display = "none";
    document.getElementById("cancelEditComercio" + cod).style.display = "none";
}

function deleteComercio(cod) {
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
            // Exibe o alerta de sucesso
            Swal.fire({
                title: 'Deletado!',
                text: 'O item foi deletado.',
                icon: 'success',
                showConfirmButton: false,
                timer: 1500 // Duração do alerta em milissegundos (1,5 segundos)
            }).then(() => {
                // Redireciona após o SweetAlert ser fechado
                window.location.href = '../public/deletarcomercio?id=' + cod;
            });
        }
    });
}

document.getElementById("mostrarOcultarBtn").addEventListener("click", function() {
    var formulario = document.getElementById("cadastrar_comercio");
    if (formulario.style.display === "none") {
        formulario.style.display = "block";
        this.textContent = "Ocultar Formulário";
    } else {
        formulario.style.display = "none";
        this.textContent = "Mostrar Formulário";
    }
});