<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Saldo-In</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/document.css') }}">
    <link rel="stylesheet" href="{{ asset('css/history.css') }}">
    <link rel="stylesheet" href="{{ asset('css/spay.css') }}">
    <link rel="stylesheet" href="{{ asset('css/setting.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

<div class="layout-container">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="menu-title">Menu</div>

        <ul>
            <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-border-all"></i> Dashboard
                </a>
            </li>

            <li class="{{ request()->is('my-document') ? 'active' : '' }}">
                <a href="{{ route('document.index') }}">
                    <i class="fa fa-folder"></i> My Document
                </a>
            </li>

            <li class="{{ request()->is('history') ? 'active' : '' }}">
                <a href="{{ route('history.index') }}">
                    <i class="fa fa-clock-rotate-left"></i> History
                </a>
            </li>

            <li class="{{ request()->is('s-pay') ? 'active' : '' }}">
                <a href="{{ route('spay.index') }}">
                    <i class="fa fa-dollar-sign"></i> S-Pay
                </a>
            </li>
        </ul>

        <div class="bottom-menu">
            <ul>
                <li class="{{ request()->is('setting') ? 'active' : '' }}">
                    <a href="{{ route('setting.setting') }}">
                        <i class="fa fa-gear"></i> Setting
                    </a>
                </li>

                <li class="menu-item" onclick="openLogoutModal()">
                    <i class="icon-logout"><i class="fa-solid fa-arrow-right-from-bracket"></i></i> Log out
                </li>
            </ul>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <!-- Header top -->
        <div class="top-header">
            <a href="{{ route('setting.setting') }}" class="user-setting-link">
                <i class="fa fa-user-circle"></i>
            </a>
        </div>

        <!-- Logo aplikasi -->
       <div class="logo-app-area">
        <div class="logo-circle">S</div>
        <div>
            <h2 class="page-title">
                @yield('page_title_main')
                <span class="title-blue">@yield('page_title_blue')</span>
            </h2>
            <p class="page-desc">@yield('page_description')</p>
        </div>
    </div>
    <div id="logoutModal" class="modal-overlay">
    <div class="modal-box-portrait">
        
        <div class="modal-icon">
            <i class="logout-icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></i>
        </div>

        <h2>Log Out?</h2>

        <p>Are you sure you want to log out from this web?</p>
        <p>You'll need to log in again to access your dashboard</p>

        <div class="modal-buttons">
            <button class="btn-cancel" onclick="closeLogoutModal()">Cancel</button>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn-logout">Log Out</button>
            </form>
        </div>

    </div>
</div>



        <!-- MAIN PAGE CONTENT -->
        @yield('content')

    </div>

</div>

</body>
<script>
function openLogoutModal() {
    document.getElementById('logoutModal').style.display = 'flex';
}

function closeLogoutModal() {
    document.getElementById('logoutModal').style.display = 'none';
}
</script>

</html>
