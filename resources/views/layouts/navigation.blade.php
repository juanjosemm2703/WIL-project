<nav id="navbar" x-data="{ open: false }" >
    <div class="nav-wrapper">
        <!-- Navbar Logo -->
        <div class="logo">
            <a href="#home">WIL</a>
        </div>
        <!-- Navbar Links -->
        <div class="dropdown">
            <div class="dropbtn"><a>MENU</a> 
            <i class="fa fa-caret-down"></i>
            </div>
            <div class="dropdown-content">
            <x-dropdown-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-dropdown-link>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
            </div>
        </div> 
        <!-- User Info -->
        <div class="user">
            <span>{{ Auth::user()->name }} - {{ Auth::user()->user_type }}</span> 
        </div>
    </div>
</nav>
