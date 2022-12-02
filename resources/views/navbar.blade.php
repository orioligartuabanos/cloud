<!-- Navigation -->
<nav>
@if (Auth::user())         <p>Estas loguejat amb: {{Auth::user()->name }}</p> @endif
<a href="{{ route('login') }}">Login</a>
    &nbsp;&nbsp;&nbsp; 
    <a href="{{ route('register') }}">Register</a>
    <br>
   <a href="{{ route('home') }}">Inici</a>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ route('llibre_list') }}">Llibres</a>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ route('autor_list') }}">Autors</a>
    &nbsp;&nbsp;&nbsp; 
   

</nav>