@extends('template.template-admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Módulos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Inclusão Módulos</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <!-- Left col -->
                <section class="col-lg-7 ">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card shadow">
                        <div class="card-header text-info">
                            <h3 class="card-title">
                                <i class="fas fa-cube mr-1"></i>
                                Inclusão de Módulos
                            </h3>
                            <div class="card-tools">

                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{route('moduleStore')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="name" class="form-label">Nome</label>
                                        <input type="text" class="form-control form-control-sm" name="name">
                                    </div>
                                </div>
                                <div class="row mt-4 text-right">
                                    <div class="col">
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="far fa-save mr-1"></i>
                                            Salvar
                                        </button>
                                        <a href="{{route('moduleList')}}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-arrow-circle-left"></i>
                                            Cancelar
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
