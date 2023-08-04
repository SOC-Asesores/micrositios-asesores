<!DOCTYPE html>
<html lang="es">
<head>
	@include('structure.head')

</head>
<body style="background-image:url({{ '\''.URL::asset('assets/fondo.png').'\'' }})">
	<div class="container mx-auto mt-10 max-w-xl text-justify p-6 rounded-lg border border-grey-200 shadow-md">
		<h1 class="text-center">¡Ha habido un error!</h1>
		<p>El asesor que intentas localizar al parecer no existe.</p>

		@if(count($users) > 0)
		<h4 class="font-semibold mt-10">También puedes estar buscando:</h4>
		<ul>
			@foreach($users as $user)

			<li><a href="{{ URL::to(sprintf("%04s",$user['id_office']).'/'.$user['url']) }}">{{ $user['name'] }}</a></li>
			@endforeach

		</ul>
		@endif

	</div>
</body>
</html>