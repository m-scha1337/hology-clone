@component('mail::message')
Vielen Dank für deine Registrierung bei Hology, {{ $user->uname }}!<br>
Um deine E-Mail Adresse bestätigen zu können, müssen wir dich bitten den Button zu klicken.

@component('mail::button', ['url' => $token])
E-Mail Verifizieren
@endcomponent

Dankesehr,<br>
Dein Hology Team!
@endcomponent
