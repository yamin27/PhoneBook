<html>
<head>
    <title>Phone Book</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div id="app">
    <Myheader></Myheader>
    <div class="container">
        <router-view></router-view>
    </div>
    <myfooter></myfooter>
</div>

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>