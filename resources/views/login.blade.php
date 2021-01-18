@extends('layouts.master')
@section('title', 'Log in | Hology')
@section('css', 'assets/css/style.css')
@section('container')
    <main class="register">
        <div class="bg">
            <img src="{{secure_asset("assets/img/bg.jpg")}}" alt="">
            <div class="overlay"></div>
        </div>
        <div class="mainLogo">
            <a href="{{route('home')}}"><img src="{{secure_asset("assets/svg/Logo.svg")}}" alt="Mainlogo"></a>
        </div>
        <div class="explainer">
            <p>Hallo!<br>Um auf ein Event zuzugreifen das du Erstellt hast, logge dich bitte mit deinen Logindaten ein.</p>
        </div>
        <div class="register">
            <form method="POST" action="{{route('postlogin')}}" class="grid-login">
                @csrf
                <input type="text" placeholder="E-Mail Adresse" class="AreaTop" name="email" maxlength="50">
                <input type="password" placeholder="Passwort" class="AreaMiddle" name="password">
                <button type="submit" class="AreaBottom">Einloggen</button>
            </form>
        </div>
    </main>
@endsection
