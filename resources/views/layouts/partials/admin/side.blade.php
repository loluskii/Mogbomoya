<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{route('admin.dashboard')}}">
                    <span data-feather="home"></span> Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.users.index')}}">
                    <span data-feather="file"></span> Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.transactions.index')}}">
                    <span data-feather="file"></span> Transactions
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.events.index')}}">
                    <span data-feather="users"></span> Events
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="shopping-cart"></span> Interests
                </a>
            </li>
            
        </ul>
    </div>
</nav>
