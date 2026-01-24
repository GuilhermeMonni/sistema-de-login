function logout() { //popup logout
    Swal.fire({
        title: 'Deseja sair?',
        text: 'Você será desconectado do sistema',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Sim, sair',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: 'var(--colorAzulSecundary)',
        cancelButtonColor: '#6c757d'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'logout.php';
        }
    });
}