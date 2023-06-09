<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Categories;
use Livewire\WithPagination;

class AdminCategory extends Component
{
    use WithPagination;
    public function CategoryEdit($id)
    {
        $category = Categories::find($id);
        $this->emit('admin.categoru.add');
        return route('admin.category.add', compact('category'));;
    }
    public function CategoryDelete($id)
    {
        $category = Categories::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
    public function render()
    {
        $data = Categories::orderBy('name', 'ASC')->paginate(10);
        return view('livewire.admin.admin-category', ['datas' => $data]);
    }
}
