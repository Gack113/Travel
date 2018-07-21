<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="{{route('dashboard')}}">Dashboard</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
                <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Search...">
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">notifications</i>
                        @if(count($notices) > 0)
                            <span class="notification">{{count($notices)}}</span>
                        @endif
                        <p class="d-lg-none d-md-block">
                            New Notifications
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        @if(count($notices) > 0)
                            @foreach($notices as $item)
                                <a class="dropdown-item" href="{{route('notifications.show', $item)}}">{{$item->title}}</a>
                            @endforeach
                        @else
                            <a class="dropdown-item">Không có thông báo</a>
                        @endif
                    </div>
                </li>
                <li class="nav-item">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button class="ripple" type="submit" style="outline:none;background: transparent; border:none; cursor:pointer">
                            <i class="material-icons">arrow_forward_ios</i>
                            <p class="d-lg-none d-md-block">
                                Logout
                            </p>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>