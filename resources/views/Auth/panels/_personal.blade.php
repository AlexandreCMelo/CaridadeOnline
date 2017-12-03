<div class="charis-panel">
  <h2>Crie sua conta ou faça login</h2>

  <p>Você pode acessar sua conta através das redes sociais abaixo ou criar uma conta com email e senhas no sistema</p>

  <p>Após criar uma conta, você precisa confirmar ela no email que recebeu.</p>

  <div class="row extra-padding">

    <div class="col-xl-4 extra-padding padding-right-zero">

      <a href="{{ route('facebook.login') }}" class="btn
                        btn-default
                        btn-block
                        btn-charis
                        btn-charis-left
                        btn-charis-facebook">
        <i class="fa fa-facebook" aria-hidden="true"></i>
        Login com Facebook
      </a>

      <a href="{{ route('linkedin.login') }}" class="btn
                         btn-default
                         btn-block
                         btn-charis
                         btn-charis-left
                         btn-charis-linkedin">
        <i class="fa fa-linkedin" aria-hidden="true"></i>
        Login com Linkedin
      </a>

      <a href="{{ route('google.login') }}" class="btn
                         btn-default
                         btn-block
                         btn-charis
                         btn-charis-left
                         btn-charis-google">
        <i class="fa fa-google" aria-hidden="true"></i>
        Login com Google
      </a>

    </div>

    <div class="col-xl-8 text-align-right mobile-separator gutter-left-plus extra-padding">
      <form class="" action="{{ route('login') }}" method="post">


        <div class="form-group">
          <input type="text"
                 class="form-control form-control-charis"
                 id="email"
                 name="email"
                 placeholder="Email"
                 value="{{ old('email') }}"
                 required>

          @if ($errors->has('email'))
            <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
        </div>

        <div class="form-group">
          <input type="password"
                 class="form-control form-control-charis"
                 id="password"
                 name="password"
                 placeholder="Senha"
                 value="{{ old('password') }}"
                 required>

          @if ($errors->has('password'))
            <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif
              
        </div>

        <small><a href="#" class="right">Esqueci minha senha</a></small>

        <div class="form-group">
          <input type="submit" class="btn btn-charis-color" id="" value="Acessar">
        </div>

        {{ csrf_field() }}
        

      </form>
    </div>
  </div>

</div>
