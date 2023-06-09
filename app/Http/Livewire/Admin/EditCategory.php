<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Categories;
use Illuminate\Support\Str;

class EditCategory extends Component
{
    public $name;
    public $slug;
    public $category_id;

    public function mount($category_id)
    {

        $category = Categories::find($category_id);
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
    }
    public function MakeSlug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required'
        ]);
    }

    public function EditCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);
        $category = Categories::find($this->category_id);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('success', 'Category updated successfully.');
    }
    public function render()
    {
        return view('livewire.admin.edit-category');
    }
}
