function on_pass_cad() {
  let btn_senha_cad = document.getElementById("btn_senha_cad");
  let icon_senha = document.getElementById("icon_senha")

  icon_senha.style.opacity = 0;
  btn_senha_cad.style.opacity = 1;
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
