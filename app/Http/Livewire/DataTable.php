<?php
namespace App\Http\Livewire;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
class DataTable extends Component
{
    public $model;
    public function render()
    {
        return view('livewire.data-table');
    }
}