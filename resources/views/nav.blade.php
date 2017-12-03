<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <a class="navbar-brand" href="#"></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">{{ __('views.map') }}</a>
            </li>

            @auth
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('user.list') }}">{{ __('views.user') }}</a>
              </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('organizations.create') }}">{{ __('views.new_organization') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('organization.list') }}">{{ __('views.organizations') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/messages">{{ __('views.messages') }} @include('Message.unread-count')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/messages/create">{{ __('views.new_message') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.upload') }}">{{ __('views.upload_prototype') }}</a>
                </li>
            @endauth
        </ul>

        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">Cadastro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('charislogin')}}">Charis Login</a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropDownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropDownUser">
                        <a class="dropdown-item" href="#">{{ __('views.profile') }}</a>
                        <a class="dropdown-item" href="{{ route('logout')  }}">Logout</a>
                    </div>
                </li>
            @endguest
        </ul>

    </div>
</nav>
