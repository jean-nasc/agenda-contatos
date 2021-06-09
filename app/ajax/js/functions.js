const URL_SITE = "http://localhost/agenda";

function createContato() {

    var nomeInput = $('#nomeInput').val();
    var emailInput = $('#emailInput').val();
    var grupoInput = $('#grupoInput').val();
    var telefoneInput = $('#telefoneInput').val();
    var telDescricaoInput = $('#telDescricaoInput').val();
    var cepInput = $('#cepInput').val();
    var logradouroInput = $('#logradouroInput').val();
    var complementoInput = $('#complementoInput').val();
    var numeroInput = $('#numeroInput').val();
    var bairroInput = $('#bairroInput').val();
    var cidadeInput = $('#cidadeInput').val();
    var estadoInput = $('#estadoInput').val();
    var endDescricaoInput = $('#endDescricaoInput').val();
      
    $.ajax({
      dataType: 'text',
      url: URL_SITE+'/app/ajax/php/createContato.php',
      data: {
        'nomeInput' : nomeInput,
        'emailInput' : emailInput,
        'grupoInput' : grupoInput,
        'telefoneInput' : telefoneInput,
        'telDescricaoInput' : telDescricaoInput,
        'cepInput' : cepInput,
        'logradouroInput' : logradouroInput,
        'complementoInput' : complementoInput,
        'numeroInput' : numeroInput,
        'bairroInput' : bairroInput,
        'cidadeInput' : cidadeInput,
        'estadoInput' : estadoInput,
        'endDescricaoInput' : endDescricaoInput
      },
      method: 'post',
      success: function(data) {
        alert(data);
        enviarEmail(nomeInput);
      }
    });
  
}


function selectContato(codigo){

  $.ajax({
    dataType: 'json',
    url: URL_SITE+'/app/ajax/php/selectContato.php',
    data: {
      'codigo' : codigo
    },
    method: 'post',
    success: function(data) {

      $.each(data, function(index, element){

        $('#codModal').val(element.cod);
        $('#nomeInputContatoModal').val(element.nome);
        $('#emailInputContatoModal').val(element.email);
        $('#grupoInputContatoModal').val(element.grupo);
        
      });
    }
  });

}


function updateContato() {

  var nomeInput = $('#nomeInputContatoModal').val();
  var emailInput = $('#emailInputContatoModal').val();
  var grupoInput = $('#grupoInputContatoModal').val();
  var codigo = $('#codModal').val();
  
    
  $.ajax({
    dataType: 'text',
    url: URL_SITE+'/app/ajax/php/updateContato.php',
    data: {
      'nomeInput' : nomeInput,
      'emailInput' : emailInput,
      'grupoInput' : grupoInput,
      'codigo' : codigo
      
    },
    method: 'post',
    success: function(data) {
      alert(data);
    }
  });

}


function deleteContato(codigo){

  if(confirm("Tem certeza que deseja excluir este contato?")){

  $.ajax({
    dataType: 'text',
    url: URL_SITE+'/app/ajax/php/deleteContato.php',
    data: {
      'codigo' : codigo
    },
    method: 'post',
    success: function(data) {
      alert(data);
    }
  });

}

}


function createEndereco() {

  var cepInput = $('#cepInputEnderecoModal').val();
  var logradouroInput = $('#logradouroInputEnderecoModal').val();
  var complementoInput = $('#complementoInputEnderecoModal').val();
  var numeroInput = $('#numeroInputEnderecoModal').val();
  var bairroInput = $('#bairroInputEnderecoModal').val();
  var cidadeInput = $('#cidadeInputEnderecoModal').val();
  var estadoInput = $('#estadoInputEnderecoModal').val();
  var endDescricaoInput = $('#endDescricaoInputEnderecoModal').val();
  var codigo = $('#codEndModal').val();
    
  $.ajax({
    dataType: 'text',
    url: URL_SITE+'/app/ajax/php/createEndereco.php',
    data: {
      'codigo' : codigo,
      'cepInput' : cepInput,
      'logradouroInput' : logradouroInput,
      'complementoInput' : complementoInput,
      'numeroInput' : numeroInput,
      'bairroInput' : bairroInput,
      'cidadeInput' : cidadeInput,
      'estadoInput' : estadoInput,
      'endDescricaoInput' : endDescricaoInput
    },
    method: 'post',
    success: function(data) {
      alert(data);
    }
  });

}


function createTelefone() {

  var telefoneInput = $('#telefoneInputTelefoneModal').val();
  var telDescricaoInput = $('#telDescricaoInputTelefoneModal').val();
  var codigo = $('#codTelModal').val();
    
  $.ajax({
    dataType: 'text',
    url: URL_SITE+'/app/ajax/php/createTelefone.php',
    data: {
      'codigo' : codigo,
      'telefoneInput' : telefoneInput,
      'telDescricaoInput' : telDescricaoInput
    },
    method: 'post',
    success: function(data) {
      alert(data);
    }
  });

}


