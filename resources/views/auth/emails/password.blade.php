Hola {{$user->name}},
<br>
<br>
Haz click <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">AQUI</a> para resetear su contraseña.
<br>
<br>
Un placer ayudarte,<br>
Atentamente Registros Medicos Personales-
