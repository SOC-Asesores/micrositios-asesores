<!DOCTYPE html>
<html lang="es">
<head>
	@include('structure.head')

</head>
<style>
	svg{
		width: 100%;
	}
</style>
<body>
	<header class="fixed w-full inse-x-0 top-0 z-50">
		<div class="container mx-auto max-w-4xl rounded-b-lg bg-[#006d4e] text-white py-4 md:pl-14 md:pr-6 px-2">
			<div class="flex justify-between md:items-center flex-col-reverse md:flex-row">
				<figure class="md:w-auto">
					<div class="flex items-start items-center">
						@php
								$split_name = explode("-", $office['name']);
							@endphp
						@if($office['logo2'] != null)
							<img class="w-auto max-w-full object-contain mr-1" style="max-width: 250px" src="https://socasesores.com/micrositios/img/brokers/{{ $office['logo2'] }}" alt="{{ @$office['name'] }}" />
						@else
							
							<img class="h-11 w-auto max-w-full object-contain mr-1" style="padding-right: 1.5rem;  border-right: 3px solid;" src="{{ URL::asset('images/white-logo.png') }}" alt="{{ @$office['name'] }}" />
							<span style="line-height: 1; padding-left: 1rem; max-width: 200px;" class=" @php
								$l = strlen($split_name[0]);
								if($l < 10){ echo 'text-2xl'; }
								elseif($l < 12){ echo 'text-xl'; }
								elseif($l < 18){ echo 'text-lg'; }
								@endphp
								 ml-1">
								{{ $split_name[0] }}
							</span>
							@php
								$l = strlen($split_name[0]);
								if($l < 10){ echo '<style>
									span.text-2xl{
										font-size: 2.5rem;
										line-height: 0;
									}
								</style>'; }
								else{
									
								}
								@endphp
						@endif
					</div>
					<div class="text-center">
						@if($office['logo2'] == null)
							<img style="max-width: 200px; margin: 0 auto; margin-top: 0.5rem" src="https://i.postimg.cc/HkvR0b0M/soc-blanco-lideres.png" />
						@endif
					</div>
					
				</figure>
				<div class="text-right">
					@if(!empty($user['email']))<a href="mailto:{{ $user['email'] }}" class="inline-block rounded-full border border-white p-2 ml-2"><img class="object-contain w-6 h-6" src="{{ URL::asset('assets/sms.png') }}" alt=""></a>@endif

					@if(!empty($user['phone']))<a href="tel://{{ $user['phone'] }}" class="inline-block rounded-full border border-white p-2 ml-2"><img class="object-contain w-6 h-6" src="{{ URL::asset('assets/call-calling.png') }}" alt=""></a>@endif

					@if(!empty($user['whatsapp']))<a href="https://wa.me/+52{{ preg_replace('/[\D]+/','',$user['whatsapp']) }}" class="inline-block rounded-full border border-white p-2 ml-2"><img class="object-contain w-6 h-6" src="{{ URL::asset('assets/whatsapp.png') }}" alt=""></a>@endif

				</div>
			</div>
		</div>
	</header>
	<div class="container mx-auto max-w-4xl md:mt-25 mt-32 pt-4 md:pt-0 shadow-lg pb-16 mb-16 md:px-14 px-4 rounded-b-lg">
		<section class="flex justify-end items-end md:h-44 md:-mx-14 -mx-4 md:pt-16 pt-20 pb-7 md:px-0 px-4 relative rounded-t-lg">
			<span class="bg-cover bg-right rounded-t-lg absolute inset-0 z-0" style="background-image:url({{ '\''.URL::asset('assets/header-st.jpg').'\'' }});"></span>
			<div class="md:w-2/3 w-full text-white relative">
				<h1 class="md:text-2xl text-xl">{{ $user['name'] }}</h1>
				<h2 class="font-light md:text-lg">
					@if($user['subtitle'] != null)
						{{ $user['subtitle'] }}
					@else 
						Asesor SOC
					@endif
				</h2>
			</div>
		</section>
		<section class="flex flex-wrap">
			<div class="md:w-1/3 justify-center md:inline-block flex md:flex-nowrap flex-wrap items-center">
				@if($user['logo'] != null)
					<figure class="block md:-mt-28 -mt-5 relative z-20"><img class="md:w-56 md:h-56 w-40 h-40 object-cover rounded-full md:border-8 border-4 border-white bg-white" src="data:{{ $user['logo'] }}" alt=""></figure>
				@endif
				
				@if($user['level'] == "Senior")
					<div class="block" style="width: 13rem">
					<strong class="text-nobel block leading-none md:text-xl text-lg">
						<img src="{{ URL::asset('images/certificaciones/hipotecario/senior.png') }}" style="margin-left: 8px;
    width: 224px;" alt="Advanced Hipotecario" />
					</strong>
				</div>
				@elseif($user['level'] == "Advanced")
				<div class=" block" style="width: 13rem">
					<strong class="text-nobel block leading-none md:text-xl text-lg">
						<img src="{{ URL::asset('images/certificaciones/hipotecario/advanced.png') }}" style="margin-left: 8px;
    width: 224px;" alt="Advanced Hipotecario" />
					</strong>
				</div>
				@elseif($user['level'] == "Máster")
				<div class="block" style="width: 13rem">
					<strong class="text-nobel block leading-none md:text-xl text-lg">
						<img src="{{ URL::asset('images/certificaciones/hipotecario/master.png') }}" style="margin-left: 8px;
    width: 224px;" alt="Advanced Hipotecario" />
					</strong>
				</div>
				@else
				@endif
				

				<div class="text-center md:w-56 w-full mt-4">
					<figure class="inline-block mb-4">{{ getQr($user['id']) }}</figure>
					<small class="text-wet-asphalt block">Guarda mi contacto</small>
				</div>
			</div>
			<div class="w-full md:w-2/3 rounded-lg mt-10 p-9 bg-white-smoke text-wet-asphalt md:text-lg main-description">
				
				{{ $user['description'] }}

			</div>
		</section>


		<!--<section class="my-16">
			<h2 class="font-bold text-center text-lg text-primary mb-8">Mi experiencia</h2>
			<div class="flex flex-wrap md:-mx-4 -mx-8 justify-center">
				@php
				$statistics = @unserialize($user['statistics']);
				@endphp
				@if(isset($statistics['Asesorias']) && !empty($statistics['Asesorias']))

				<div class="md:px-4 px-8 md:mb-0 mb-8 md:w-1/3 w-1/2">
					<figure class="overflow-hidden rounded-full bg-white-smoke mx-auto w-24 h-24 flex items-center justify-center mb-3"><img class="" src="{{ URL::asset('assets/people.png') }}" alt=""></figure>
					<h4 class="text-base text-center">{{ $statistics['Asesorias'] }}</h4>
				</div>
				@endif

				@if(isset($statistics['Creditos']) && !empty($statistics['Creditos']))

				<div class="md:px-4 px-8 md:mb-0 mb-8 md:w-1/3 w-1/2">
					<figure class="overflow-hidden rounded-full bg-white-smoke mx-auto w-24 h-24 flex items-center justify-center mb-3"><img class="" src="{{ URL::asset('assets/edit-2.png') }}" alt=""></figure>
					<h4 class="text-base text-center">{{ $statistics['Creditos'] }}</h4>
				</div>
				@endif

				@if(isset($statistics['Suenos']) && !empty($statistics['Suenos']))

				<div class="md:px-4 px-8 md:mb-0 mb-8 md:w-1/3 w-1/2">
					<figure class="overflow-hidden rounded-full bg-white-smoke mx-auto w-24 h-24 flex items-center justify-center mb-3"><img class="" src="{{ URL::asset('assets/like.png') }}" alt=""></figure>
					<h4 class="text-base text-center">{{ $statistics['Suenos'] }}</h4>
				</div>
				@endif

			</div>
		</section>-->

		@if(isset($office["productos"]) && !empty($office["productos"]))
			@php
				$services = explode(",",$office["productos"]);

			@endphp
			<section class="my-16">
				<h2 class="text-center text-primary text-lg font-bold md:mb-9 mb-4">Créditos disponibles</h2>

			@if($user['servicios'] != null)
				@php
						$services = explode(",",$user["servicios"]);
						$productos_hipotecario = array();
						$productos_empresarial = array();
						$productos_seguros = array();
						$productos_otros = array();

						foreach ($services as $value) {
							switch ($value) {
                                    case "Adquisición de terreno":
                                       
                                        array_push($productos_hipotecario, $value);
                                        break;
                                    case "Liquidez":
                                   
                                        array_push($productos_hipotecario, $value);
                                        break;
                                    case "Construcción":
                                        
                                        array_push($productos_hipotecario, $value);
                                        break;
                                    case "Preventa":
                                    
                                        array_push($productos_hipotecario, $value);
                                        break;
                                    case "Renovación / Remodelación":
                                   
                                        array_push($productos_hipotecario, $value);
                                        break;
                                    case "Adquisición de vivienda":
                                        array_push($productos_hipotecario, $value);
                                        
                                        break;
                                    case "Terreno + Construcción":
                                        array_push($productos_hipotecario, $value);
                                       
                                        break;
                                    case "Mejora de hipoteca":
                                        array_push($productos_hipotecario, $value);
                                      
                                        break;

                                    case "Mejora de hipoteca + liquidez":
                                        array_push($productos_hipotecario, $value);
                                      
                                        break;
                                    default:
                                        
                                        break;
                                }

                                switch ($value) {
                                    case "Tarjeta de crédito":
                                        array_push($productos_empresarial, $value);
                                       
                                        break;
                                    case "Crédito como anticipo de ventas":
                                        array_push($productos_empresarial, $value);
                                        
                                        break;
                                    case "Crédito hipotecario empresarial":
                                        array_push($productos_empresarial, $value);
                                        
                                        break;
                                    case "Crédito arrendamiento":
                                        array_push($productos_empresarial, $value);
                                        
                                        break;
                                    case "Crédito revolvente":
                                        array_push($productos_empresarial, $value);
                                        
                                        break;
                                    case "Crédito simple":
                                        array_push($productos_empresarial, $value);
                                       
                                        break;
                                    default:
                                        
                                        break;
                                }

                                switch ($value) {
                                    case "Seguro de vida":
                                        array_push($productos_seguros, $value);
                                        
                                        break;
                                    case "Seguro de auto":
                                        array_push($productos_seguros, $value);
                                        
                                        break;
                                    case "Seguro de vida":
                                        array_push($productos_seguros, $value);
                                        
                                        break;
                                    case "Gastos médicos mayores":
                                        array_push($productos_seguros, $value);
                                        
                                        break;
                                    case "Seguro de hogar":
                                        array_push($productos_seguros, $value);
                                        
                                        break;
                                    case "Auto flotilla":
                                        array_push($productos_seguros, $value);
                                        
                                        break;
                                    case "Gastos médicos mayores":
                                        array_push($productos_seguros, $value);
                                       
                                        break;
                                    case "Daños empresariales":
                                        array_push($productos_seguros, $value);
                                       
                                        break;
                                    default:
                                        
                                        break;
                                }

                                switch ($value) {
                                    case "Adquisición de autos":
                                        array_push($productos_otros, $value);
                                       
                                        break;
                                    case "Sustitución de crédito de auto":
                                        array_push($productos_otros, $value);
                                       
                                        break;
                                    case "Adquisición de moto":
                                        array_push($productos_otros, $value);
                                       
                                        break;
                                    default:
                                        
                                        break;
                                }
						}
				@endphp
				@if($productos_hipotecario != null)

					@php
					$area = "Hipotecario";
						$services = explode(",",$office["productos_hipotecario"]);
					@endphp
					<h3 class="text-center text-primary text-lg mb-4">{{ $area }}</h3>
					<div class="bg-white-smoke px-20 py-8 rounded-lg mb-10 mx-auto max-w-2xl">
						<div class="grid md:grid-cols-2 gap-4">
							@foreach($productos_hipotecario as $service)

							<div class="px-4 py-2 rounded-md text-md text-center bg-ligth-primary text-white" style="border: 1px solid #4ED176; color: #4f4f4f; background: #fafafa;     display: flex;
    align-items: center;
    /* align-content: center; */
    justify-content: center;
">
								<span>{{ $service }}</span>
							</div>
							@endforeach
					
						</div>
					</div>
				@else()
				@endif

				@if($productos_empresarial != null)

					@php
					$area = "Empresarial";
						
					@endphp
					<h3 class="text-center text-primary text-lg mb-4">{{ $area }}</h3>
					<div class="bg-white-smoke px-20 py-8 rounded-lg mb-10 mx-auto max-w-2xl">
						<div class="grid md:grid-cols-2 gap-4">
							@foreach($productos_empresarial as $service)

							<div class="px-4 py-2 rounded-md text-md text-center bg-ligth-primary text-white"  style="display: flex;
    align-items: center;
    /* align-content: center; */
    justify-content: center;border: 1px solid #52DEFF; color: #4f4f4f; background: #fafafa">
								<span>{{ $service }}</span>
							</div>
							@endforeach
					
						</div>
					</div>
				@else()
				@endif

				@if($productos_seguros != null)

					@php
					$area = "Seguros";
						
					@endphp
					<h3 class="text-center text-primary text-lg mb-4">{{ $area }}</h3>
					<div class="bg-white-smoke px-20 py-8 rounded-lg mb-10 mx-auto max-w-2xl">
						<div class="grid md:grid-cols-2 gap-4">
							@foreach($productos_seguros as $service)

							<div class="px-4 py-2 rounded-md text-md text-center bg-ligth-primary text-white"  style="display: flex;
    align-items: center;
    /* align-content: center; */
    justify-content: center;border: 1px solid #FF9FCF; color: #4f4f4f; background: #fafafa">
								<span>{{ $service }}</span>
							</div>
							@endforeach
					
						</div>
					</div>
				@else()
				@endif

				@if($productos_otros != null)

					@php
					$area = "Auto";
						
					@endphp
					<h3 class="text-center text-primary text-lg mb-4">{{ $area }}</h3>
					<div class="bg-white-smoke px-20 py-8 rounded-lg mb-10 mx-auto max-w-2xl">
						<div class="grid md:grid-cols-2 gap-4">
							@foreach($productos_otros as $service)

							<div class="px-4 py-2 rounded-md text-md text-center bg-ligth-primary text-white" style="display: flex;
    align-items: center;
    /* align-content: center; */
    justify-content: center;border: 1px solid #FF7150; color: #4f4f4f; background: #fafafa">
								<span>{{ $service }}</span>
							</div>
							@endforeach
					
						</div>
					</div>
				@else()
				@endif
			@elseif($office["productos_hipotecario"] == null && $office["productos_seguros"] == null && $office["productos_empresarial"] == null)
			
				@if($office["productos"] != null)

					@php
					$area = "Hipotecario";
						$services = explode(",",$office["productos"]);
					@endphp
					<h3 class="text-center text-primary text-lg mb-4">{{ $area }}</h3>
					<div class="bg-white-smoke px-20 py-8 rounded-lg mb-10 mx-auto max-w-2xl">
						<div class="grid md:grid-cols-2 gap-4">
							@foreach($services as $service)

							<div class="px-4 py-2 rounded-md text-md text-center bg-ligth-primary text-white" style="border: 1px solid #4ED176; color: #4f4f4f; background: #fafafa">
								<span>{{ $service }}</span>
							</div>
							@endforeach
					
						</div>
					</div>
				@else()
				@endif
			@else
				@if($office["productos_hipotecario"] != null)

					@php
					$area = "Hipotecario";
						$services = explode(",",$office["productos_hipotecario"]);
					@endphp
					<h3 class="text-center text-primary text-lg mb-4">{{ $area }}</h3>
					<div class="bg-white-smoke px-20 py-8 rounded-lg mb-10 mx-auto max-w-2xl">
						<div class="grid md:grid-cols-2 gap-4">
							@foreach($services as $service)

							<div class="px-4 py-2 rounded-md text-md text-center bg-ligth-primary text-white" style="border: 1px solid #4ED176; color: #4f4f4f; background: #fafafa">
								<span>{{ $service }}</span>
							</div>
							@endforeach
					
						</div>
					</div>
				@else()
				@endif

				

				@if($office["productos_empresarial"] != null)

					@php
					$area = "Empresarial";
						$services = explode(",",$office["productos_empresarial"]);
					@endphp
					<h3 class="text-center text-primary text-lg mb-4">{{ $area }}</h3>
					<div class="bg-white-smoke px-20 py-8 rounded-lg mb-10 mx-auto max-w-2xl">
						<div class="grid md:grid-cols-2 gap-4">
							@foreach($services as $service)
							@if($service != " ")
								<div class="px-4 py-2 rounded-md text-md text-center bg-ligth-primary text-white" style="border: 1px solid #52DEFF; color: #4f4f4f; background: #fafafa">
								<span>{{ $service }}</span>
							</div>
							@endif
							
							@endforeach
					
						</div>
					</div>
				@else()
				@endif

				@if($office["productos_seguros"] != null)

					@php
					$area = "Seguros";
						$services = explode(",",$office["productos_seguros"]);
					@endphp
					<h3 class="text-center text-primary text-lg mb-4">{{ $area }}</h3>
					<div class="bg-white-smoke px-20 py-8 rounded-lg mb-10 mx-auto max-w-2xl">
						<div class="grid md:grid-cols-2 gap-4">
							@foreach($services as $service)

							<div class="px-4 py-2 rounded-md text-md text-center bg-ligth-primary text-white" style="border: 1px solid #FF9FCF; color: #4f4f4f; background: #fafafa">
								<span>{{ $service }}</span>
							</div>
							@endforeach
					
						</div>
					</div>
				@else()
				@endif

				@if($office["productos_otros"] != null)

					@php
					$area = "Auto";
						$services = explode(",",$office["productos_otros"]);
					@endphp
					<h3 class="text-center text-primary text-lg mb-4">{{ $area }}</h3>
					<div class="bg-white-smoke px-20 py-8 rounded-lg mb-10 mx-auto max-w-2xl">
						<div class="grid md:grid-cols-2 gap-4">
							@foreach($services as $service)
							
							<div class="px-4 py-2 rounded-md text-md text-center bg-ligth-primary text-white" style="border: 1px solid #FF7150; color: #4f4f4f; background: #fafafa">
								<span>{{ $service }}</span>
							</div>
							@endforeach
					
						</div>
					</div>
				@else()
				@endif
			@endif
			

			

			</section>

			

			
		@endif
	
		<section class="my-16">
			@if($user['cotizador'] != null)
				<div class="grid md:grid-cols-2 md:gap-14 gap-8 mx-auto max-w-2xl">
			@else
				<div class="grid md:grid-cols-1 md:gap-14 gap-8 mx-auto max-w-2xl">
			@endif
			
			    @if($office['name'] != null)
				<div class="px-4 md:py-4 py-8 rounded-lg bg-white-smoke flex items-center justify-center flex-col">
					<figure class="flex items-center">
						<img class="h-11 w-auto max-w-full object-contain mr-1" style="border-right: 2px solid #016D4E;
    padding-right: 0.8rem;" src="{{ URL::asset('images/main-logo.png') }}" alt="{{ @$office['name'] }}" />


						
						<span class="@php
								$l = strlen($split_name[0]);
								if($l < 5){ echo 'text-2xl'; }
								elseif($l < 12){ echo 'text-xl'; }
								elseif($l < 18){ echo 'text-lg'; }
								@endphp
							 ml-1" style="color: #016D4E;">
							{{ $split_name[0] }}
						</span>
					</figure>
					<a href="https://socasesores.com/micrositios/{{ $office['url'] }}" class="link-oficina leading-none py-2 mt-2">Visita nuestra oficina</a>
				</div>
				@endif
				
					@if($user['cotizador'] != null && $user['id_office'] == "5f11bdc8-ec6b-4377-a9d3-24c1df1e67af")
					<a href="{{ $user['cotizador'] }}" target="_blank">
					<figure class="px-4 md:py-4 py-8 rounded-lg bg-secundary text-white flex items-center justify-center flex-col">
					<img src="{{ URL::asset('assets/house.png') }}" />
						<p class="text-center leading-none py-2 mt-2" style="color: #fff">Precalifícate</p>
					</figure></a>
					@elseif($user['cotizador'] != null)

					<a href="{{ $user['cotizador'] }}" target="_blank">
					<figure class="px-4 md:py-4 py-8 rounded-lg bg-secundary text-white flex items-center justify-center flex-col">
					<img src="{{ URL::asset('assets/house.png') }}" />
						<p class="text-center leading-none py-2 mt-2" style="color: #fff">Simula tu cr&eacute;dito</p>
					</figure></a>

					@else
					
					@endif
					
				</figure>
			</div>
		</section>
	
		<!--<section class="my-16">
			<h2 class="font-bold text-center text-lg text-primary mb-8">Mis certificaciones y habilidades</h2>
			<div class="flex md:-mx-4 mt-8 items-start justify-center">
				<div class="lg:w-1/4 sm:w-1/2 px-4 text-center">
					<figure><img class="inline-block" src="{{ URL::asset('assets/Grupo-1573.png') }}" alt=""></figure>
				</div>
			</div>
		</section>-->
		@if(!empty($blog))

		@endif
		@if(count($fotos) > 0)
		@php
			$contador_fotos = 1;
		@endphp
	
		<section class="my-16">
			<h2 class="font-bold text-center text-lg text-primary mb-8">Clientes satisfechos</h2>

			<div class="grid md:grid-cols-3 mx-auto">
				@foreach($fotos as $foto)
					@if($contador_fotos <= 6)		
						@php
							$imagen = $foto['image'];
							$imagen = explode('image/jpeg;base64,//9j/', $imagen);

							if (count($imagen) >= 1) {
								if (isset($imagen[1])) {
									$imagen = 'data:image/jpeg;base64,/9j/'.$imagen[1];
								}
								
							}else{
								$imagen = $foto['image'];
							}
						@endphp
						<figure class="gap-4 p-3">
							<img class="w-full rounded-lg object-cover" src="{{ $imagen }}">
						</figure>
					@else
					@endif
					@php
						$contador_fotos++;
					@endphp
				@endforeach

			</div>
		</section>
		@endif
		@if($user['twitter'] == null && $user['linkedin'] == null && $user['facebook'] == null && $user['instagram'] == null)
		@else
			<section class="rounded-lg px-9 lg:py-10 md:py-12 py-8 bg-white-smoke md:text-lg main-description">
			<h2 class="font-bold text-primary text-center mb-8">Mis redes sociales</h2>
			<div class="flex justify-center">
				@if(!empty($user['twitter']))
				
				<a href="{{ $user['twitter'] }}" target="_blank" class="w-9 rounded-full bg-ligth-primary mx-4"><img src="{{ URL::asset('assets/tw.png') }}" /></a>
				@endif

				@if(!empty($user['linkedin']))
				
				<a href="{{ $user['linkedin'] }}" target="_blank" class="w-9 rounded-full bg-ligth-primary mx-4"><img src="{{ URL::asset('assets/li.png') }}" /></a>
				@endif

				@if(!empty($user['facebook']))
				
				<a href="{{ $user['facebook'] }}" target="_blank" class="w-9 rounded-full bg-ligth-primary mx-4"><img src="{{ URL::asset('assets/fb.png') }}" /></a>
				@endif

				@if(!empty($user['instagram']))
				
				<a href="{{ $user['instagram'] }}" target="_blank" class="w-9 rounded-full bg-ligth-primary mx-4"><img src="{{ URL::asset('assets/in.png') }}" /></a>
				@endif

				@if($office['id_sisec'] == "15c6e0d3-279c-46f2-a1fb-bd7e510bd26f")
				
				<a href="https://youtu.be/_yUdR0r7CHg" target="_blank" class="w-9 rounded-full bg-ligth-primary mx-4"><img src="{{ URL::asset('assets/youtube.png') }}" /></a>
				@endif

			</div>
		</section>
		@endif
		
	</div>

	<!-- Fancybox JS -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
	<!-- Custom JS -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>
</body>
</html>