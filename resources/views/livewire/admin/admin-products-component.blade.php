<style>
    nav .hidden{
        display: block;
    }
</style>
<div>

    @livewireStyles


    <div class="bg-gray-900">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class=" shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="w-full overflow-x-auto">
                    <table class="table-auto text-gray-50 bo bg-gray-300 bg-opacity-0 section">
                        <thead class="bg-orange-700">
                            <tr>
                                <th class="px-4 py-2 text-left">#</th>
                                <th class="px-4 py-2 text-left">Image</th>
                                <th class="px-4 py-2 text-left">Name</th>
                                <th class="px-4 py-2 text-left">Stock</th>
                                <th class="px-4 py-2 text-left">Price</th>
                                <th class="px-4 py-2 text-left">Category</th>
                                <th class="px-4 py-2 text-left">Date</th>
                                <th class="px-4 py-2 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($products as $product)
                                <tr>
                                    <td class=" px-4 py-2">{{$i++}}</td>
                                    <td class=" px-4 py-2"><img src="{{asset('assets/imgs/products')}}/{{$product->image}}" width="60" alt="{{$product->name}}"></td>
                                    <td class=" px-4 py-2">{{$product->name}}</td>
                                    <td class=" px-4 py-2">{{$product->stock_status}}</td>
                                    <td class=" px-4 py-2">{{$product->regular_price}}</td>
                                    <td class=" px-4 py-2">{{$product->category->name}}</td>
                                    <td class=" px-4 py-2">{{$product->created_at}}</td>
                                    <td class=" px-4 py-2">
                                        <a href="{{route('admin.product.edit',['product_id'=>$product->id])}}">Edit</a>
                                       <a href="#" onclick="deleteConfirmation({{$product->id}})" class="text-danger ml-2">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">Do you want to delete this product?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Cancel</button>
                        <button type="button" class="btn btn-danger text-gray-900" onclick="deleteProduct()">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        function deleteConfirmation(id)
        {
          @this.set('product_id', id);
          $('#deleteConfirmation').modal('show');
        }

        function deleteProduct()
        {
             @this.call('deleteProduct')
             $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush


@livewireScripts


