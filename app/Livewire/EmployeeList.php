<?php

namespace App\Livewire;

use App\Models\employees;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeList extends Component
{
    use WithPagination;
    public $selected = [];
    public function render()
    {
        return view('livewire.employee-list', [
            'employees' => employees::paginate(5)
        ]);
    }

    public function delete($id)
    {
        try {
            $employee = employees::find($id);
            $employee->delete();
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function toggleEmployeeSelection($id)
    {
        if (in_array($id, $this->selected)) {
            $this->selected = array_filter($this->selected, function ($value) use ($id) {
                return $value != $id;
            });
        } else {
            $this->selected[] = $id;
        }
    }

    public function deleteSelected()
    {
        try {
            employees::destroy($this->selected);
            $this->selected = [];
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
