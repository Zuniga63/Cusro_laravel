@extends("theme/$theme/layout")

@section('title')
Sistema Menús
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset("assets/js/jquery-nestable/jquery.nestable.css")}}">
@endsection

@section('scriptPlugins')
<script src="{{asset("assets/js/jquery-nestable/jquery.nestable.js")}}"></script>
@endsection

@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/menu/index.js")}}"></script>
@endsection

@section('contentHeader')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Sistema de menus - Ordenamiento</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Admin</a></li>
          <li class="breadcrumb-item"><a href="#">Layout</a></li>
          <li class="breadcrumb-item active">Ment</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
@endsection

@section('content')
@include('includes.form_message')
@csrf
<div class="dd" id="nestable">
  <ol class="dd-list">
    @foreach ($menus as $key => $item)
    @include('admin.menu.menu-item', ["item" => $item])
    @endforeach
  </ol>
</div>
@endsection