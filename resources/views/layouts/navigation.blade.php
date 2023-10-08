<nav id="navbar" x-data="{ open: false }" >
    <div class="nav-wrapper">
        <!-- Navbar Logo -->
        <div class="logo">
            <a href="{{route('home')}}">WIL</a>
        </div>
        <!-- Navbar Links -->
        <div class="dropdown">
            <div class="dropbtn">
            <a>MENU</a> 
            <i class="fa fa-caret-down"></i>
            </div>
            <div class="dropdown-content">
            @if(Auth::user()->user_type == 'Student')
            <x-dropdown-link :href="route('student.show', ['id' => Auth::user()->id])">
                {{ __('Profile') }}
            </x-dropdown-link>
            @elseif(Auth::user()->user_type == 'Industry Partner')
            <x-dropdown-link :href="route('partner.show', ['id' => Auth::user()->id])">
                {{ __('Profile') }}
            </x-dropdown-link>
            @elseif(Auth::user()->user_type == 'Teacher')
            <x-dropdown-link :href="route('student.index')">
                {{ __('Students') }}
            </x-dropdown-link>
            @endif
            <x-dropdown-link :href="route('project.index')">
                {{ __('Projects') }}
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
