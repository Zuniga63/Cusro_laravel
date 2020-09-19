@extends("theme/$theme/layout")

@section('title')
Permisos
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Permisos del sistema</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Admin</a></li>
          <li class="breadcrumb-item active">Permisos</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-primary">
        <div class="card-header with-border">
          <h3 class="card-title">Bordered Table</h3>
        </div>
        <div class="card-body table-responsive p-0" style="height: 300px;">
          <table class="table table-head-fixed table-hover table-striped text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre </th>
                <th>Slug </th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($permissions as $permission)
                <tr>
                  <td>{{$permission->id}}</td>
                  <td>{{$permission->name}}</td>
                  <td>{{$permission->slug}}</td>
                  <td></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
@endsection