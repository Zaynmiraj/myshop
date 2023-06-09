<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use App\Models\HomeSlider;

class EditSlider extends Component
{
    use WithFileUploads;
    public $top_title;
    public $title;
    public $sub_title;
    public $link;
    public $offer;
    public $status;
    public $photo;
    public $slider_id;
    public $image;

    public function mount($slider_id)
    {
        $sliders = HomeSlider::find($slider_id);
        $this->slider_id = $sliders->id;
        $this->title = $sliders->title;
        $this->sub_title = $sliders->sub_title;
        $this->link = $sliders->link;
        $this->offer = $sliders->offer;
        $this->status = $sliders->status;
        $this->image = $sliders->image;
        $this->top_title = $sliders->top_title;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'top_title' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'link' => 'required',
            'offer' => 'required',
            'status' => 'required',
            'image' => 'nullable',
        ]);
    }

    public function EditSlider()
    {
        $this->validate([
            'top_title' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'link' => 'required',
            'offer' => 'required',
            'status' => 'required',
            'image' => 'nullable ',
        ]);

        $slider = HomeSlider::find($this->slider_id);
        $slider->top_title = $this->top_title;
        $slider->title = $this->title;
        $slider->sub_title = $this->sub_title;
        $slider->link = $this->link;
        $slider->offer = $this->offer;
        $slider->status = $this->status;
        if ($this->photo) {
            unlink('assets/imgs/slider/' . $slider->image);
            $imageName = Carbon::now()->timestamp . '.' . $this->photo->extension();
            $this->photo->storeAs('slider', $imageName);
            $slider->image = $imageName;
        }
        $slider->save();
        return redirect()->route('admin.homesliders')->back()->with('success', 'Updated slider successfully.');
    }
    public function render()
    {
        return view('livewire.admin.edit-slider');
    }
}
