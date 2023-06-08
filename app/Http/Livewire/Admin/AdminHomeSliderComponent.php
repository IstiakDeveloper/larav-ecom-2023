<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    public $slide_id;

    public function deleteSlide()
    {
        $slide = HomeSlider::find($this->slide_id);
        $slide->delete();
        flash()->addSuccess('Slide has been deleted successfully!');
        return redirect()->route('admin.slider');

    }

    public function render()
    {


        $slides = HomeSlider::orderBy('created_at', 'DESC')->get();
        return view('livewire.admin.admin-home-slider-component', ['slides'=>$slides])->layout('layouts.admin-layout');
    }
}
