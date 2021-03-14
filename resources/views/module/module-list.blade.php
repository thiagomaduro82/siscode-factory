@extends('template.template-admin')
@php
use App\Classes\Functionalities;
$functionalities = new Functionalities();
@endphp
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
                        <li class="breadcrumb-item active">Listagem Módulos</li>
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
                                Listagem de Módulos
                            </h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="btn btn-sm btn-success" href="{{ route('moduleCreate') }}">
                                            <i class="fas fa-plus-circle mr-1"></i>
                                            Incluir
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <table id="tables" class="table table-striped table-hover table-sm" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th style="width: 20%" class="text-center">Opções</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($moduleList as $module)
                                        <tr>
                                            <td class="p-1">{{ $module->name }}</td>
                                            <td class="text-center p-1">
                                                <a href="{{ route('moduleEdit', ['id' => $functionalities->encript($module->id)]) }}"
                                                    class="btn btn-sm btn-warning p-1">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a href="{{ route('moduleDelete', ['id' => $functionalities->encript($module->id)]) }}"
                                                    class="btn btn-sm btn-danger p-1">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
            </div>
        </div><!-- /.container-fluid -->
        @if (isset($delete))
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#deleteModal").modal("show");
                });

            </script>
        @endif

        <!-- Modal Delete -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-light">
                    <form action="{{ route('moduleDestroy') }}" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title text-warning" id="deleteModalLabel">
                                <i class="far fa-question-circle"></i>
                                Confirmação
                            </h5>
                        </div>
                        <div class="modal-body text-danger">
                            @if (isset($delete))

                                @csrf
                                <input type="hidden" name="id" value="{{ $functionalities->decript($delete) }}">

                                <p>Deseja realmente excluir esse Módulo ?</p>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger btn-sm">Sim</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Não</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
