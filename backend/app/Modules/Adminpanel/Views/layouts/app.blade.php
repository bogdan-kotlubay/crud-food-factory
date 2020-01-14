<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>Food Factory | CRM</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<!-- ADMIN JS JQUERY / ADMIN LTE JS -->
<script src="/js/admin.js"></script>


<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css">

<!-- jQuery.NumPad -->
<script src="/js/jquery.numpad.js"></script>
<link rel="stylesheet" href="/css/jquery.numpad.css">

<!-- jQuery.Datapicker -->
<script src="{{ asset('js/datepicker/main.js') }}" defer></script>
<link rel="stylesheet" href="{{ asset('/css/datepicker/main.css') }}">
<link rel="stylesheet" href="{{ asset('/css/datepicker/datepicker.css') }}">

<!-- jQuery.MultiSelect -->
<script src="{{ asset('/js/TvMultiSelectPanel.js') }}"></script>
<link rel="stylesheet" href="{{ asset('/css/TvMultiSelectPanel.css') }}">

<!-- jQuery.Validate-->
<script src="{{ asset('/js/jquery.validate.min.js') }}"></script> 


<!-- ADMIN CSS -->
<link rel="stylesheet" href="/css/admin.css">

<style>
      table.table form
      {
        display: inline-block;
      }
      button.delete
      {
        background: transparent;
        border: none;
        color: #337ab7;
        padding: 0px;
      }
</style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>F</b>FC</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Food Factory</b> CRM</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li><a href="{{ url('locale/uz') }}">UZ</a></li>
          <li><a href="{{ url('locale/ru') }}">RU</a></li>
          <li>
              <a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                  @lang('messages.exit')
              <i class="fa fa-sign-out"></i>
              </a>
              
          </li>
        </ul>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        </div>
        <div class="pull-left info">
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
     @include('Adminpanel::layouts._sidebar')
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; 2019 <a href="#">Food Factory</a>.</strong>
  </footer>
<!-- ./wrapper -->


</div>
</body>
</html>
