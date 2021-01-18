{{--                <div class="event2"></div>
                <div class="event3"></div>
                <div class="event4"></div>
                <div class="event5"></div>
                <div class="event6"></div>
                <div class="event7"></div>
                <div class="event8"></div>
                <div class="event9"></div>--}}
@push('css')
<link rel="stylesheet" href="{{secure_asset("assets/css/userContext.css")}}">
@endpush
@push('js')
<script src="{{secure_asset("assets/js/userContext.js")}}"></script>
@endpush
<div class="contextBox sb9 nodisplay">
    <h1>{{Auth::user()->uname}}</h1>
    @if(isset($events))
        <div class="event-list">
            @foreach($events as $event)
            <?php
            $eventshorthand=preg_replace('/[a-z]+/', '', $event->eventname);
            $eventshorthand=str_replace(' ', '', $eventshorthand);
            $eventshorthand=substr($eventshorthand, 0, 2);
            ?>
            <div class="event">
                <a href="{{route("eventshow", $event->uuid)}}">{{$event->eventname}}</a>
                <hr>
            </div>
        @endforeach
        </div>
    @else
        <div class="events">
            <i style="font-style: normal; color: #b5b5b5; font-weight: normal">Hier werden <i style="font-weight: 900; text-decoration: underline" class="noEvent">deine</i> Events erscheinen :)</i>
            <div class="EventCreateHidden"><a href="{{route("crevent")}}"><img src="{{secure_asset('assets/img/add.png')}}"></a></div>
        </div>
    @endif
    <hr>
    <div class="settings">
        <div class="usersettings">
            <a href="{{route('usersettings')}}"><img src="{{secure_asset('assets/img/settings.png')}}" alt="settings icon"></a><br><a href="{{route('usersettings')}}" class="label">Benutzereinstellungen</a>
        </div>
        <div class="logout"><a href="{{route('logout')}}"><img src="{{secure_asset('assets/img/logout.png')}}" alt="settings icon"></a><br><a href="{{route('logout')}}" class="label">Logout</a></div>
    </div>
    @if(Auth::user()->is_admin)
    <hr>
    <div class="adminSettings">
        <a href="{{route('adminpanel')}}"><img src="{{secure_asset('assets/img/AdminPanel.png')}}" alt="admin panel icon"></a><br><a href="{{route("adminpanel")}}" class="label">Admin Panel</a>
    </div>
    @endif
</div>
