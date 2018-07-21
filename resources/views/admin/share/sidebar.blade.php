<div class="sidebar" data-color="purple" data-background-color="white" data-image="admin/img/sidebar-1.jpg">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
        Creative Tim
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('users.show', Auth::user())}}">
                    <i class="material-icons">person</i>
                    <p>User Profile</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('tours.index')}}">
                    <i class="material-icons">photo_size_select_actual</i>
                    <p>Tours Management</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('bookings.index')}}">
                    <i class="material-icons">library_books</i>
                    <p>Bookings Management</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('customers.index')}}">
                    <i class="material-icons">people</i>
                    <p>Customers Management</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('services.index')}}">
                    <i class="material-icons">settings</i>
                    <p>Services Management</p>
                </a>
            </li>
        </ul>
    </div>
</div>