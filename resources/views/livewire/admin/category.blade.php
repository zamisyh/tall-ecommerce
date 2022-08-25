<div>

    @section('title')
        Category
    @endsection

    <div class="drawer-content" x-data="{ drawer: false }">

        @livewire('admin.components.navbar')
        @include('livewire.admin.components.drawer')


       <div class="px-5 mt-10" :class="{ 'lg:ml-80 lg:p-5 md:ml-80 md:p-5': drawer }">
            <div class="flex flex-wrap justify-between">
                <div>
                    <h1 class="text-4xl font-bold">Category</h1>
                    <h3 class="mt-3 text-xl font-thin">This is page for manajement category</h3>
                </div>
                <div class="text-sm breadcrumbs">
                    <ul>
                      <li>
                        <a>Home</a>
                      </li>
                      <li>Category</li>
                    </ul>
                  </div>
            </div>

           <div class="mt-10 mb-5">

            <div class="flex flex-wrap justify-between">
                <div>
                   <div class="flex">
                    <input wire:model='search' type="text" class="mb-4 input input-bordered" placeholder="Searching..">
                    <div wire:loading wire:target='search' class="w-12 h-12 ml-5 border-t-2 border-b-2 border-purple-500 rounded-full animate-spin"></div>
                 </div>

                    <select wire:model='rows' class="mb-2 select select-bordered">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                    </select>
                </div>
               <div>
                    @if ($openForm)
                        <button wire:click='$set("openForm", false)' class="btn btn-primary">Back</button>
                    @else
                        <button wire:click='$set("openForm", true)' class="btn btn-primary">Create Category</button>
                    @endif
               </div>
            </div>
                <div class="container h-auto shadow-xl">
                    <div class="mt-3 overflow-x-auto">
                        @if ($openForm)
                            <div class="p-7">
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Nama Category <span class="text-error">*</span></span>
                                    </label>
                                    <input wire:model='name' type="text" class="input input-bordered @error('name')
                                        input-error
                                    @enderror" placeholder="Masukkan nama category" />
                                    @error('name')
                                        <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-3 mb-2">
                                    <button wire:click='save' wire:loading.remove class="btn btn-primary">Save</button>
                                    <button wire:loading wire:target='save' class="btn btn-primary" disabled>Saving...</button>

                                </div>
                            </div>
                        @else
                            <table class="table w-full rounded-lg table-zebra">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data['data_category'] as $key => $item)
                                        <tr>
                                            <td>{{ $data['data_category']->firstItem() + $key }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->slug }}</td>
                                            <td>
                                                <svg wire:click='delete({{ $item->id }})' role="button" class="text-error" style="width:24px;height:24px" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                                                </svg>
                                            </td>
                                        </tr>
                                    @empty

                                    @endforelse
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
                <div class="justify-center mt-5">
                    {{ $data['data_category']->links() }}
                </div>
           </div>

       </div>

    </div>
</div>
