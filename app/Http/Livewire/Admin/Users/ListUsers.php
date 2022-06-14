<?php

namespace App\Http\Livewire\Admin\Users;

use App\Exports\UserViewExport;
use App\Exports\UserViewExportQuery;
use App\Http\Livewire\Admin\AdminComponent;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class ListUsers extends AdminComponent
{
    public $state = [];

    public $user;

    public $userIdBeingRemoved = null;

    public $showEditModal = false;

    public $searchTerm = null;

    public function addNew()
    {
        //dd('here');
        $this->showEditModal = false;
        $this->state = [];
        $this->dispatchBrowserEvent('show-form');
    }
    public function createUser()
    {
        //dd($this->state);
        $validateData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:tbl_users',
            'password' => 'required|confirmed',
            'matricula' => 'required|unique:tbl_users',
            'login' => 'required|unique:tbl_users',
        ])->validate();

        $validateData['password'] = bcrypt($validateData['password']);
        $validateData['roleId'] = 1;
        $validateData['isDeleted'] = 0;
        //$validateData['empregado'] = 1;
        $validateData['createdBy'] = 1; //getuser login id

        // dd($validateData);
        User::create($validateData);
        //session()->flash('message', 'User add successfully!');
        $this->dispatchBrowserEvent(
            'hide-form',
            ['message' => 'Usuário adicionado!']
        );
        //return redirect()->back();
    }
    public function edit(User $user)
    {
        //dd($user);
        $this->showEditModal = true;
        $this->state = $user->toArray();
        $this->user = $user;
        //dd($this->state);
        $this->dispatchBrowserEvent('show-form');
    }

    public function updateUser()
    {
        //dd('here');
        //dd($this->state);
        $validateData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email',
            Rule::unique('tbl_users')->ignore(
                $this->user->id,
                'userId'
            ),
            'password' => 'sometimes|confirmed',
            'matricula' => 'required|unique:tbl_users',
            'login' => 'required|unique:tbl_users',
        ])->validate();

        if (!empty($validateData['passoword'])) {
            $validateData['password'] = bcrypt($validateData['password']);
        }

        //dd($validateData);
        $this->user->update($validateData);
        //session()->flash('message', 'User add successfully!');
        $this->dispatchBrowserEvent('hide-form', ['message' => 'Dados do usuário alterados!']);
    }

    public function confirmUserRemoval($userId)
    {
        //dd($userId);
        $this->userIdBeingRemoved = $userId;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function deleteUser()
    {
        $user = User::findOrFail($this->userIdBeingRemoved);

        $user->delete();

        $this->dispatchBrowserEvent(
            'hide-delete-modal',
            ['message' => 'Usuário excluído!']
        );
    }

    public function render()
    {
        //dd($this->searchTerm);
        $users = User::query()
            ->where('name', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('email', 'like', '%' . $this->searchTerm . '%')
            ->latest()->paginate(1700);
        return view('livewire.admin.users.list-users', [
            'users' => $users,
        ]);
    }

    public function export()
    {
        return Excel::download(new UserViewExport, 'usuarios.xlsx');
    }

    
}