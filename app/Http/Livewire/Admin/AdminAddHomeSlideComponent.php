<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddHomeSlideComponent extends Component
{
    use WithFileUploads;


    public $slide_id;
    public $top_title;
    public $title;
    public $sub_title;
    public $offer;
    public $status;
    public $link;
    public $image;

    public function addSlide()
    {
        $this->validate([
            'top_title' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'offer' => 'required',
            'link' => 'required',
            'status' => 'required',
            'image' => 'required',
        ]);

        $slide = new HomeSlider();
        $slide->top_title = $this->top_title;
        $slide->title = $this->title;
        $slide->sub_title = $this->sub_title;
        $slide->offer = $this->offer;
        $slide->status = $this->status;
        $slide->link = $this->link;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('slider', $imageName);
        $slide->image = $imageName;
        $slide->save();
        flash()->addSuccess('slide is updated');
        return redirect()->route('admin.slider');

    }



    public function render()
    {
        return view('livewire.admin.admin-add-home-slide-component')->layout('layouts.admin-layout');
    }
}
