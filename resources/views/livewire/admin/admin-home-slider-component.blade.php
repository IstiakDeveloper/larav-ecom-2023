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
                                <th class="px-4 py-2 text-left">Top Title</th>
                                <th class="px-4 py-2 text-left">Title</th>
                                <th class="px-4 py-2 text-left">Sub Title</th>
                                <th class="px-4 py-2 text-left">Offer</th>
                                <th class="px-4 py-2 text-left">Link</th>
                                <th class="px-4 py-2 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($slides as $slide)
                                <tr>
                                    <td class=" px-4 py-2">{{$i++}}</td>
                                    <td class=" px-4 py-2"><img src="{{asset('assets/imgs/slider')}}/{{$slide->image}}" width="60" alt=""></td>
                                    <td class=" px-4 py-2">{{$slide->top_title}}</td>
                                    <td class=" px-4 py-2">{{$slide->title}}</td>
                                    <td class=" px-4 py-2">{{$slide->sub_title}}</td>
                                    <td class=" px-4 py-2">{{$slide->offer}}</td>
                                    <td class=" px-4 py-2">{{$slide->link}}</td>
                                    <td class=" px-4 py-2">
                                        <a href="{{route('admin.slide.edit',['slide_id'=>$slide->id])}}">Edit</a>
                                       <a href="#" onclick="deleteConfirmation({{$slide->id}})" class="text-danger ml-2">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
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
                        <h4 class="pb-3">Do you want to delete thid slide?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Cancel</button>
                        <button type="button" class="btn btn-danger text-gray-900" onclick="deleteSlide()">Delete</button>
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
          @this.set('slide_id', id);
          $('#deleteConfirmation').modal('show');
        }

        function deleteSlide()
        {
             @this.call('deleteSlide')
             $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush


@livewireScripts

