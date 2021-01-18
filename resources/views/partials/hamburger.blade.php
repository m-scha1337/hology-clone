@push('css')
    <link rel="stylesheet" href="{{secure_asset("assets/css/hamburger.css")}}">
@endpush
@push('js')
    <script src="{{secure_asset("assets/js/ham.js")}}"></script>
@endpush
<aside>
    <nav class="hamburger"><!-- Nav ist so verschachtelt da immer nur eine <nav> sichtbar ist, entweder .hampre oder .hampost -->
        <nav class="hampre" tabindex="0">
            <i></i>
            <i></i>
            <i></i>
        </nav>
        <nav class="hampost" style="display: none;">
            <ul>
                <li @if($page=='home'){{'class=curr'}}@endif><a href="{{route("home")}}">Home</a></li>
                @if(auth()->user())
                <li @if($page=='crevent'){{'class=curr'}}@endif><a href="{{route("crevent")}}">Erstelle ein Event</a></li>
                @else
                <li @if($page=='register'){{'class=curr'}}@endif><a href="{{route("register")}}">Erstelle ein Event</a></li>
                @endif
                <li @if($page=='imprint'){{'class=curr'}}@endif><a href="{{route('imprint')}}">Wer wir sind</a></li>
                <li @if($page=='report'){{'class=curr'}}@endif><a href="{{route('report')}}">Ich m&ouml;chte etwas melden</a></li>
            </ul>
        </nav>
    </nav>
</aside>
