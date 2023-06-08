<div class="flex flex-col section px-10">
    <div class="page-title px-10 py-10">
        <h1 class="text-4xl text-gray-700">Edit category</h1>
    </div>
    <form wire:submit.prevent="updateCategory" class="max-w-md w-full px-4">
      <div class="mb-4">
        <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
        <input name="name" type="text" placeholder="Enter your name" wire:model="name" wire:keyup="generateSlug" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500">
      </div>
      <div class="mb-4">
        <label for="slug" class="block text-gray-700 font-bold mb-2">Slug</label>
        <input id="slug" name="slug" type="text" placeholder="Enter a slug" wire:model="slug" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500">
      </div>
      <div class="flex ">
        <button type="submit" class="bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600 focus:outline-none">Submit</button>
      </div>
    </form>
</div>
