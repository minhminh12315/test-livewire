<?php

namespace App\Livewire;

use App\Models\employees;
use Livewire\Component;

class EditEmployee extends Component
{   
    public $employee_id;
    public employees $employee;
    public $name;
    public $email;
    public $phone;
    public $address;
    public function mount($id)
    {   
        $this->employee_id = $id;
        $this->employee = employees::find($id);
        $this->name = $this->employee->name;
        $this->email = $this->employee->email;
        $this->phone = $this->employee->phone;
        $this->address = $this->employee->address;
    }
    public function update()
    {
        $this->validate([
            'employee.name' => 'required',
            'employee.email' => 'required|email',
            'employee.phone' => 'required',
            'employee.address' => 'required',
        ]);
        try{
            employees::where('id', $this->employee_id)->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
            ]);
            $this->redirect('/employees', navigate:true);
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect('/employees');
    }
    public function render()
    {
        return view('livewire.edit-employee');
    }
}
