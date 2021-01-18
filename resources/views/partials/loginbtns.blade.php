@guest
<aside class="loginbtns guest">
<button type="button" class="btn btn-outline-primary" onclick="location.href='{{route('login')}}'">Login</button>
<button type="button" class="btn btn-primary" onclick="location.href='{{route('register')}}'">Registrieren</button>
</aside>
@endguest
@auth
<aside class="loginbtns withcontext">
<button type="button" class="userAccount" onclick="openUserContext()"></button>
@include('partials.userContext')
</aside>
@endauth

