function validaLogin() {
    var email = formAcesso.email.value;
    var senha = formAcesso.senha.value;
    var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
  
    if (email == "") {
      document.getElementById('email').className = "alert alert-danger";
      document.getElementById('email').innerHTML = "Favor preencher o campo e-mail";
      document.getElementById('email').style.display = 'block';  
    }else {
      document.getElementById('email').style.display = 'none';
    }
  
    if (senha == "") {
      document.getElementById('senha').className = "alert alert-danger";
      document.getElementById('senha').innerHTML = "Favor preencher o campo senha";
      document.getElementById('senha').style.display = 'block'; 
      return false;
    }else if (nome.length < 4) {
      document.getElementById('senha').className = "alert alert-danger";
      document.getElementById('senha').innerHTML = "A senha deve ter no minimo 4 caracteres";
      document.getElementById('senha').style.display = 'block';
    }else {
      document.getElementById('senha').style.display = 'none';
      }
  }