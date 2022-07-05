<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listagem de usuários do Vale Transportes </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Vl.Transporte</li>
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
                    <div class="d-flex justify-content-end mb-2">

                        <button wire:click.prevent="filtrarBuscaVltransporte" class="btn btn-primary"><i
                                class="fa fa-plus-circle mr-1"></i>Exportar XML</button>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="panel-body">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                                        {{ $message }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="inputFile">Escolher:</label>
                                        <input type="file" name="file" id="inputFile"
                                            class="form-control @error('file') is-invalid @enderror">
                                        @error('file')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Importar</button>
                                    </div>
                                </form>
                            </div>
                            <!-- DIRECT CHAT PRIMARY -->
                            <div class="card card-primary card-outline direct-chat direct-chat-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Busca Específica</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <div class="col-auto">
                                        <label for="inputPassword6" class="col-form-label">Password</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="password" id="inputPassword6" class="form-control"
                                            aria-describedby="passwordHelpInline">
                                    </div>

                                    <div class="col-auto">
                                        <label for="inputPassword6" class="col-form-label">Password</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="password" id="inputPassword6" class="form-control"
                                            aria-describedby="passwordHelpInline">
                                    </div>


                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <form action="#" method="post">
                                        <div class="input-group">


                                            <button type="submit" class="btn btn-primary">Buscar</button>

                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-footer-->
                            </div>
                            <!--/.direct-chat -->


                            <table id="tblvltransporte" class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr align="center">
                                        <th scope="col">#</th>
                                        <th scope="col">Mês/Ano</th>
                                        <th scope="col">Matrícula</th>
                                        <th scope="col">CPF</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Linha</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col">H Extra</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">
                                    @foreach ($transports as $tr)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>

                                            <td>{{ $tr->MesAno }}</td>
                                            <td>{{ $tr->Matricula }}</td>
                                            <td>{{ $tr->Cpf }}</td>
                                            <td>{{ $tr->Nome }}</td>
                                            <td>{{ $tr->Linha }}</td>
                                            <td>{{ $tr->Valor }}</td>
                                            <td>{{ $tr->QuantidadeExtra }}</td>
                                            <td>{{ $tr->ValorTotal }}</td>
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
