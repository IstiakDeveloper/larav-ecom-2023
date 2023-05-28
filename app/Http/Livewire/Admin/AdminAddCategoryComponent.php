<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;

    public $category_id;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fileds)
    {
        $this->validateOnly($fileds, [
            'name' => 'required',
            'slug' => 'required'
        ]);

    }
    public function storeCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        flash()->addSuccess('Category has been created');
        return redirect()->route('admin.category');
    }





    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.admin-layout');
    }
}
