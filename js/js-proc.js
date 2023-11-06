document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("login-form");

    loginForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const email = document.getElementById("email").value;
        const senha = document.getElementById("senha").value;

        // Enviar as credenciais para o PHP
        fetch("php/proc-js.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: `email=${email}&senha=${senha}`,
        })
            .then(response => response.text())
            .then(data => {
                if (data === "login_sucesso") {
                    // Redirecionar para a página de boas-vindas
                    window.location.href = "index.html";
                } else {
                    // Exibir mensagem de erro
                    alert("Login falhou. Verifique suas credenciais.");
                }
            })
            .catch(error => {
                console.error("Erro ao processar o login: " + error);
            });
    });
});
