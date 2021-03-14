@extends('template.template-admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sub-Módulos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @if (!isset($submodule))
                            <li class="breadcrumb-item active">Inclusão Sub-Módulos</li>
                        @else
                            <li class="breadcrumb-item active">Edição Sub-Módulos</li>
                        @endif

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
                            @if (!isset($submodule))
                                <h3 class="card-title">
                                    <i class="fas fa-cubes mr-1"></i>
                                    Inclusão de Sub-Módulos
                                </h3>
                            @else
                                <h3 class="card-title">
                                    <i class="fas fa-cubes mr-1"></i>
                                    Edição de Sub-Módulos
                                </h3>
                            @endif

                            <div class="card-tools">

                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            @if (isset($submodule))
                                <form action="{{ route('submoduleUpdate') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="hidden" name="id" value="{{ $submodule->id }}">
                                            <label for="module" class="form-label">Módulo</label>
                                            <select name="module" class="form-control form-control-sm">
                                                @foreach ($modules as $module)
                                                    @if ($submodule->moduleid == $module->id)
                                                        <option value="{{$module->id}}" selected>{{$module->name}}</option>
                                                    @else
                                                        <option value="{{$module->id}}">{{$module->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="name" class="form-label">Sub-Módulo</label>
                                            <input type="text" class="form-control form-control-sm" name="name"
                                                value="{{ $submodule->name }}">
                                        </div>
                                    </div>
                                    <div class="row mt-4 text-right">
                                        <div class="col">
                                            <button type="submit" class="btn btn-sm btn-success">
                                                <i class="far fa-save mr-1"></i>
                                                Alterar
                                            </button>
                                            <a href="{{ route('submoduleList') }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-arrow-circle-left"></i>
                                                Cancelar
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('submoduleStore') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="module" class="form-label">Módulo</label>
                                            <select name="module" class="form-control form-control-sm">
                                                @foreach ($modules as $module)
                                                    <option value="{{$module->id}}">{{$module->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="name" class="form-label">Sub-Módulo</label>
                                            <input type="text" class="form-control form-control-sm" name="name">
                                        </div>
                                    </div>
                                    <div class="row mt-4 text-right">
                                        <div class="col">
                                            <button type="submit" class="btn btn-sm btn-success">
                                                <i class="far fa-save mr-1"></i>
                                                Salvar
                                            </button>
                                            <a href="{{ route('submoduleList') }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-arrow-circle-left"></i>
                                                Cancelar
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            @endif

                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
            </div>
        </div><!-- /.container-fluid -->
        <!-- Caso tenha erro mostra o Modal de erros -->
        @if ($errors->any())
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#errorModal").modal("show");
                });

            </script>
        @endif
    </section>
    <!-- /.content -->
@endsection
