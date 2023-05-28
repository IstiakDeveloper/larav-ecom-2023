<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoriesComponent extends Component
{

    use WithPagination;

    public $categoryId;
    public function deleteCategory($categoryId)
    {
        $category = Category::find($categoryId);
        if ($category) {
            $category->delete();
            flash()->addSuccess('success', 'Category deleted successfully.');
        }
    }
     public function categoryDelete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        flash()->addSuccess('Category deleted successfully!');
    }

    public function render()
    {
    $categories = Category::orderBy('name', 'ASC')->paginate(20)->withQueryString();
    return view('livewire.admin.admin-categories-component', ['categories' => $categories])->layout('layouts.admin-layout');
    }
}
