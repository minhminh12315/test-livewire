<?php

namespace App\Livewire;

use App\Models\employees;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;

class AddEmployee extends Component
{
    public $name;
    public $email;
    public $phone;
    public $address;
    public function saveEmployee()
    {   
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);
        try{
            $new_employee = new employees;
            $new_employee->name = $this->name;
            $new_employee->email = $this->email;
            $new_employee->phone = $this->phone;
            $new_employee->address = $this->address;
            $new_employee->save();

            return $this->redirect('/employees', navigate:true);
        } catch (\Exception $e) {
            dd($e);
        }

    }

    public function render()
    {
        return view('livewire.add-employee');
    }
}
