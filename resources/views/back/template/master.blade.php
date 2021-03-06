<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('public/admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{url('public/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('public/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('public/admin/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('public/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('public/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('public/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('public/admin/dist/css/adminlte.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('public/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('public/admin/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('public/admin/plugins/summernote/summernote-bs4.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/')}}" class="nav-link" target="_blank">Xem website</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user fa-fw"></i>
          Xin ch??o: <b>{{Auth::user()->fullname}}</b>
          <i class="far fa-hand-point-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
<!--           <div class="dropdown-divider"></div> -->
        @if(isset(Auth::user()->level) && Auth::user()->level == 1)
          <a href="{{url('admin/staff/list')}}" class="dropdown-item">
            <i class="fas fa-users fa-fw"></i> Qu???n l?? nh??n vi??n
          </a>
          <div class="dropdown-divider"></div>
        @endif
          <a href="{{url('admin/staff/profile')}}" class="dropdown-item">
            <i class="fas fa-user-edit fa-fw"></i></i> Th??ng tin t??i kho???n
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{url('logout')}}" class="dropdown-item dropdown-footer">Tho??t</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('admin/home')}}" class="brand-link">
      <img src="{{url('public/admin/dist/img/AdminLTELogo.png')}}" alt="Admin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Control</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(isset(Auth::user()->level) && Auth::user()->level == 1)
          <li class="nav-item menu-open">
            <a href="{{url('admin/system')}}" class="nav-link @yield('system')">
              <i class="fas fa-cog fa-fw"></i>
              <p>
                C???u h??nh h??? th???ng
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{url('admin/page/list')}}" class="nav-link @yield('page')">
              <i class="fas fa-sitemap fa-fw"></i>
              <p>
                Qu???n l?? trang
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item menu-open">
            <a href="#" class="nav-link @yield('news')">
              <i class="far fa-newspaper fa-fw"></i>
              <p>
                Qu???n l?? tin t???c
                <i class="fas fa-angle-left right fa-fw"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item">
                <a href="{{url('admin/news_cat/list')}}" class="nav-link">
                  ??? Danh m???c tin t???c
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="{{url('admin/news/list')}}" class="nav-link">
                  ??? Danh s??ch tin t???c
                </a>
              </li>
            </ul>
          </li>
          

          @if(isset(Auth::user()->level) && Auth::user()->level == 1)
          <li class="nav-item menu-open">
            <a href="{{url('admin/slider/list')}}" class="nav-link @yield('slider')">
              <i class="fas fa-sliders-h"></i>
              <p>
                Qu???n l?? slideshow
              </p>
            </a>
          </li>
           <li class="nav-item menu-open">
            <a href="{{url('admin/social/list')}}" class="nav-link @yield('social')">
              <i class="fas fa-share-alt fa-fw"></i>
              <p>
                Qu???n l?? m???ng x?? h???i
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item menu-open">
            <a href="{{url('admin/newsletter/list')}}" class="nav-link  @yield('newsletter')">
              <i class="fas fa-envelope-open-text fa-fw"></i>
              <p>
                Qu???n l?? nh???n tin khuy???n m???i
              </p>
            </a>
          </li>
           <li class="nav-item menu-open">
            <a href="{{url('admin/contact/list')}}" class="nav-link @yield('contact')">
              <i class="fas fa-sms fa-fw"></i>
              <p>
                Qu???n l?? li??n h???
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">@yield('heading')</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="col-md-12">
          @if(Session::has('flash_message'))
          <div class="ad_message alert alert-{!! Session::get('flash_level') !!} ">
            {!! Session::get('flash_message') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        </div>
        <!-- Main content -->
        @yield('content')
        <!-- /.content -->
      </div>
    </section>

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong >Copyright &copy; 2021</strong> <!-- Copyright &copy; 2021 <a href="https://adminlte.io">V?? H???u Duy</a>. -->
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.0.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('public/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('public/admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{url('public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{url('public/admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('public/admin/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{url('public/admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('public/admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('public/admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('public/admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{url('public/admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('public/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{url('public/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('public/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('public/admin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('public/admin/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('public/admin/dist/js/pages/dashboard.js')}}"></script>

<!-- DataTables  & Plugins -->
<script src="{{url('public/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('public/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('public/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('public/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('public/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('public/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{url('public/admin/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{url('public/admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{url('public/admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{url('public/admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{url('public/admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{url('public/admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{url('public/ckeditor4.17/ckeditor.js')}}"></script>
<script>
  CKEDITOR.replace('ckeditor',{
  filebrowserBrowseUrl : '{!!url("public/responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr=")!!}',
  filebrowserUploadUrl : '{!!url("public/responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr=")!!}',
  filebrowserImageBrowseUrl : '{!!url("public/responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr=")!!}'
});
</script>
<!-- AdminLTE App -->
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script type="text/javascript">
  function ChangeToSlug()
{
    var title, slug;

    //L???y text t??? th??? input title
    title = document.getElementById("title").value;

    //?????i ch??? hoa th??nh ch??? th?????ng
    slug = title.toLowerCase();

    //?????i k?? t??? c?? d???u th??nh kh??ng d???u
    slug = slug.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
    slug = slug.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
    slug = slug.replace(/i|??|??|???|??|???/gi, 'i');
    slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
    slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
    slug = slug.replace(/??|???|???|???|???/gi, 'y');
    slug = slug.replace(/??/gi, 'd');
    //X??a c??c k?? t??? ?????t bi???t
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|'|\"|\:|\;|_/gi, '');
    //?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
    slug = slug.replace(/ /gi, "-");
    //?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
    //Ph??ng tr?????ng h???p ng?????i nh???p v??o qu?? nhi???u k?? t??? tr???ng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //X??a c??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox c?? id ???slug???
    document.getElementById('slug').value = slug;
};
</script>
</body>
</html>
