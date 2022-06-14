<div>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Listagem de Transportes </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Transporte</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        {{-- @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><i class="fa fa-check-circle mr-1"></i> {{ session('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif --}}
        <div class="row">
            <div class="col-lg-12">
                {{-- <div class="d-flex justify-content-end mb-2">
                    <button wire:click.prevent="addNew" class="btn btn-primary"><i
                            class="fa fa-plus-circle mr-1"></i>Adicionar Transporte</button>
                </div> --}}
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Matrícula</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">Linha</th>
                                    {{-- <th scope="col">Ações</th> --}}
                                </tr>
                            </thead>
                            <tbody style="font-size: 12px;">
                                @foreach ($transports as $tr)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>

                                    <td>{{ $tr->Nome }}</td>
                                    <td>{{ $tr->Matricula }}</td>
                                    <td>{{ $tr->Cpf }}</td>
                                    <td>{{ $tr->Linha }}</td>
                                    {{-- <td>
                                        <a href="" wire:click.prevent="edit({{ $user }})">
                                            <i class="fa fa-edit mr-2"></i>
                                        </a>
                                        <a href="" wire:click.prevent="confirmUserRemoval({{ $user->userId }})">
                                            <i class="fa fa-trash text-danger"></i>
                                        </a>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        {{-- {{ $transports->links()}} --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
