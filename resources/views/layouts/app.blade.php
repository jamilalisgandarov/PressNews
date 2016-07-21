<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" /> 

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link href="/assets/css/bootstrap.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="/assets/css/font-awesome.css">
  <!-- Ionicons -->
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
  <script src="/assets/js/jquery-1.12.4.js"></script>
  <script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
  <!-- iCheck -->
</head>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">Ipress</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Panel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         @if(\Auth::user()->status==0)
           <li class=" notifications-menu">
              <a href="/admin/requests" >
                   
                <i class="fa fa-user-plus" aria-hidden="true"></i> 
                @if(count(App\Author::all())!=0)
                <span class="label label-warning authorCount"></span>
                    @endif
              </a>
            </li>
          @endif
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs">   
                @if(!Auth::guest())
                     {{\Auth::user()->first_name}} {{\Auth::user()->last_name}}
                @else
                @endif
                &nbsp;<i class="fa fa-chevron-down" aria-hidden="true"></i>
              </span>
            </a>
            <ul class="dropdown-menu" style="width:0 !important">
              <!-- Menu Body -->
              <li >
                  <a href="/logout"  class=" dropdown-item btn-default ">Sign out</a> 
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
   
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
              <a href="/">
                <i class="fa fa-newspaper-o" aria-hidden="true"></i></i>
                <span>News</span>
                <span class="label label-default pull-right">
                  @if(count(App\News::all())>0)
                  {{count(App\News::all())}}
                  @endif
                </span>
              </a>
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="/admin">
                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                <span>All News</span><span class="label label-default pull-right">  @if(count(App\News::all())>0)
                  {{count(App\News::all())}}
                  @endif
                </span>
              </a>
            </li>  
            <li class="treeview">
              <a href="/admin/news/add">
                <i class="fa fa-plus" aria-hidden="true"></i> <span>Add News</span>
              </a>
            </li>           
          </ul>
        </li>
        <li class="treeview">
            <a href="/">
              <i class="fa fa-file-image-o" aria-hidden="true"></i></i>
              <span>Galleries</span>
              <span class="label label-default pull-right">
                @if(count(App\Gallery::all())>0)
                  {{count(App\Gallery::all())}}
                @endif
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="treeview">
                <a href="/admin/gallery">
                  <i class="fa fa-file-text-o" aria-hidden="true"></i>
                  <span>All Galleries</span><span class="label label-default pull-right">
                    @if(count(App\Gallery::all())>0)
                      {{count(App\Gallery::all())}}
                    @endif
                  </span>
                </a>
              </li>  
              <li class="treeview">
                <a href="/admin/add/news/gallery">
                  <i class="fa fa-plus" aria-hidden="true"></i> <span>Add Gallery</span>
                </a>
              </li>           
          </ul>
        </li>
         @if(\Auth::user()->status==0)
        <li class="treeview">
          <a href="/admin/requests">
            <i class="fa fa-user-plus" aria-hidden="true"></i> <span>Author Requests</span>
          </a>
        </li>
        <li class="treeview">
          <a href="/admin/editorsInfo">
      <i class="fa fa-user" aria-hidden="true"></i> <span>Authors</span>
          </a>
        </li>
        <li class="treeview">
              <a href="/">
                <i class="fa fa-files-o" aria-hidden="true"></i> <span>Categories</span>
              </a>
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="/admin/category">
                <i class="fa fa-th-list" aria-hidden="true"></i></i> <span>All Categories</span>
              </a>
            </li>
            <li class="treeview">
              <a href="/admin/add/category">
                <i class="fa fa-plus" aria-hidden="true"></i></i> <span>Add Category</span>
              </a>
            </li>             
          </ul>
        </li>
       @endif
       


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{Request::path()}}</li>
      </ol>
    </section>

    <!-- Main content -->
    <div style=" padding-right:25%;">
    @yield('content')
      
    </div>
    <!-- /.content -->
  </div>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<script>
   jQuery(document).ready(function($) {
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function listen(event){         
          $.ajax({
                  url: '/checkAuthors',
                  type: 'GET',          
                  dataType:'json',
                  data: {},
                  success:function(count) {
                    $('.authorCount').empty();
                    $('.authorCount').append(count);
                  // $('#authorCount').append("<b>"+checkAuthors.first_name+" "+userData.last_name+"</b>");
                  // $('#delete').attr('href', '/nuser/delete/'+userData.id+'');
                  },
              
              
          });
          
        };
        // $('.editorsInfo').click(function(event) {
        //   $.ajax({
        //     url: '/editorsInfo',
        //     type: 'GET',
        //     dataType: 'html',
        //     success:function (data) {
        //        $('#content').html(data);
        //     }
        //   })
          
        // });
        setInterval(listen,2000)
        });
</script>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<!-- Slimscroll -->
<script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>

</body>
</html>
