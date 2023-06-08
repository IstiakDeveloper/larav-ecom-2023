<div class="flex flex-col section px-10">
    <div class="page-title px-10 py-10">
        <h1 class="text-4xl text-gray-700">Add new Slide</h1>
    </div>
    <form wire:submit.prevent="addSlide" class="max-w-md w-full px-4">
      <div class="mb-4">
        <label for="top_title" class="block text-gray-700 font-bold mb-2">Top Title</label>
        <input name="top_title" type="text" placeholder="Enter your top title" wire:model="top_title" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500">
        @error('top_title')
            <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
        <input name="title" type="text" placeholder="Enter your top title" wire:model="title" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500">
        @error('title')
            <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="sub_title" class="block text-gray-700 font-bold mb-2">Sub Title</label>
        <input name="sub_title" type="text" placeholder="Enter your top title" wire:model="sub_title" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500">
        @error('sub_title')
            <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="offer" class="block text-gray-700 font-bold mb-2">Offer</label>
        <input name="offer" type="text" placeholder="Enter your top title" wire:model="offer" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500">
        @error('offer')
            <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="status" class="block text-gray-700 font-bold mb-2">Status</label>
        <select name="status" class="from-control" wire:model="status">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
        @error('status')
            <p class="text-danger">{{$message}}</p>
        @enderror
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
        <label for="link" class="block text-gray-700 font-bold mb-2">Link</label>
        <input name="link" type="text" placeholder="Enter your top title" wire:model="link" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500">
        @error('link')
            <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="flex ">
        <button type="submit" class="bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600 focus:outline-none">Submit</button>
      </div>
    </form>
</div>
