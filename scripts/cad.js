function on_pass_cad() {
  let btn_senha_cadastro = document.getElementById("btn_senha_cad");

  btn_senha_cadastro.style.opacity = 1;
}

function eye_pass_cad(){
    let senha = document.getElementById("input_senha");
    let btn_senha_cad = document.getElementById("btn_senha_cad");
  
    if (senha.type === "password") {
      senha.setAttribute("type", "text");
      btn_senha_cad.setAttribute("class", "bi bi-eye-slash-fill");
    } else {
      senha.setAttribute("type", "password");
      btn_senha_cad.setAttribute("class", "bi bi-eye-fill");
    }
}
