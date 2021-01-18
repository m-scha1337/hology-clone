<?php
if(auth()->check()){
    $user=auth()->user();
}
?>
@extends('layouts.master')
@section('title', 'Benutzereinstellungen | Hology')
@section('container')

@push('css')
    <link rel="stylesheet" href="{{"./assets/css/settings.css"}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@endpush

@include('partials.loginbtns')
<main class="home">
    <div class="bg">
        <img src="{{secure_asset("assets/img/bg.jpg")}}" alt="">
        <div class="overlay"></div>
    </div>
    <div class="mainLogo">
        <a href="{{route('home')}}"><img src="{{secure_asset("assets/svg/Logo.svg")}}" alt="Mainlogo"></a>
    </div>
    <div class="settingsPage">
        <div class="form-group row">
            <div class="usrimg"><img src="{{secure_asset("assets/img/user1.png")}}" alt="benutzerbild"></div>
        </div>
        <form method="POST" action="{{route('useraudit')}}">
            @csrf
            <div class="form-group row">
                <label for="text" class="col-4 col-form-label">Benutzername ändern</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-address-card"></i>
                            </div>
                        </div>
                        <input id="uname" name="uname" type="text" class="form-control" value="{{$user->uname}}">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-4 col-form-label">E-Mail adresse ändern</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-envelope"></i>
                            </div>
                        </div>
                        <input id="email" name="email" type="email" class="form-control" value="{{$user->email}}">
                    </div>
                    <span id="emailHelpBlock" class="form-text text-muted">Wenn du deine email adresse änderst, musst du sie erneut bestätigen.</span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 text-center" style="margin-top: 5rem; margin-bottom: 2rem">
                    <button type="submit" name="update" class="btn btn-success" value="update">Accountdaten updaten</button>
                    <button type="submit" name="cancel" class="btn btn-danger" style="margin-left: 4rem" value="cancel">Account unwiederruflich löschen</button>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
