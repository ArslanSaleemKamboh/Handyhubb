<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Show extends Component
{ 
    public $title;
    public $state=[];
    public $isEdit=false;
    public $category;
    public $category_id;
    public function createCategory()
    {
        $this->isEdit=false;
        $this->dispatchBrowserEvent('show-model');
        $this->state=[];

       
    }
    public function editCategory(Category $category)
    {
        $this->isEdit=true;
        $this->state= $category->toArray();
        $this->category= $category;
        $this->dispatchBrowserEvent('show-model');
        
    }
    public function saveCategory()
    {
        if(!isset($this->state['status']) || !isset($this->state['inheader'])){
            $this->state['status']=1;
            $this->state['inheader']='yes';
        }
        $validatedData=Validator::make($this->state,[
            'name'=>'required',
            'title'=>'required',
            'status'=>'required',
            'inheader'=>'required'
        ])->validate();
        Category::create($validatedData);
        $this->dispatchBrowserEvent('hide-model',['message'=>'Category Created Successfully!']);
        return redirect()->back();
    }
    public function saveCategirtChanges()
    {
        $validatedData=Validator::make($this->state,[
            'name'=>'required',
            'title'=>'required',
            'status'=>'required',
            'inheader'=>'required'
        ])->validate();
        $this->category->update($validatedData);
        $this->dispatchBrowserEvent('hide-model',['message'=>'Category Updated Successfully!']);
        return redirect()->back();
    }
    public function confirmCategoryRemoval($id)
    {
        $this->category_id=$id;
        $this->dispatchBrowserEvent('show-delete-model');
    }
    public function deleteCategory()
    {
        $category=Category::findOrFail($this->category_id);
        $category->delete();
        $this->dispatchBrowserEvent('hide-delete-model',['message'=>'Category Deleted Successfully!']);
        
    }
    public function render()
    {
        $categories=Category::orderBy('id','desc')->get();
        return view('livewire.categories.show',[
            'categories'=>$categories
        ]);
    }
}
