<!DOCTYPE html>
<html dir="ltr" lang="vi">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noodp,index,follow" />
    <meta name='revisit-after' content='1 days' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')" />
    <meta name="keywords" content="@yield('keywords')" />
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/images/favicon/'.$favicon->Description)}}" />
    <link rel="canonical" href="https://www.hansattannoi.com" />    
    <meta property="og:locale" itemprop="inLanguage" content="vi_VN"  />   
    <meta property="og:url" content="@yield('url')" /> 
    <meta property="og:type" content="article" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:image" content="@yield('images')" />    
    <meta property="og:site_name" content="HD news" />    
    <meta name="copyright" content="HD news"/> 
    <meta name="author" content="HD news">
    <meta name="geo.placename" content="Ho Chi Minh, Viet Nam"/>
    <meta name="geo.region" content="VN-HCM"/>

    <link href="{{url('public/fontawesome-free-5.15.3/css/all.css')}}" rel="stylesheet" />
    <link href="{{url('public/bootstrap-3.4.1/dist/css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{url('public/css/style.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://www.hansattannoi.com/public/css/lightbox.min.css">
    <script type="text/javascript">var url ="{!!url('/')!!}";</script> 


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

  </head>
  <body id="trangchu">
    <input type="hidden" id="_token" value="{{csrf_token()}}">
    <div id="wrapper">
      @include('front.template.header')
      <div class="content">
        @yield('content')
      </div>
      @include('front.template.footer')
    </div>     
</body>
  <script src="{{url('public/js/jquery-1.12.4.min.js')}}" crossorigin="anonymous"></script>
  <script src="{{url('public/js/jquery.js')}}"></script>
  <script src="{{url('public/bootstrap-3.4.1/dist/js/bootstrap.min.js')}}" crossorigin="anonymous"></script> 

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <!--  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>   -->
</html>
  <script  src="{{url('public/js/front.js')}}"></script>