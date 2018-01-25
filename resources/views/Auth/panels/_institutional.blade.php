<div class="charis-panel">

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  <h2>É uma empresa?</h2>

  <p>Caso tenha uma empresa e queira fazer parte do Caridade Online, é necessário ter em mãos CNPJ e ser responsável por ela. Preencha abaixo o formulário para iniciar.</p>

  <form class="extra-padding text-align-right" action="{{ route('organization.store') }}" method="post">

    <div class="form-group">
      <input type="text" class="form-control form-control-charis" name="organization_email" id="organization_email" placeholder="Email principal" value={{ old('organization_email') }}>
    </div>

    <div class="form-group">
      <input type="text" class="form-control form-control-charis" name="name" id="name" placeholder="Nome Fantasia"  value={{ old('name') }}>
    </div>

    <div class="form-group">
      <input type="text" class="form-control form-control-charis" name="cnpj" id="cnpj" placeholder="CNPJ"  value={{ old('cnpj') }}>
    </div>

    <div class="form-group">
      <input type="password" class="form-control form-control-charis" name="password" id="password" placeholder="Senha">
    </div>

    <div class="form-group">
      <input type="password" class="form-control form-control-charis" name="password_confirmation" id="password-confirmation" placeholder="Confirme a senha">
    </div>

    <small><a href="#" class="align-right">Esqueci minha senha</a></small>

    {{ csrf_field() }}

    <div class="form-group">
      <input type="submit" class="btn btn-charis-color" id="" value="Cadastrar">
    </div>

  </form>

</div>
