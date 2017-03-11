<nav class="navbar navbar-default">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/catalog')}}">
                <span class="glyphicon glyphicon-tower" aria-hidden="true"></span>
                VideoclubES
            </a>

        </div>

        @if( true || Auth::check() )
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul {{ Request::is('catalog*') && !Request::is('auth/logout')? ' class=hide' : ''}} class="nav navbar-nav">
                <li>
                    <a href="{{url('/catalog')}}">
                        <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                        Catálogo
                    </a>
                </li>
                <li>
                    <a href="{{url('/catalog/create')}}">
                        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                        Nueva película
                    </a>
                </li>
                <li><a href="{{ url('lang', ['ca']) }}">Cat</a></li>
                <li><a href="{{ url('lang', ['es']) }}">Es</a></li>

            </ul>
        </div>
        @endif

    </div>
</nav>

