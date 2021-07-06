<?php
namespace App\Http\Livewire;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
class ToggleSwitch extends Component
{
    public $model;
    
    public $field;

    public $status;

    public $uniqueId;

    public function mount()
    {
        $this->status = (bool) $this->model->getAttribute($this->field);
        $this->uniqueId = uniqid(); 
    }

    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();
        if($value){
            $this->dispatchBrowserEvent('success',['message'=>'User Activated']);
        }else{
            $this->dispatchBrowserEvent('error',['message'=>'User Deactivated']);
        }
    }

    public function render()
    {
        return view('livewire.toggle-switch',['user'=>$this->model]);
    }
}