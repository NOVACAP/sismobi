<div>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Listagem de Usuários <span style="font-size: 13px;">(pessoas que acessam o
                        sistema)</span></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Início</a></li>
                    <li class="breadcrumb-item active">Usuários</li>
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
                    <button wire:click.prevent="addNew" class="btn btn-primary"><i
                            class="fa fa-plus-circle mr-1"></i>Adicionar Usuários</button>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table id="tblusers" class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th scope="col">#</th>
                                    {{-- <th scope="col">E-mail</th> --}}
                                    <th scope="col">Nome</th>
                                    <th scope="col">Login</th>
                                    <th scope="col">Matrícula</th>
                                    <th scope="col">Perfil</th>
                                    <th scope="col">Setor</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 12px;">
                                @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    {{-- <td>{{ $user->email }}</td> --}}
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->login }}</td>
                                    <td>{{ $user->matricula }}</td>
                                    <td>{{ $user->roleId }}</td>
                                    <td>{{ $user->setor }}</td>
                                    <td>
                                        <a href="" wire:click.prevent="edit({{ $user }})">
                                            <i class="fa fa-edit mr-2"></i>
                                        </a>
                                        <a href="" wire:click.prevent="confirmUserRemoval({{ $user->userId }})">
                                            <i class="fa fa-trash text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        {{-- {{ $users->links()}} --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<!-- Modal -->
<div class="modal" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg">
        <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateUser' : 'createUser' }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        @if ($showEditModal)
                        <span>Atualizar usuário</span>
                        @else
                        <span>Adicionar usuário</span>
                        @endif
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" wire:model.defer="state.name" class="form-control @error('name')
                                                            is-invalid
                                                        @enderror" id="name">
                                @error('name')
                                <div class="invalid-feedback">
                                    O campo nome é requerido.
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" wire:model.defer="state.email" class="form-control @error('email')
                                                        is-invalid
                                                        @enderror" id="email" placeholder="Entre com seu e-mail">
                                @error('email')
                                <div class="invalid-feedback">
                                    O campo e-mail é requerido.
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="login" class="form-label">Login</label>
                                <input type="text" wire:model.defer="state.login" class="form-control @error('login')
                                                                        is-invalid
                                                                        @enderror" id="login">
                                @error('login')
                                <div class="invalid-feedback">
                                    O campo login é requerido.
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="roleId" class="form-label">Perfil</label>
                                <select class="form-select" name="roleId" wire:model.defer="state.roleId">
                                    <option value="1" selected>Administrador do Sistema</option>
                                    <option value="2">Gerente</option>
                                    <option value="3">Empregado</option>
                                    <option value="4">Leitura</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="matricula" class="form-label">Matrícula</label>
                                <input type="text" wire:model.defer="state.matricula" class="form-control @error('matricula')
                                                    is-invalid
                                                    @enderror" id="matricula" aria-describedby="matricula" maxlength="9">
                                @error('matricula')
                                <div class="invalid-feedback">
                                    O campo matricula é requerido.
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="setor" class="form-label">Setor</label>
                                <input type="text" wire:model.defer="state.setor" class="form-control" id="setor" aria-describedby="setor">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="cargo" class="form-label">Cargo</label>
                                <input type="text" wire:model.defer="state.cargo" class="form-control" id="cargo" aria-describedby="cargo">
                            </div>
                            <div class="col-md-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" wire:model.defer="state.password" class="form-control @error('password')
                                                    is-invalid
                                                    @enderror " id="password">
                                @error('password')
                                <div class="invalid-feedback">
                                    O campo senha é requerido ou não foi confirmado.
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="passwordConfirmation" class="form-label">Confirm Password</label>
                                <input type="password" wire:model.defer="state.password_confirmation" class="form-control"
                                    id="passwordConfirmation">
                            </div>
                        </div>

                        <div class="mb-3 form-check ml-1">
                            <input type="checkbox" wire:model.defer="state.empregado" class="form-check-input" id="empregado">
                            <label class="form-check-label" for="empregado">Empregado</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="fa fa-times mr-1"></i> Cancelar</button>
                    <button type="submit" class="btn btn-outline-primary"><i class="fa fa-save mr-1"></i>
                        @if ($showEditModal)
                        <span>Salvar alterações</span>
                        @else
                        <span>Salvar</span>
                        @endif</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal -->
<div class="modal" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Excluir Usuário</h5>
            </div>

            <div class="modal-body">
                <h4>Tem certeza em excluir este usuário?</h4>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times mr-1"></i>
                    Cancelar</button>
                <button type="button" wire:click.prevent="deleteUser" class="btn btn-danger"><i
                        class="fa fa-trash mr-1"></i>Apagar Usuário</button>
            </div>
        </div>
    </div>
</div>
<!-- end Modal -->
</div>
