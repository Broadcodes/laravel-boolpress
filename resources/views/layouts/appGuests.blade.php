<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title')</title>

   <link rel="shortcut icon" href="" type="image/x-icon">
   <link rel="stylesheet" href="css/app.css">

   <script type="text/javascript" src="js/app.js" defer></script>
</head>
<body>
    @yield('content')
</body>
</html>
