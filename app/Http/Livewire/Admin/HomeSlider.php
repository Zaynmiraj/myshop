<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider as Slider;
use Livewire\WithPagination;

class HomeSlider extends Component
{

    public function SliderDelete($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        unlink('assets/imgs/slider/' . $slider->image);
        session()->flash('success', 'Slide deleted successfully.');
        return redirect()->route('admin.homesliders');
    }
    use WithPagination;
    public function render()
    {
        $slider = Slider::Paginate(10);
        return view('livewire.admin.home-slider', ['slider' => $slider]);
    }
}
