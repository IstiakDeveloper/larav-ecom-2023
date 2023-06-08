<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoriesComponent extends Component
{

    public $category_id;
    use WithPagination;

    public function deleteCategory()
    {
        $category = Category::find($this->category_id);
        $category->delete();
        flash()->addSuccess('Category has been deleted successfully!');
        return redirect()->route('admin.category');

    }

    public function render()
    {
    $categories = Category::orderBy('name', 'ASC')->paginate(20)->withQueryString();
    return view('livewire.admin.admin-categories-component', ['categories' => $categories])->layout('layouts.admin-layout');
    }
}
