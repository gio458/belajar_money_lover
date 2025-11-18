<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Saldo-In Dashboard')</title>
    
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> 
</head>
<body>
    <div id="app-wrapper">
        
        <aside class="sidebar">
            <div class="logo-section">
                <span class="logo-icon">S</span>
                <div class="logo-text">
                    <strong>Saldo-In</strong>
                    <small>Manage your money here</small>
                </div>
            </div>
            
            <nav class="main-menu">
                <div class="menu-heading">Menu</div>
                <a href="{{ route('dashboard') }}" class="nav-item active">
                    <i class="icon-dashboard"></i> Dashboard
                </a>
                <a href="/documents" class="nav-item">
                    <i class="icon-document"></i> My Document
                </a>
                <a href="/history" class="nav-item">
                    <i class="icon-history"></i> History
                </a>
                <a href="/spay" class="nav-item">
                    <i class="icon-pay"></i> S-Pay
                </a>
            </nav>

            <nav class="settings-menu">
                <div class="menu-heading">General</div>
                <a href="/settings" class="nav-item">
                    <i class="icon-setting"></i> Setting
                </a>
                {{-- Form Logout --}}
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-item btn-logout">
                        <i class="icon-logout"></i> Log out
                    </button>
                </form>
            </nav>
        </aside>

        <main class="main-content">
            <header class="topbar">
                <div class="user-profile">
                    <i class="icon-mail"></i>
                    <div class="avatar"></div>
                    <div class="user-details">
                        <span class="user-name">Nama User</span>
                        <small class="user-email">emailuser@gmail.com</small>
                    </div>
                </div>
            </header>
            
            <div class="content-body">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>