function selectEndereco(id){

  $.ajax({
    dataType: 'json',
    url: URL_SITE+'/app/ajax/php/selectEndereco.php',
    data: {
      'id' : id
    },
    method: 'post',
    success: function(data) {

      $.each(data, function(index, element){

        $('#codEndModalEdit').val(element.id);
        $('#cepInputEnderecoModalEdit').val(element.cep);
        $('#logradouroInputEnderecoModalEdit').val(element.logradouro);
        $('#complementoInputEnderecoModalEdit').val(element.complemento);
        $('#numeroInputEnderecoModalEdit').val(element.numero);
        $('#bairroInputEnderecoModalEdit').val(element.bairro);
        $('#cidadeInputEnderecoModalEdit').val(element.cidade);
        $('#estadoInputEnderecoModalEdit').val(element.estado);
        $('#endDescricaoInputEnderecoModalEdit').val(element.end_descricao);
        
      });
    }
  });

}


function selectTelefone(id){

  $.ajax({
    dataType: 'json',
    url: URL_SITE+'/app/ajax/php/selectTelefone.php',
    data: {
      'id' : id
    },
    method: 'post',
    success: function(data) {

      $.each(data, function(index, element){

        $('#codTelModalEdit').val(element.id);
        $('#telefoneInputTelefoneModalEdit').val(element.numero_telefone);
        $('#telDescricaoInputTelefoneModalEdit').val(element.tel_descricao);
        
      });
    }
  });

}


function updateEndereco() {

  var cepInput = $('#cepInputEnderecoModalEdit').val();
  var logradouroInput = $('#logradouroInputEnderecoModalEdit').val();
  var complementoInput = $('#complementoInputEnderecoModalEdit').val();
  var numeroInput = $('#numeroInputEnderecoModalEdit').val();
  var bairroInput = $('#bairroInputEnderecoModalEdit').val();
  var cidadeInput = $('#cidadeInputEnderecoModalEdit').val();
  var estadoInput = $('#estadoInputEnderecoModalEdit').val();
  var endDescricaoInput = $('#endDescricaoInputEnderecoModalEdit').val();
  var id = $('#codEndModalEdit').val();
    
  $.ajax({
    dataType: 'text',
    url: URL_SITE+'/app/ajax/php/updateEndereco.php',
    data: {
      'id' : id,
      'cepInput' : cepInput,
      'logradouroInput' : logradouroInput,
      'complementoInput' : complementoInput,
      'numeroInput' : numeroInput,
      'bairroInput' : bairroInput,
      'cidadeInput' : cidadeInput,
      'estadoInput' : estadoInput,
      'endDescricaoInput' : endDescricaoInput
    },
    method: 'post',
    success: function(data) {
      alert(data);
    }
  });

}


function updateTelefone() {

  var telefoneInput = $('#telefoneInputTelefoneModalEdit').val();
  var telDescricaoInput = $('#telDescricaoInputTelefoneModalEdit').val();
  var id = $('#codTelModalEdit').val();
    
  $.ajax({
    dataType: 'text',
    url: URL_SITE+'/app/ajax/php/updateTelefone.php',
    data: {
      'id' : id,
      'telefoneInput' : telefoneInput,
      'telDescricaoInput' : telDescricaoInput
    },
    method: 'post',
    success: function(data) {
      alert(data);
    }
  });

}


function deleteEndereco(id){

  if(confirm("Tem certeza que deseja excluir este endereço?")){

  $.ajax({
    dataType: 'text',
    url: URL_SITE+'/app/ajax/php/deleteEndereco.php',
    data: {
      'id' : id
    },
    method: 'post',
    success: function(data) {
      alert(data);
    }
  });

}

}


function deleteTelefone(id){

  if(confirm("Tem certeza que deseja excluir este telefone?")){

  $.ajax({
    dataType: 'text',
    url: URL_SITE+'/app/ajax/php/deleteTelefone.php',
    data: {
      'id' : id
    },
    method: 'post',
    success: function(data) {
      alert(data);
    }
  });

}

}


function enviarEmail(nomeContato){
  $.ajax({
    dataType: 'text',
    url: URL_SITE+'/app/ajax/php/enviarEmail.php',
    data: {
      'nomeContato' : nomeContato
    },
    method: 'post',
    success: function(data) {
      alert(data);
    }
  });
}


function passarCod(element, cod){
  $('#'+element).val(cod);
}


function buscarCep(element=''){
  var cep = $('#cepInput'+element).val();

  if(cep != ""){

  $.ajax({
    dataType: 'json',
    url: 'https://viacep.com.br/ws/'+cep+'/json',
    type: 'GET',
    success: function(data) {
      
      $('#logradouroInput'+element).val(data.logradouro);
      $('#bairroInput'+element).val(data.bairro);
      $('#cidadeInput'+element).val(data.localidade);
      $('#estadoInput'+element).val(data.uf);

    }
  });

}
}