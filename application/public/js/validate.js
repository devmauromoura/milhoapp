$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  });

$(function() {
    $('.dinheiro').mask('#.##0,00', {reverse: true});
  });


/***** Validacao Barracas *****/
function validarBarraca() {
  var nome = formBarraca.nome.value;
  var semestre = formBarraca.semestre.value;
  var periodo = formBarraca.periodo.value;
  var curso = formBarraca.curso.value;
  var pagamento = formBarraca.pagamento.value;
    
  if (nome == "") {
      document.getElementById('nome').className = "alert alert-danger";
      document.getElementById('nome').innerHTML = "Favor preencher o nome";
      document.getElementById('nome').style.display = 'block';   
  }else if (nome.length < 4) {
      document.getElementById('nome').className = "alert alert-danger";
      document.getElementById('nome').innerHTML = "Favor preencher o nome com no minimo 4 caracteres";
      document.getElementById('nome').style.display = 'block';
  }else {
      document.getElementById('nome').style.display = 'none';
  }

  if (semestre == "") {
    document.getElementById('semestre').className = "alert alert-danger";
    document.getElementById('semestre').innerHTML = "Favor preencher o semestre";
    document.getElementById('semestre').style.display = 'block';
  }else {
    document.getElementById('semestre').style.display = 'none';
  }

  if (periodo == "") {
    document.getElementById('periodo').className = "alert alert-danger";
    document.getElementById('periodo').innerHTML = "Favor preencher o periodo";
    document.getElementById('periodo').style.display = 'block';   
  }else {
    document.getElementById('periodo').style.display = 'none';
  }

  if (curso == "") {
    document.getElementById('curso').className = "alert alert-danger";
    document.getElementById('curso').innerHTML = "Favor preencher o curso";
    document.getElementById('curso').style.display = 'block';   
  }else {
    document.getElementById('curso').style.display = 'none';
  }

  if (pagamento == "") {
    document.getElementById('pagamento').className = "alert alert-danger";
    document.getElementById('pagamento').innerHTML = "Favor preencher o pagamento";
    document.getElementById('pagamento').style.display = 'block';   
    formBarraca.nome.focus();
    return false;
  }else {
    document.getElementById('pagamento').style.display = 'none';
  }
}

/***** Validacao Pratos *****/
function validarPrato() {
  var nome = cadastrarPrato.nome.value;
  var desc = cadastrarPrato.desc.value;
  var valor = cadastrarPrato.valor.value;
    
  if (nome == "") {
      document.getElementById('errNomePrato').className = "alert alert-danger";
      document.getElementById('errNomePrato').innerHTML = "Favor preencher o nome do prato";
      document.getElementById('errNomePrato').style.display = 'block';   
  }else if (nome.length < 4) {
      document.getElementById('errNomePrato').className = "alert alert-danger";
      document.getElementById('errNomePrato').innerHTML = "Favor preencher o nome com no minimo 4 caracteres";
      document.getElementById('errNomePrato').style.display = 'block';
  }else {
      document.getElementById('errNomePrato').style.display = 'none';
  }

  if (desc == "") {
    document.getElementById('errDescPrato').className = "alert alert-danger";
    document.getElementById('errDescPrato').innerHTML = "Favor preencher a descrição do prato";
    document.getElementById('errDescPrato').style.display = 'block';   
  }else if (nome.length < 4) {
      document.getElementById('errDescPrato').className = "alert alert-danger";
      document.getElementById('errDescPrato').innerHTML = "Favor preencher a descrição com no minimo 4 caracteres";
      document.getElementById('errDescPrato').style.display = 'block';
  }else {
      document.getElementById('errDescPrato').style.display = 'none';
  }

  if (valor == "") {
    document.getElementById('errValorPrato').className = "alert alert-danger";
    document.getElementById('errValorPrato').innerHTML = "Favor preencher o valor";
    document.getElementById('errValorPrato').style.display = 'block';   
    cadastrarPrato.nome.focus();
    return false;
  }else {
    document.getElementById('errValorPrato').style.display = 'none';
  }
}

