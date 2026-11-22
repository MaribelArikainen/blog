<div class="navbar bg-base-100 shadow-sm">
  <div class="navbar-start">
    <div class="dropdown">
      <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /> </svg>
      </div>
      <ul
        tabindex="0"
        class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
        <li><a href="{{ route('page1') }}">Page 1</a></li>
        <li><a href="{{ route('page2') }}">Page 2</a></li>
        @auth
          <li>
            <a>Admin</a>
            <ul class="p-2">
              <li><a href="{{ route('posts.index') }}">Posts</a></li>
              <li><a>Submenu 2</a></li>
            </ul>
          </li>
        @endauth
        <li><a>Item 3</a></li>
      </ul>
    </div>
    <a class="btn btn-ghost text-xl" href="{{ route('home') }}">daisyUI</a>
  </div>
  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
      <li><a href="{{ route('page1') }}">Page 1</a></li>
      <li><a href="{{ route('page2') }}">Page 2</a></li>
      @auth
        <li>
          <details>
            <summary>Admin</summary>
            <ul class="p-2 bg-base-100 w-40 z-1">
              <li><a href="{{ route('posts.index') }}">Posts</a></li>
              <li><a>Submenu 2</a></li>
            </ul>
          </details>
        </li>
      @endauth
      <li><a>Item 3</a></li>
    </ul>
  </div>
  <div class="navbar-end gap-2">
    @auth
      <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="btn m-1">{{ auth()->user()->name }}</div>
        <ul tabindex="-1" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
          <li><a href="{{ route('dashboard') }}">@lang('Dashboard')</a></li>
          <li><a href="{{ route('user', auth()->user()) }}">@lang('My posts')</a></li>
          <li><a href="{{ route('profile.edit') }}">@lang('Profile')</a></li>
          <li>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button class="w-full text-left">@lang('Log Out')</button>
            </form>
          </li>
        </ul>
      </div>
    @else
      <a href="{{ route('register') }}" class="btn btn-primary">@lang('Register')</a>
      <a href="{{ route('login') }}" class="btn btn-secondary">@lang('Login')</a>
    @endauth
  </div>
</div>
