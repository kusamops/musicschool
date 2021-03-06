<div class="navigation">
  <div class="container">
    <nav class="nav ">
      <a class="nav-link active" href="{{ route('home') }}">Home</a>

      @auth
        <a class="nav-link" href="{{ route('mygroups') }}">My Groups</a>
        <a class="nav-link" href="{{ route('mytasks') }}">Tasks</a>
        <a class="nav-link" href="{{ route('mysolutions') }}">Solutions</a>
      @endauth

      @auth
        <a class="nav-link ml-auto" href="#">Hello, {{ Auth::user()->name }}!</a>
        <a class="nav-link ml-auto" href="{{ route('logout') }}">Logout</a>
      @else
        <a class="nav-link ml-auto" href="{{ route('signup') }}">Sign up</a>
        <a class="nav-link ml-auto" href="{{ route('login') }}">Login</a>
      @endauth
    </nav>
  </div>
</div>