function valAltPrato() {
  var nome = alterarPrato.nome.value;
  var desc = alterarPrato.desc.value;
  var valor = alterarPrato.valor.value;
    
  if (nome == "") {
      document.getElementById('errNomePratoModal').className = "alert alert-danger";
      document.getElementById('errNomePratoModal').innerHTML = "Favor preencher o nome do prato";
      document.getElementById('errNomePratoModal').style.display = 'block';   
  }else if (nome.length < 4) {
      document.getElementById('errNomePratoModal').className = "alert alert-danger";
      document.getElementById('errNomePratoModal').innerHTML = "Favor preencher o nome com no minimo 4 caracteres";
      document.getElementById('errNomePratoModal').style.display = 'block';
  }else {
      document.getElementById('errNomePratoModal').style.display = 'none';
  }

  if (desc == "") {
    document.getElementById('errDescPratoModal').className = "alert alert-danger";
    document.getElementById('errDescPratoModal').innerHTML = "Favor preencher a descrição do prato";
    document.getElementById('errDescPratoModal').style.display = 'block';   
  }else if (nome.length < 4) {
      document.getElementById('errDescPratoModal').className = "alert alert-danger";
      document.getElementById('errDescPratoModal').innerHTML = "Favor preencher a descrição com no minimo 4 caracteres";
      document.getElementById('errDescPratoModal').style.display = 'block';
  }else {
      document.getElementById('errDescPratoModal').style.display = 'none';
  }

  if (valor == "") {
    document.getElementById('errValorPratoModal').className = "alert alert-danger";
    document.getElementById('errValorPratoModal').innerHTML = "Favor preencher o valor";
    document.getElementById('errValorPratoModal').style.display = 'block';   
    alterarPrato.nome.focus();
    return false;
  }else {
    document.getElementById('errValorPratoModal').style.display = 'none';
  }
}

/***** Validacao Bebidas *****/
function validarBebida() {
  var nome = cadastrarBebida.nome.value;
  var desc = cadastrarBebida.desc.value;
  var valor = cadastrarBebida.valor.value;
    
  if (nome == "") {
      document.getElementById('errNomeBebida').className = "alert alert-danger";
      document.getElementById('errNomeBebida').innerHTML = "Favor preencher o nome da bebida";
      document.getElementById('errNomeBebida').style.display = 'block';   
  }else if (nome.length < 4) {
      document.getElementById('errNomeBebida').className = "alert alert-danger";
      document.getElementById('errNomeBebida').innerHTML = "Favor preencher o nome com no minimo 4 caracteres";
      document.getElementById('errNomeBebida').style.display = 'block';
  }else {
      document.getElementById('errNomeBebida').style.display = 'none';
  }

  if (desc == "") {
    document.getElementById('errDescBebida').className = "alert alert-danger";
    document.getElementById('errDescBebida').innerHTML = "Favor preencher a descrição da bebida";
    document.getElementById('errDescBebida').style.display = 'block';   
  }else if (nome.length < 4) {
      document.getElementById('errDescBebida').className = "alert alert-danger";
      document.getElementById('errDescBebida').innerHTML = "Favor preencher a descrição com no minimo 4 caracteres";
      document.getElementById('errDescBebida').style.display = 'block';
  }else {
      document.getElementById('errDescBebida').style.display = 'none';
  }

  if (valor == "") {
    document.getElementById('errValorBebida').className = "alert alert-danger";
    document.getElementById('errValorBebida').innerHTML = "Favor preencher o valor";
    document.getElementById('errValorBebida').style.display = 'block';   
    cadastrarBebida.nome.focus();
    return false;
  }else {
    document.getElementById('errValorBebida').style.display = 'none';
  }
}

function valAltBebida() {
  var nome = alterarBebida.nome.value;
  var desc = alterarBebida.desc.value;
  var valor = alterarBebida.valor.value;
    
  if (nome == "") {
      document.getElementById('errNomeBebidaModal').className = "alert alert-danger";
      document.getElementById('errNomeBebidaModal').innerHTML = "Favor preencher o nome da bebida";
      document.getElementById('errNomeBebidaModal').style.display = 'block';   
  }else if (nome.length < 4) {
      document.getElementById('errNomeBebidaModal').className = "alert alert-danger";
      document.getElementById('errNomeBebidaModal').innerHTML = "Favor preencher o nome com no minimo 4 caracteres";
      document.getElementById('errNomeBebidaModal').style.display = 'block';
  }else {
      document.getElementById('errNomeBebidaModal').style.display = 'none';
  }

  if (desc == "") {
    document.getElementById('errDescBebidaModal').className = "alert alert-danger";
    document.getElementById('errDescBebidaModal').innerHTML = "Favor preencher a descrição da bebida";
    document.getElementById('errDescBebidaModal').style.display = 'block';   
  }else if (nome.length < 4) {
      document.getElementById('errDescBebidaModal').className = "alert alert-danger";
      document.getElementById('errDescBebidaModal').innerHTML = "Favor preencher a descrição com no minimo 4 caracteres";
      document.getElementById('errDescBebidaModal').style.display = 'block';
  }else {
      document.getElementById('errDescBebidaModal').style.display = 'none';
  }

  if (valor == "") {
    document.getElementById('errValorBebidaModal').className = "alert alert-danger";
    document.getElementById('errValorBebidaModal').innerHTML = "Favor preencher o valor";
    document.getElementById('errValorBebidaModal').style.display = 'block';   
    alterarBebida.nome.focus();
    return false;
  }else {
    document.getElementById('errValorBebidaModal').style.display = 'none';
  }
}