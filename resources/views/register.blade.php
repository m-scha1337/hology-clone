@extends('layouts.master')
@section('title', 'Register | Hology')
@section('container')

@include('partials.hamburger', ['page'=>'register'])
@push('js')
    <script src="{{secure_asset("assets/js/passwordCheck.js")}}"></script>
@endpush
<main class="register">
    <div class="bg">
        <img src="{{secure_asset("assets/img/bg.jpg")}}" alt="">
        <div class="overlay"></div>
    </div>
    <div class="mainLogo">
        <a href="{{route('home')}}"><img src="{{secure_asset("assets/svg/Logo.svg")}}" alt="Mainlogo"></a>
    </div>
    <div class="explainer">
        <p>Hallo!<br>Danke das du ein Event organisieren willst!<br> Als Organisator musst du dich mit deiner E-Mail adresse Registrieren. <br>Bitte Bestätige deine E-Mail mit dem Link den du zugesendet bekommst :)</p>
    </div>
    <div class="register">
        <form method="POST" action="{{route('register')}}" class="grid-container">
            @csrf
            <input type="text" placeholder="Username" class="user-name" name="uname" maxlength="50">
            <input type="e-mail" placeholder="E-Mail" class="email" name="email">
            <input type="password" placeholder="Passwort" class="pword" name="password">
            <input type="password" placeholder="Passwort Wiederholen" class="pword-repeat" name="password_confirmation">
            <button type="submit" class="submit">Erstellen!</button>
            <div class="formerrors"></div>
        </form>
    </div>
</main>
@endsection
