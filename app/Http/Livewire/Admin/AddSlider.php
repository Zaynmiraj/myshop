<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class AddSlider extends Component
{
    use WithFileUploads;
    public $top_title;
    public $title;
    public $sub_title;
    public $link;
    public $offer;
    public $status;
    public $image;


    public function AddSlider()
    {
        $this->validate([
            'top_title' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'link' => 'required',
            'offer' => 'required',
            'status' => 'required',
            'image' => 'required',
        ]);

        $slider = new HomeSlider();
        $slider->top_title = $this->top_title;
        $slider->title = $this->title;
        $slider->sub_title = $this->sub_title;
        $slider->link = $this->link;
        $slider->offer = $this->offer;
        $slider->status = $this->status;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('slider', $imageName);
        $slider->image = $imageName;
        $slider->save();
        return redirect()->route('admin.homesliders')->back()->with('success', 'Added slider successfully.');
    }
    public function render()
    {
        return view('livewire.admin.add-slider');
    }
}
