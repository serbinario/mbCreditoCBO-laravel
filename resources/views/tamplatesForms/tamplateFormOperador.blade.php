<div class="col m6 s12">
      <div class="row">
          <span class="blue-text text-darken-4"><h5>Cadastro de Agente</h5></span>
          <div class="divider"></div>
              <div class="row">
                  <div class="input-field col s12 m6 l2">
                      <label for="cod_operadores">Chave J: </label>
                      {!! Form::text('cod_operadores', Session::getOldInput('cod_operadores'), array('placeholder' => 'Chave J')) !!}
                  </div>
              </div>
              <div class="row">
                  <div class="input-field col s12 m6 l2">
                      <label for="nome_operadores">Nome: </label>
                      {!! Form::text('nome_operadores', Session::getOldInput('nome_operadores'), array('placeholder' => 'Nome Completo')) !!}
                  </div>
              </div>
              <div class="row">
                  <div class="input-field col s12 m6 l12">
                      <button class="btn">Salvar</button>
                      <button class="btn">Voltar</button>
                  </div>
              </div>
      </div>
</div>