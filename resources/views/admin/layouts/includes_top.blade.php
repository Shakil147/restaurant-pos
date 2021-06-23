<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">


<title>@stack('title') - {{ config('app.name', 'Laravel') }}</title>
@isset($novue)

@else
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endisset
<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- vendor css -->
<link href="{{ asset('template') }}/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="{{ asset('template') }}/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="{{ asset('template') }}/lib/rickshaw/rickshaw.min.css" rel="stylesheet">
<link href="{{ asset('template') }}/lib/select2/css/select2.min.css" rel="stylesheet">

<!-- Bracket CSS -->
<link rel="stylesheet" href="{{ asset('template') }}/css/bracket.css">

@notifyCss

@stack('css')