<!DOCTYPE html>
<html lang="es">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ab58011517.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ url('css/styles.css') }}">
	<title>Document</title>
</head>
<body>
	<header>
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-2">
					<a href="">
						<img src="{{ url('images/white-logo.png') }}" alt="" class="img-fluid">
					</a>
				</div>
				<div class="col-lg-10">
					<ul class="text-center text-md-right">
						@if(!empty($user['email']))
							<li><a href="mailto:{{ $user['email'] }}"><i style="border-radius: 100%; border: 3px solid #fff;padding: 0.5rem;font-size: 1.5rem;" class="fa-solid fa-envelope"></i></a></li>
						@endif

						@if(!empty($user['phone']))
							<li><a href="tel:{{ $user['phone'] }}"><i style="border-radius: 100%; border: 3px solid #fff;padding: 0.5rem;font-size: 1.5rem;" class="fa-solid fa-phone"></i></a></li>
						@endif

						@if(!empty($user['whatsapp']))
							<li><a href="https://wa.me/+52{{ preg_replace('/[\D]+/','',$user['whatsapp']) }}"><i style="font-size: 3rem;" class="fa-brands fa-whatsapp"></i></a></li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</header>
	<main>
		<div class="container">
			<div class="row align-items-start justify-content-between">
				<div class="col-lg-3 d-flex flex-column justify-content-center">
					<figure class="profile-asesor">
						<img src="data:{{ $user['logo'] }}" alt="" class="img-fluid">
					</figure>

					@if($user['level'] == "Senior" && $office["tipo"] == "Hipotecario")
						<div class="text-center">
							<img src="{{ url('images/insignia-asesor-senior-03.png') }}" class="img-fluid mb-4" style="max-width: 150px" alt="">
						</div>
					@elseif($user['level'] == "Advanced" && $office["tipo"] == "Hipotecario")
						<div class="text-center">
							<img src="{{ url('images/insignia-asesor-advanced-02.png') }}" class="img-fluid mb-4" style="max-width: 150px" alt="">
						</div>
					@elseif($user['level'] == "Máster" && $office["tipo"] == "Hipotecario")
						<div class="text-center">
							<img src="{{ url('images/insignia-asesor-master-01.png') }}" class="img-fluid mb-4" style="max-width: 150px" alt="">
						</div>
					@else
					@endif


					@if($user['level'] == "Senior" && $office["tipo"] == "Empresarial")
						<div class="text-center">
							<img src="{{ url('images/insignia-asesor-advanced-empresarial-03.png') }}" class="img-fluid mb-4" style="max-width: 150px" alt="">
						</div>
					@elseif($user['level'] == "Advanced" && $office["tipo"] == "Empresarial")
						<div class="text-center">
							<img src="{{ url('images/insignia-asesor-advanced-empresarial-02.png') }}" class="img-fluid mb-4" style="max-width: 150px" alt="">
						</div>
					@elseif($user['level'] == "Máster" && $office["tipo"] == "Empresarial")
						<div class="text-center">
							<img src="{{ url('images/insignia-asesor-advanced-empresarial-01.png') }}" class="img-fluid mb-4" style="max-width: 150px" alt="">
						</div>
					@else
					@endif

					
					<ul class="menu-asesor">
						<li><a href="" id="experiencia" class="select">Mi experiencia</a></li>
						<li><a href="" id="servicios">Te puedo asesorar en</a></li>
						<li><a href="" id="contacto">Contacto</a></li>
					</ul>
				</div>
				<div class="col-lg-9 pl-md-5 info-asesor">
					<h1>{{ $user['name'] }}</h1>
					<h2>
						@if($user['subtitle'] != null)
							{{ $user['subtitle'] }}
						@else
							Asesor SOC
						@endif
					</h2>
					<div class="descripcion-asesor main-information">
						<p>{{ $user['description'] }}</p>
						<div class="row justify-content-center">
							<div class="col-lg-5 text-center">
								<figure class="inline-block mb-2">{{ getQr($user['id']) }}</figure>
								<a href="tel:{{ $user['phone'] }}">Guarda mi contacto</a>
							</div>
						</div>
					</div>

					
					@if(isset($office["productos"]) && !empty($office["productos"]))
						@php
							$services = explode(",",$office["productos"]);

						@endphp
						<section class="my-16">
							<h2 class="text-center text-primary text-lg font-bold md:mb-9 mb-4">Créditos disponibles</h2>


						@if($office["productos_hipotecario"] == null && $office["productos_seguros"] == null && $office["productos_empresarial"] == null)
						
							@if($office["productos"] != null)

									@php
									$area = "Hipotecario";
										$services = explode(",",$office["productos"]);
									@endphp
									<div class="descripcion-asesor main d-none">
										<h3>Crédito {{ $area }}</h3>
										<ul>
											@foreach($services as $service)
											<li>{{ $service }}</li>
											@endforeach
										</ul>
									</div>
								@else()
								@endif
						@else
							@if($office["productos_hipotecario"] != null)

								@php
								$area = "Hipotecario";
									$services = explode(",",$office["productos_hipotecario"]);
								@endphp
									<div class="descripcion-asesor main d-none">
										<h3>Crédito {{ $area }}</h3>
										<ul>
											@foreach($services as $service)
											<li>{{ $service }}</li>
											@endforeach
										</ul>
									</div>
								@else()
							@endif

							@if($office["productos_seguros"] != null)

								@php
								$area = "Seguros";
									$services = explode(",",$office["productos_seguros"]);
								@endphp
								<div class="descripcion-asesor seguros d-none">
									<h3>Crédito {{ $area }}</h3>
										<ul>
											@foreach($services as $service)
											<li>{{ $service }}</li>
											@endforeach
										</ul>
								</div>
							@else()
							@endif

							@if($office["productos_empresarial"] != null)

								@php
								$area = "Empresarial";
									$services = explode(",",$office["productos_empresarial"]);
								@endphp
								<div class="descripcion-asesor empresarial d-none">
									<h3>Crédito {{ $area }}</h3>
										<ul>
											@foreach($services as $service)
											<li>{{ $service }}</li>
											@endforeach
										</ul>
								</div>
							@else()
							@endif

							@if($office["productos_otros"] != null)

								@php
								$area = "Hipotecario";
									$services = explode(",",$office["productos_hipotecario"]);
								@endphp
									<div class="descripcion-asesor autos d-none">
										<h3>Crédito {{ $area }}</h3>
										<ul>
											@foreach($services as $service)
											<li>{{ $service }}</li>
											@endforeach
										</ul>
									</div>
								@else()
							@endif
						@endif
						

						

						</section>

						

						
					@endif
					<div class="descipcion-asesor contacto-informacion d-none">
						<div class="row">
							<div class="col-md-8 contacto-target">
								<a href="https://socasesores.com/micrositios/{{ $office["url"] }}">
									<div class="text-center">
										<img src="{{ url('images/logo-SOC.jpg') }}" class="d-inline-block" style="vertical-align: middle; max-width: 200px;" alt="">
									    <p class="d-inline-block mb-0 pl-4" style="vertical-align: middle; color: #016D4E; font-weight: bold; font-size: 2.3rem">Kolbe Asesorrs</p>
									</div>
									<img src="{{ url('images/logo_bot.jpg') }}" alt="" class="img-fluid" style="max-width: 280px; margin-left: 100px">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="text-center"><b>Mis redes sociales</b></h2>
					<ul class="mb-0">
						@if(!empty($user['twitter']))
							<li><a href="{{ $user['twitter'] }}"><i class="fa-brands fa-twitter"></i></a></li>
						@endif

						@if(!empty($user['linkedin']))
							<li><a href="{{ $user['linkedin'] }}"><i class="fa-brands fa-linkedin-in"></i></a></li>
						@endif

						@if(!empty($user['facebook']))
							<li><a href="{{ $user['twitter'] }}"><i class="fa-brands fa-facebook-f"></i></a></li>
						@endif

						@if(!empty($user['instagram']))
							<li><a href="{{ $user['instagram'] }}"><<i class="fa-brands fa-instagram"></i></a></li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
    	$( document ).ready(function() {
		    $( "#servicios" ).click(function(e) {
		    	e.preventDefault();
		    	$(".menu-asesor li a").removeClass("select");
		    	$( "#servicios" ).addClass("select");
			  	$(".main").removeClass("d-none");
			  	$(".main-information").addClass("d-none");
			  	$(".contacto-informacion").addClass("d-none");
			});
			$( "#experiencia" ).click(function(e) {
		    	e.preventDefault();
		    	$(".menu-asesor li a").removeClass("select");
		    	$( "#experiencia" ).addClass("select");
			  	$(".main").addClass("d-none");
			  	$(".main-information").removeClass("d-none");
			  	$(".contacto-informacion").addClass("d-none");
			});

			$( "#contacto" ).click(function(e) {
		    	e.preventDefault();
		    	$(".menu-asesor li a").removeClass("select");
		    	$( "#contacto" ).addClass("select");
			  	$(".main").addClass("d-none");
			  	$(".main-information").addClass("d-none");
			  	$(".contacto-informacion").removeClass("d-none");
			});
		});
    </script>
</body>
</html>