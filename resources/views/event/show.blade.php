<?php
use \App\Models\Users;

$user=Users::firstWhere('id', $event->user_fs);
?>

@extends('layouts.master')
@section('title', '{{$event->eventname}} | Hology')
@section('container')
    @push('css')
        <link rel="stylesheet" href="{{secure_asset("assets/css/show.css")}}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    @endpush
    @push('js')
        <script src="{{secure_asset("assets/js/ArrowScrollOpacity.js")}}"></script>
    @endpush
    <main class="show">
        <div class="bg" style="position: relative">
            <img src="{{secure_asset("assets/img/bg.jpg")}}" alt="">
            <div class="overlay"></div>
        </div>
        <div class="mainLogo">
            <a href="{{route('home')}}"><img src="{{secure_asset("assets/svg/Logo.svg")}}" alt="Mainlogo"></a>
        </div>
        <div class="arrow bounce"><i class="fa fa-angle-down fa-7x" aria-hidden="true" style="color: white;"></i></div>
        @if(\Illuminate\Support\Facades\Auth::user()->id===$event->user_fs)
        <div class="ownerFunctions">
            <p>Du bist der Besitzer dieses events! Das heißt, das du hier noch einige Extra funktionen finden wirst.</p>
            <br>
            <p style="text-align: left">Der Einladungscode zu diesem event ist: {{$event->invitecode}}</p>
            <br>
            <p style="text-align: left">Der Einladungslink zu diesem event ist: <a href="{{route('share', $event->uuid)}}">{{route('share', $event->uuid)}}</a></p>
        </div>
        @endif
        <div class="eventContent">
            <?php
            $eventshorthand=preg_replace('/[a-z]+/', '', $event->eventname);
            $eventshorthand=str_replace(' ', '', $eventshorthand);
            $eventshorthand=substr($eventshorthand, 0, 2);
            ?>
            <div class="eventlogo" style="background-color: {{$event->bgcolour}}">{{$eventshorthand}}</div>
            <div class="title">{{$event->eventname}}</div>
            <hr>
            <div class="host">von {{$user->uname}}</div>
            <div class="eventDescription">{{$event->eventdesc}}</div>
            <div class="privacyDisclaimer">Folgende Informationen sind nur für dich zugänglich.
            <br>Bitte veröffentliche sie nicht!</div>
            <hr>
            <div class="address">Adresse: {{$event->locationhuman}}</div>
            <div class="date">Datum und Uhrzeit: {{$event->date}}</div>
        </div>
    </main>
@endsection
