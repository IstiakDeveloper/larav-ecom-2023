<div class="flex flex-col section px-10">
    <div class="page-title px-10 py-10">
        <h1 class="text-4xl text-gray-300">Add new product</h1>
    </div>

    <form wire:submit.prevent="addProduct" class="max-w-md w-full px-4">
        <div class="flex section">
            <div class="right flex-auto">
                <div class="mb-4">
                    <label for="name" class="block text-gray-300 font-bold mb-2">Name</label>
                    <input name="name" type="text" placeholder="Enter your name" wire:model="name" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500">
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="slug" class="block text-gray-300 font-bold mb-2">Slug</label>
                    <input id="slug" name="slug" type="text" placeholder="Enter a slug" wire:model="slug" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="short_description" class="block text-gray-300 font-bold mb-2">Short Description</label>
                    <textarea name="short_description" id="short_description" placeholder="Enter short description" wire:model="short_description" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500"></textarea>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-300 font-bold mb-2">Description</label>
                    <textarea name="description" id="description" placeholder="Enter a description" wire:model="description" cols="30" rows="10" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500"></textarea>
                </div>

                <div class="mb-4">
                    <label for="regular_price" class="block text-gray-300 font-bold mb-2">Regular Price</label>
                    <input id="regular_price" name="regular_price" type="text" placeholder="Enter Regular Price" wire:model="regular_price" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="sale_price" class="block text-gray-300 font-bold mb-2">Sale Price</label>
                    <input id="sale_price" name="sale_price" type="text" placeholder="Enter Sale Price" wire:model="sale_price" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="sku" class="block text-gray-300 font-bold mb-2">SKU</label>
                    <input id="sku" name="sku" type="text" placeholder="Product SKU" wire:model="sku" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="quantity" class="block text-gray-300 font-bold mb-2">Quantity</label>
                    <input id="quantity" name="quantity" type="number" placeholder="Product Quantity" wire:model="quantity" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500">
                </div>
            </div>

            <div class="left flex-auto ml-8">
                <div class="mb-4">
                    <label for="category_id" class="block text-gray-300 font-bold mb-2">Category</label>
                    <select name="category_id" id="category_id" wire:model="category_id" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-gray-300 font-bold mb-2">Image</label>
                    <input id="image" name="image" type="file" wire:model="image" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500">
                    @if ($image)
                        <img src="{{$image->temporaryUrl()}}" alt="" width="120">
                    @endif
                    @error('image')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="stock_status" class="block text-gray-300 font-bold mb-2">Stock Status</label>
                    <select name="stock_status" id="stock_status" wire:model="stock_status" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500">
                        <option value="instock">In Stock</option>
                        <option value="outofstock">Out of Stock</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="featured" class="block text-gray-300 font-bold mb-2">Featured</label>
                    <input type="checkbox" id="featured" name="featured" value="1" wire:model="featured">
                </div>
            </div>
        </div>

        <div class="mt-8">
            <button type="submit" wire:loading.attr="disabled" class="bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600 focus:outline-none">Submit</button>
        </div>
    </form>
</div>
