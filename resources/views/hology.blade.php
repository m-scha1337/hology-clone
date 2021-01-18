<?php
if(auth()->check()){
    $user=auth()->user();
}
?>
@extends('layouts.master')
@section('title', 'Willkommen | Hology')
@section('container')

@include('partials.hamburger', ['page'=>'home'])
@include('partials.loginbtns')
<main class="home">
    <div class="bg">
        <img src="{{secure_asset("assets/img/bg.jpg")}}" alt="">
        <div class="overlay"></div>
    </div>
    <div class="mainLogo">

        <img src="{{secure_asset("assets/svg/Logo.svg")}}" alt="Mainlogo">
    </div>
    <div class="invite">
        <form method="POST" action="{{route('invite')}}">
            @csrf
            <input type="text" name="invitecode" id="invitecode"  placeholder="Einladungscode: xxx-xxx-xxx">
            <input type="image" name="submit" src="{{secure_asset("assets/img/checkmark.png")}}" alt="submit">
        </form>
        @if(auth()->user())
        <div class="register"><a href="{{route('crevent')}}">oder erstelle dein eigenes Event?</a></div>
        @else
        <div class="register"><a href="{{route('register')}}">oder erstelle dein eigenes Event?</a></div>
        @endif
    </div>
</main>
@endsection
