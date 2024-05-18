<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Permission;
use Livewire\WithPagination;
use App\Models\Role as ModelsRole;


class Role extends Component
{

    use WithPagination;

    public $idHapus, $edit = false, $idnya;

    public $updateTypes = [];

    public $permission;

    public $form = [
        'name' => null,
        'description' => null,
        'display_name' => null,
    ];

    public function mount($id = '')
    {
        if ($id != '') {
            $role = ModelsRole::with(['permissions'])->find($id)->toArray();
            $data = ModelsRole::with(['permissions'])->find($id);
            $this->form = $role;
            $this->updateTypes = $data->permissions->pluck('name')->toArray();
            $this->edit = true;
            $this->idHapus = $id;
        }

        $this->permission = Permission::all();

    }


    public function save()
    {
        if ($this->edit) {
            $this->storeUpdate();
        } else {
            $this->store();
        }

        $this->js(<<<'JS'
        Swal.fire({
            title: 'Good job!',
            text: 'You clicked the button!',
            icon: 'success',
          })
        JS);
    }

    public function store()
    {
        $this->validate([
            'form.name' => 'required|alpha_dash|unique:roles,name',
            'form.display_name' => 'required',
        ]);

        $data = ModelsRole::create($this->form);
        $data->givePermissions($this->updateTypes);
    }

    public function storeUpdate()
    {
        ModelsRole::find($this->idHapus)->update([
            'name' => $this->form['name'],
            'description' => $this->form['description'],
            'display_name' => $this->form['display_name'],
        ]);

        $data = ModelsRole::find($this->idHapus);
        $data->syncPermissions($this->updateTypes);

        $this->redirect(route('admin.list-role'));

    }

    public function render()
    {
        $data = ModelsRole::paginate(10);

        return view('livewire.user.role', [
            'post' => $data,
        ]);
    }
}
