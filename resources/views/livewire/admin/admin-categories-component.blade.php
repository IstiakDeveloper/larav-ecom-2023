<style>
    nav .hidden{
        display: block;
    }
</style>
<div>

    @livewireStyles


    <div class="">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class=" shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="w-full overflow-x-auto">
                    <table class="table-auto text-gray-50 bo bg-gray-300 bg-opacity-0 section">
                        <thead class="bg-blue-800">
                            <tr>
                                <th class="px-4 py-2 text-left">#</th>
                                <th class="px-4 py-2 text-left">Name</th>
                                <th class="px-4 py-2 text-left">Slug</th>
                                <th class="px-4 py-2 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($categories as $category)
                                <tr>
                                    <td class=" px-4 py-2">{{$i++}}</td>
                                    <td class=" px-4 py-2">{{$category->name}}</td>
                                    <td class=" px-4 py-2">{{$category->slug}}</td>
                                    <td class=" px-4 py-2">
                                        <a href="{{route('admin.category.edit',['category_id'=>$category->id])}}">Edit</a>
                                        <form onsubmit="return confirm('Are you sure?');"
                                            wire:submit.prevent="categoryDelete({{ $category->id }})">
                                            <button type="submit">
                                                Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@livewireScripts

