<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="app-layout" id="appLayout">

        {{-- Left Sidebar --}}
        <aside class="sidebar" id="sidebar">
            <a href="{{ route('dashboard') }}" class="sidebar-brand">
                <span class="brand-icon">◆</span>
                <span>INTERVIEW</span>
            </a>

            <nav class="sidebar-nav">
                <a href="{{ route('dashboard') }}"
                    class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-house-door"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('employees.index') }}"
                    class="sidebar-link {{ request()->routeIs('employees.*', 'employee.*') ? 'active' : '' }}">
                    <i class="bi bi-people"></i>
                    <span>Employees</span>
                </a>

                {{-- Add more links when you create these routes --}}
                {{--
            <a href="{{ route('reports.index') }}" class="sidebar-link">
                <i class="bi bi-bar-chart"></i>
                <span>Reports</span>
                </a>
                --}}
            </nav>

            <div class="sidebar-bottom">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="sidebar-link logout-link">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main Area --}}
        <div class="main-wrapper">

            {{-- Top Header --}}
            <header class="top-header">
                <button type="button" id="sidebarToggle"
                    class="menu-toggle" aria-label="Toggle navigation"
                    aria-controls="sidebar" aria-expanded="true">
                    <i class="bi bi-list"></i>
                </button>

                <div class="header-user">
                    <i class="bi bi-person-circle"></i>
                    <span>Welcome, {{ auth()->user()->name }}</span>
                </div>
            </header>

            {{-- Page Content --}}
            <main class="page-content">
                @yield('content')
            </main>

            {{-- Footer --}}
            <footer class="app-footer">
                &copy; {{ date('Y') }} INTERVIEW. All rights reserved.
            </footer>

        </div>
    </div>

    {{-- Mobile sidebar backdrop --}}
    <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

    <script>
        const layout = document.getElementById('appLayout');
        const toggle = document.getElementById('sidebarToggle');
        const backdrop = document.getElementById('sidebarBackdrop');

        toggle.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
                layout.classList.toggle('sidebar-open');
            } else {
                layout.classList.toggle('sidebar-collapsed');
            }

            toggle.setAttribute(
                'aria-expanded',
                layout.classList.contains('sidebar-open') ||
                !layout.classList.contains('sidebar-collapsed')
            );
        });

        backdrop.addEventListener('click', function() {
            layout.classList.remove('sidebar-open');
        });
    </script>

</body>

</html>