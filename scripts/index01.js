let email = document.getElementById("input_email");

function eye_pass() {
    let senha = document.getElementById("input_senha");
    let btn_senha = document.getElementById("btn_senha");
  
    if (senha.type === "password") {
      senha.setAttribute("type", "text");
      btn_senha.setAttribute("class", "bi bi-eye-slash-fill");
    } else {
      senha.setAttribute("type", "password");
      btn_senha.setAttribute("class", "bi bi-eye-fill");
    }
  }

function on_pass() {
  let icon_senha = document.getElementById("icon_senha");
  let btn_senha = document.getElementById("btn_senha");

  icon_senha.style.opacity = 0;
  btn_senha.style.opacity = 1;
}


