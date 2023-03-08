<!DOCTYPE html>
<html lang="en">
@include('include.head')
@include('include.head_file')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
@include('include.preloader')
@include('include.header_nav')
@include('include.sidebar')

@yield('content')

@include('include.footer')
@include('include.footer_file')
</body>
</html>