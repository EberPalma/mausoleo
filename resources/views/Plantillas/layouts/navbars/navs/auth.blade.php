<nav class="navbar navbar-expand-lg " color-on-scroll="500">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"> {{ $navName }} </a>
        <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <i class="nc-icon nc-palette"></i>
                        <span class="d-lg-none">{{ __('Tablero') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nc-icon nc-zoom-split"></i>
                        <span class="d-lg-block">&nbsp;{{ __('Buscar') }}</span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav   d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href=" {{route('profile.edit') }} ">
                        <span class="no-icon">{{ __('Account') }}</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="no-icon">{{ __('Dropdown') }}</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">{{ __('Action') }}</a>
                        <a class="dropdown-item" href="#">{{ __('Another action') }}</a>
                        <a class="dropdown-item" href="#">{{ __('Something') }}</a>
                        <a class="dropdown-item" href="#">{{ __('Something else here') }}</a>
                        <div class="divider"></div>
                        <a class="dropdown-item" href="#">{{ __('Separated link') }}</a>
                    </div>
                </li>
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a class="text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Log out') }} </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>