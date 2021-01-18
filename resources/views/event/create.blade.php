@extends('layouts.master')
@section('title', 'Create Event | Hology')
@section('container')
@include('partials.hamburger', ['page'=>'create'])
@push('css')
<link rel="stylesheet" href="{{secure_asset("assets/css/create.css")}}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@endpush
@push('js')
<script src="{{secure_asset("assets/js/ArrowScrollOpacity.js")}}"></script>
@endpush
<main class="register">
    <div class="bg" style="position: relative">
        <img src="{{secure_asset("assets/img/bg.jpg")}}" alt="">
        <div class="overlay"></div>
    </div>
    <div class="create">
        <form method="POST" action="{{route('postcrevent')}}" class="event-form">
            @csrf
            <div class="form-group row">
                <label for="event-name" class="col-4 col-form-label">Event Titel</label>
                <div class="col-8">
                    <input id="event-name" name="eventname" placeholder="Der Titel deines Events." type="text" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label for="invitegreet" class="col-4 col-form-label">Begrüßung</label>
                <div class="col-8">
                    <textarea id="invitegreet" name="invitegreet" cols="40" rows="2" class="form-control" placeholder="Eine Begrüßung die eingeladene Teilnehmer vor dem Zusagen sehen werden."></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="eventdesc" class="col-4 col-form-label">Beschreibung</label>
                <div class="col-8">
                    <textarea id="eventdesc" name="eventdesc" cols="40" rows="10" class="form-control" placeholder="Die Beschreibung deines Events. Beschreibe dein Event so gut wie möglich! Der erste eindruck ist immer der wichtigste!"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="locationHuman" class="col-4 col-form-label">Adresse</label>
                <div class="col-8">
                    <input id="locationHuman" name="locationHuman" placeholder="Die Adresse an der das Event stattfindet." type="text" class="form-control" aria-describedby="locationHumanHelpBlock">
                    <span id="locationHumanHelpBlock" class="form-text text-muted">Gib die Adresse so genau wie möglich an damit deine Gäste dich auch finden!</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-4 col-form-label">Datum und Uhrzeit</label>
                <div class="col-8">
                    <input id="date" name="date" type="datetime-local" class="form-control" required="required" aria-describedby="locationHumanHelpBlock">
                    <span id="locationHumanHelpBlock" class="form-text text-muted">Gib das Datum an, an dem das Event stattfinden wird.</span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 text-center" style="margin-top: 5rem">
                    <button name="submit" type="submit" class="btn btn-primary">Erstellen</button>
                    <button name="submitpublic" type="submit" class="btn btn-outline-primary" style="margin-left: 4rem">Erstellen und Veröffentlichen</button>
                </div>

            </div>
        </form>
    </div>
    <div class="mainLogo">
        <a href="{{route('home')}}"><img src="{{secure_asset("assets/svg/Logo.svg")}}" alt="Mainlogo"></a>
    </div>
    <div class="explainer">
        <p>Hier kannst du ein neues Event erstellen.<br>Trage bitte alle relevanten Infromationen ein. Sobald du den "Erstellen" button klickst, wird das Event erstellt, jedoch nicht veröffentlicht. <br> Wenn du den "Erstellen und Veröffentlichen" button klickst, wird das event erstellt und ist Öffentlich zugänglich.<br>Alle eventdaten können in deinem Benutzeraccount bearbeitet werden.</p>
    </div>
    <div class="arrow bounce"><i class="fa fa-angle-down fa-7x" aria-hidden="true" style="color: white;"></i></div>
</main>
@endsection
