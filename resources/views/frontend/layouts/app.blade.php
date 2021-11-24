<html lang="en">

<head>
    @php
        $SiteSetting = App\Models\SiteSetting::find(1);
    @endphp
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset($SiteSetting->logo) }}">
    <title>{{ $SiteSetting->title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" href="{{ asset('frontend/CSS/about.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/CSS/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/CSS/blogDetails.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/CSS/category.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/CSS/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/CSS/faq.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/CSS/login.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/CSS/payment.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/CSS/privacy.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/CSS/register.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/CSS/service.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/CSS/work.css') }}"> 
    <link rel="stylesheet" href="{{ asset('frontend/CSS/checkout.css') }}"> 
    <link rel="stylesheet" href="{{ asset('frontend/CSS/dashboard.css') }}"> 
    <link rel="stylesheet" href="{{ asset('frontend/CSS/style.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">

</head>

<body>

    <!-- start-header-section -->
    @include('frontend.layouts.header')
    <!-- end-header-section -->

    <!-- body-content -->
    @yield('content')
    <!-- end-body-content -->

    <!-- footer-section -->

    @include('frontend.layouts.footer')



    <!-- js script -->

    
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/3b83a3096d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>