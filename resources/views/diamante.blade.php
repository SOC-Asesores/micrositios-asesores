<!DOCTYPE html>
<html lang="es">
<head>
	@include('structure.head')

</head>
<body>
	<header class="fixed w-full inse-x-0 top-0 z-50">
		<div class="container mx-auto max-w-4xl rounded-b-lg bg-[#006d4e] text-white py-4 md:pl-14 md:pr-6 px-2">
			<div class="flex justify-between items-center">
				<figure class="md:w-auto w-2/5 flex items-center">
					<img class="h-11 w-auto max-w-full object-contain mr-1" src="{{ URL::asset('images/white-logo.png') }}" alt="{{ $office['name'] }}" />
					<span class="@php
						$l = strlen($office['name']);
						if($l < 8){ echo 'text-2xl'; }
						elseif($l < 12){ echo 'text-xl'; }
						elseif($l < 18){ echo 'text-lg'; }
						@endphp
						 ml-1">
						{{ $office['name'] }}
					</span>
				</figure>
				<div class="">
					@if(!empty($user['email']))<a href="mailto:{{ $user['email'] }}" class="inline-block rounded-full border border-white p-2 ml-2"><img class="object-contain w-6 h-6" src="{{ URL::asset('assets/sms.png') }}" alt=""></a>@endif

					@if(!empty($user['phone']))<a href="tel://{{ $user['phone'] }}" class="inline-block rounded-full border border-white p-2 ml-2"><img class="object-contain w-6 h-6" src="{{ URL::asset('assets/call-calling.png') }}" alt=""></a>@endif

					@if(!empty($user['whatsapp']))<a href="https://wa.me/+52{{ preg_replace('/[\D]+/','',$user['whatsapp']) }}" class="inline-block rounded-full border border-white p-2 ml-2"><img class="object-contain w-6 h-6" src="{{ URL::asset('assets/whatsapp.png') }}" alt=""></a>@endif

				</div>
			</div>
		</div>
	</header>
	<div class="container mx-auto max-w-4xl md:mt-24 mt-32 shadow-lg pb-16 mb-16 md:px-14 px-4 rounded-b-lg">
		<section class="flex justify-end items-end md:h-44 md:-mx-14 -mx-4 md:pt-16 pt-20 pb-7 md:px-0 px-4 relative rounded-t-lg">
			<span class="bg-cover bg-right rounded-t-lg absolute inset-0 z-0" style="background-image:url({{ '\''.URL::asset('assets/header-st.jpg').'\'' }});"></span>
			<div class="md:w-2/3 w-full text-white relative">
				<h1 class="md:text-2xl text-xl">{{ $user['name'] }}</h1>
				<h2 class="font-light md:text-lg">Asesor SOC</h2>
			</div>
		</section>
		<section class="flex flex-wrap">
			<div class="md:w-1/3 md:inline-block flex md:flex-nowrap flex-wrap items-center">
				<figure class="block md:-mt-28 -mt-5 relative z-20"><img class="md:w-56 md:h-56 w-40 h-40 object-cover rounded-full md:border-8 border-4 border-white bg-white" src="{{ '.$user['logo'].' }}" alt=""></figure>
				<div class="mx-auto block w-40">
					<strong class="text-nobel block leading-none md:text-xl text-lg">
						<img src="{{ URL::asset('assets/advanced.png') }}" alt="Advanced Hipotecario" />
					</strong>
				</div>
				<div class="text-center md:w-56 w-full mt-4">
					{{ getQr($user['id']) }}
					<small class="text-wet-asphalt block">Guarda mi contacto</small>
				</div>
			</div>
			<div class="md:w-2/3 rounded-lg mt-10 p-9 bg-white-smoke text-wet-asphalt md:text-lg main-description">
				<h4 class="font-semibold mb-3">{{ $user['subtitle'] }}</h4>
				{{ $user['description'] }}

				<div class="flex flex-wrap md:-mx-4 -mx-8 justify-center mt-4">
					@php
					$statistics = @unserialize($user['statistics']);
					@endphp
					@if(isset($statistics['Asesorias']) && !empty($statistics['Asesorias']))

					<div class="md:px-4 px-8 md:mb-0 mb-8 md:w-1/3 w-1/2">
						<figure class="overflow-hidden rounded-full bg-white mx-auto w-24 h-24 flex items-center justify-center mb-3"><img class="" src="{{ URL::asset('assets/people.png') }}" alt=""></figure>
						<h4 class="font-semibold text-base text-center">{{ $statistics['Asesorias'] }}</h4>
					</div>
					@endif

					@if(isset($statistics['Creditos']) && !empty($statistics['Creditos']))

					<div class="md:px-4 px-8 md:mb-0 mb-8 md:w-1/3 w-1/2">
						<figure class="overflow-hidden rounded-full bg-white mx-auto w-24 h-24 flex items-center justify-center mb-3"><img class="" src="{{ URL::asset('assets/edit-2.png') }}" alt=""></figure>
						<h4 class="font-semibold text-base text-center">{{ $statistics['Creditos'] }}</h4>
					</div>
					@endif

					@if(isset($statistics['Suenos']) && !empty($statistics['Suenos']))

					<div class="md:px-4 px-8 md:mb-0 mb-8 md:w-1/3 w-1/2">
						<figure class="overflow-hidden rounded-full bg-white mx-auto w-24 h-24 flex items-center justify-center mb-3"><img class="" src="{{ URL::asset('assets/like.png') }}" alt=""></figure>
						<h4 class="font-semibold text-base text-center">{{ $statistics['Suenos'] }}</h4>
					</div>
					@endif

				</div>
			</div>
		</section>

		@if(isset($services) && !empty($services))
		@php
			asort($services)
		@endphp

		<section class="my-16">
			<h2 class="text-center text-primary text-lg font-bold md:mb-9 mb-4">Créditos disponibles</h2>

			@foreach ($services as $area => $service_array)
			
			<h3 class="text-center text-primary text-lg mb-4">{{ $area }}</h3>
			<div class="bg-white-smoke px-20 py-8 rounded-lg mb-10 mx-auto max-w-2xl">
				<div class="grid md:grid-cols-2 gap-4">
					@foreach($service_array as $service)

					<div class="px-4 py-2 rounded-md text-md text-center {{ $area == 'Empresarial' ? 'bg-wet-asphalt text-white' : 'bg-secundary text-white' }}">
						<span>{{ $service['service_name'] }}</span>
					</div>
					@endforeach
			
				</div>
			</div>
			@endforeach

		</section>
		@endif

		<section class="my-16">
			<div class="py-10 px-4 rounded-lg bg-white-smoke flex items-center justify-center flex-col">
				<figure class="flex items-center">
					<img class="h-11 w-auto max-w-full object-contain mr-1" src="{{ URL::asset('images/main-logo.png') }}" alt="{{ $office['name'] }}" />
					<span class="@php
						$l = strlen($office['name']);
						if($l < 8){ echo 'text-2xl'; }
						elseif($l < 12){ echo 'text-xl'; }
						elseif($l < 18){ echo 'text-lg'; }
						@endphp
						 ml-1 text-primary">
						{{ $office['name'] }}
					</span>
				</figure>
				<a href="{{ $office['url'] }}" class="leading-none py-2 mt-2">Visita nuestra oficina</a>
			</div>
		</section>

		<section class="rounded-lg my-16 p-9 bg-white-smoke text-wet-asphalt main-description relative">
			<span class="bg-white opacity-60 absolute inset-0 rouded-lg z-0"></span>
			<h2 class="text-primary text-lg font-semibold mb-6 relative">Pide tu asesoría</h2>
			<form class="relative">
				<div class="grid gap-4 grid-cols-2">
					<div>
						<label class="block font-semibold">Nombre</label>
						<input type="text" class="focus:outline-none px-4 py-2 text-sm bg-white w-full rounded border border-grey-200">
					</div>
					<div>
						<label class="block font-semibold">Eres</label>
						<div class="grid gap-4 grid-cols-2">
							<label>
								<input type="radio" name="radio"> <small>Persona física con actividad empresarial</small>
							</label>
							<label>
								<input type="radio" name="radio"> <small>Persona moral</small>
							</label>
						</div>
					</div>
					<div>
						<label class="block font-semibold">Teléfono</label>
						<input type="text" class="focus:outline-none px-4 py-2 text-sm bg-white w-full rounded border border-grey-200">
					</div>
					<div>
						<label class="block font-semibold">Correo electrónico</label>
						<input type="text" class="focus:outline-none px-4 py-2 text-sm bg-white w-full rounded border border-grey-200">
					</div>
					<div>
						<label class="block font-semibold">Correo electrónico</label>
						<input type="text" class="focus:outline-none px-4 py-2 text-sm bg-white w-full rounded border border-grey-200">
					</div>
					<div>
						<label class="block font-semibold">¿Para qué requieres el capital?</label>
						<input type="text" class="focus:outline-none px-4 py-2 text-sm bg-white w-full rounded border border-grey-200">
					</div>
					<div class="col-span-2">
						<button type="submit" class="rounded-md w-full text-white bg-secundary py-1 px-4">Quiero asesoría</button>
					</div>
				</div>
			</form>
		</section>
	
		@if(!empty($tips))

		<section class="my-16">
			<h2 class="font-bold text-center text-lg text-primary mb-8">SOC Tips</h2>
			<div class="grid md:grid-cols-2 md:gap-14 gap-8 mx-auto max-w-2xl">
				@foreach($tips as $tip)

				<div>
					<figure class="rounded-3xl overflow-hidden w-full relative">
						<img class="w-full" src="http://img.youtube.com/vi/{{ $tip }}/mqdefault.jpg" alt="Carlos Muñoz" />
						<a data-type="iframe" data-fancybox href="https://youtu.be/{{ $tip }}" class="absolute inset-0 flex items-center justify-center">
							<span class="absolute inset-0 opacity-30 bg-black"></span>
							<img class="relative" src="{{ URL::asset('assets/vuesax-twotone') }}-video-circle-1.png" />
						</a>
					</figure>
				</div>
				@endforeach

			</div>
		</section>
		@endif
	
		<section class="my-16">
			<h2 class="font-bold text-center text-lg text-primary mb-8">Te puede interesar</h2>

			<div class="grid md:gap-4 gap-8 md:grid-cols-3 text-wet-asphalt">
				<div>
					<figure class="overflow-hidden rounded-lg md:mb-3 mb-2">
						<img class="w-full rounded-lg object-cover" src="{{ URL::asset('assets/iStock-1282624945.png') }}" alt="">
					</figure>
					<div class="md:px-3 md:pt-3 px-2">
						<p>Las tendencias del crédito hipotecario para el 2022</p>
					</div>
				</div>
				<div>
					<figure class="overflow-hidden rounded-lg md:mb-3 mb-2">
						<img class="w-full rounded-lg object-cover" src="{{ URL::asset('assets/iStock-1282624945.png') }}" alt="">
					</figure>
					<div class="md:px-3 md:pt-3 px-2">
						<p>Las tendencias del crédito hipotecario para el 2022</p>
					</div>
				</div>
				<div>
					<figure class="overflow-hidden rounded-lg md:mb-3 mb-2">
						<img class="w-full rounded-lg object-cover" src="{{ URL::asset('assets/iStock-1282624945.png') }}" alt="">
					</figure>
					<div class="md:px-3 md:pt-3 px-2">
						<p>Las tendencias del crédito hipotecario para el 2022</p>
					</div>
				</div>
			</div>
		</section>

		@if(!empty($fotos))
	
		<section class="my-16">
			<h2 class="font-bold text-center text-lg text-primary mb-8">Clientes satisfechos</h2>

			<div class="gallery-slider md:-mx-4 mx-8">
				@foreach($fotos as $foto)
				
				<figure class="md:w-1/3 sm:1/2 md:px-4 px-1">
					<img class="w-full rounded-lg object-cover" src="{{ $foto['image'] }}" alt="{{ $foto['name'] }}">
				</figure>
				@endforeach

			</div>
		</section>
		@endif

		<section>
			<strong class="text-primary text-center mb-8 block">Déjame acompañarte en las decisiones financieras más importantes de tu vida</strong>
			<div class="advisor-map w-full md:h-72 h-56 overflow-hidden rounded-lg">
				
				@if(isset($office['office_map']))
					{!! $office['office_map'] !!}
				@endif

			</div>

			<div class="text-center mt-8">
				{{ $office['direccion'] }}

			</div>
		</section>
		
		<section class="rounded-lg mt-16 px-9 lg:py-20 md:py-12 py-8 bg-white-smoke md:text-lg main-description">
			<h2 class="font-bold text-primary text-center mb-8">Mis redes sociales</h2>
			<div class="flex justify-center">
				@if(!empty($user['twitter']))
				
				<a href="{{ $user['twitter'] }}" target="_blank" class="rounded-full bg-skyblue mx-4"><img src="{{ URL::asset('assets/twitter.png') }}" /></a>
				@endif

				@if(!empty($user['linkedin']))
				
				<a href="{{ $user['linkedin'] }}" target="_blank" class="rounded-full bg-skyblue mx-4"><img src="{{ URL::asset('assets/linkedin.png') }}" /></a>
				@endif

				@if(!empty($user['facebook']))
				
				<a href="{{ $user['facebook'] }}" target="_blank" class="rounded-full bg-skyblue mx-4"><img src="{{ URL::asset('assets/facebook.png') }}" /></a>
				@endif

				@if(!empty($user['instagram']))
				
				<a href="{{ $user['instagram'] }}" target="_blank" class="rounded-full bg-skyblue mx-4"><img src="{{ URL::asset('assets/instagram.png') }}" /></a>
				@endif

			</div>
		</section>
	</div>

	<!-- Fancybox JS -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
	<!-- Custom JS -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>

	<!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<script type="text/javascript">
        $(document).ready(function() {
            $('.gallery-slider').slick({
                autoplay        :   true,
                autoplaySpeed   :   5000,
                infinite        :   true,
                speed           :   800,
                arrows          :   true,
                dots            :   false,
                slidesToShow    :   3,
                slidesToScroll  :   1,
                responsive: [{
                  breakpoint: 740,
                  settings: {slidesToShow: 2,slidesToScroll: 1,infinite: true, } },
                 {
                  breakpoint: 485,
                  settings: {slidesToShow: 1,slidesToScroll: 1,infinite: true, }
                }]
            });
        });
    </script>
</body>
</html>