<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Categories;

class AddCategory extends Component
{
    public $name;
    public $slug;

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
    public function addCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        $category = new Categories();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('success', 'Category added successfully.');
        return redirect()->route('admin.category');
    }
    public function render()
    {
        return view('livewire.admin.add-category');
    }
}
