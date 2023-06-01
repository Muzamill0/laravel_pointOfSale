<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('dashboard') }}">
            <span class="align-middle">AdminKit</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            @role('admin')
            <li class="sidebar-item active">
                <a class="sidebar-link" href=" {{ route('users') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Users</span>
                </a>
            </li>
            @endrole
            <li class="sidebar-item active">
                <a class="sidebar-link" href=" {{ route('categories') }}">
                    <i class="align-middle" data-feather="menu"></i> <span class="align-middle">Categories</span>
                </a>
            </li>

           <li class="sidebar-item active">
            <a class="sidebar-link" href=" {{ route('products') }}">
                <i class="align-middle" data-feather="flag"></i> <span class="align-middle">Products</span>
            </a>
        </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('purchases') }} ">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Purchase Reports</span>
                </a>
            </li>
            <li class="sidebar-item active">
                <a class="sidebar-link" href=" {{ route('customers.products') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Sale Reports</span>
                </a>
            </li>
        </ul>

</nav>
