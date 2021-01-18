<?php
$eventshorthand=preg_replace('/[a-z]+/', '', $event->eventname);
$eventshorthand=str_replace(' ', '', $eventshorthand);
$eventshorthand=substr($eventshorthand, 0, 2);
?>
@extends('layouts.master')
@section('title', 'Du wurdest eingeladen | Hology')
@section('container')

{{--@include('partials.loginbtns')--}}
@push('css')
<link rel="stylesheet" href="{{"assets/css/invite.css"}}">
@endpush
<main class="home">
    <div class="bg">
        <img src="{{secure_asset("assets/img/bg.jpg")}}" alt="">
        <div class="overlay"></div>
    </div>
    <div class="mainLogo">
        <a href="{{route('home')}}"><img src="{{secure_asset("assets/svg/Logo.svg")}}" alt="Mainlogo"></a>
    </div>
    <div class="requestInvite">
        <div class="eventlogo" style="background-color: {{$event->bgcolour}}">{{$eventshorthand}}</div>
        <hr>
        @if(isset($event->invitegreet)&&!is_null($event->invitegreet))
        <div class="greeting">{{$event->invitegreet}}</div>
        @else
        <div class="greeting">Hey!<br>Du wurdest zum Event <i style="font-style: normal; font-weight: 900; text-decoration: underline;">"{{$event->eventname}}"</i> eingeladen.<br> Es scheint aber so als hätte der Event-Organisator keine persönliche Grußbotschaft hinterlassen :( <br> Deswegen wollen wir die Gelegenheit nutzen und uns dafür bei dir bedanken, dass du unsere Platform verwendest.<br><br>Möchtest du <i style="font-style: normal; font-weight: 900; text-decoration: underline;">"{{$event->eventname}}"</i> zusagen oder absagen?"</div>
        @endif
        <div class="form-group row">
            <div class="col-12 text-center" style="margin-top: 5rem; margin-bottom: 2rem">
                <a href="{{route('inviteDecision', ["true", $event->uuid])}}" name="submittrue" type="submit" class="btn btn-success">Ja, ich möchte zusagen</a>
                <a href="{{route('inviteDecision', ["false", $event->uuid])}}" name="submitfalse" type="submit" class="btn btn-danger" style="margin-left: 4rem">Nein, ich möchte absagen</a>
            </div>
        </div>
    </div>
</main>
@endsection
