@extends("theme/$theme/layout")

@section('title')
Sistema Menús
@endsection

@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/create.js")}}"></script>
@endsection

@section('contentHeader')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Sistema de menus - Nuevo menú</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Admin</a></li>
          <li class="breadcrumb-item"><a href="#">Layout</a></li>
          <li class="breadcrumb-item active">Fixed Navbar Layout</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
@endsection

@section('content')
@include('admin/menu/form')
@endsection