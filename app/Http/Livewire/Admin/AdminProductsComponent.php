<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductsComponent extends Component
{
    use WithPagination;
    public $product_id;

    public function deleteProduct()
    {
        $product = Product::find($this->product_id);
        $product->delete();
        flash()->addSuccess('product has been deleted successfully!');
        return redirect()->route('admin.products');

    }

    public function render()
    {
        $products = Product::orderBy('created_at', 'ASC')->paginate(20)->withQueryString();
        return view('livewire.admin.admin-products-component', ['products' => $products])->layout('layouts.admin-layout');
    }
}
