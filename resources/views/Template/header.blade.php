<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inventaris App</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/adminlte.min.css') }}">
  

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/bs-stepper/css/bs-stepper.min.css') }}">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/dropzone/min/dropzone.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/adminlte.min.css') }}">
  <!-- DataTables -->
  {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css"> --}}

  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  
  @include('sweetalert::alert')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('Dashboard') }}" class="brand-link">
      <span class="brand-text font-weight-light">Inventaris App</span>
    </a>

    <!-- Sidebar -->
    @include('Template.sidebar')
    <!-- /.sidebar -->
  </aside>