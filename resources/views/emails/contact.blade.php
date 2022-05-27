@component('mail::message')
<h2>Consulta recibida</h2>
<p>Este ha sido el mensaje que ha enviado {{$email}}</p>
<p>{{ $consulta }}</p>

@endcomponent