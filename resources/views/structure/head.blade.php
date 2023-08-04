<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--[if lt IE 9]>
	    <script>
	        var e = ("abbr,article,aside,audio,canvas,datalist,details," +
	        "figure,footer,header,hgroup,mark,menu,meter,nav,output," +
	        "progress,section,time,video").split(',');
	        for (var i = 0; i < e.length; i++) {
	            document.createElement(e[i]);
	        }
	    </script>
	<![endif]-->
	<title>Micrositio Asesores</title>
	@php
								$split_name = explode("-", $office['name']);
							@endphp
	<meta property="og:title" content="Asesor Financiero - {{ $user['name'] }}">
    <meta property="og:description" content="Soy parte de la oficina {{ $split_name[0] }} y quiero ayudarte a volver realidad tus sueños más grandes">
    @if($user["url"] == "susana-escalante")
	 <meta property="og:image" content="https://socasesores.com/micrositios-asesores/images/asesora.jpg">
	@else
	   <meta property="og:image" content="https://socasesores.com/img/favicon.png">
	@endif

	<!-- TALWIND CSS -->
	{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}
	<script src="https://cdn.tailwindcss.com"></script>
	
	<!-- CUSTOM CSS -->
	<link rel="stylesheet" href="{{ URL::asset('css/custom.css').'?'.date('Y-m-d H:i:s') }}">
	<!-- FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
	<!-- Fancybox CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
	<link rel="icon" type="image/png" href="https://socasesores.com/img/favicon.png">