<div>

    @section('css')
        <link rel="stylesheet" href="{{ asset('library/select2/select2.min.css') }}">
    @endsection
    @section('js')
        <script src="{{ asset('library/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('library/select2/select2.min.js') }}"></script>
        <script src="{{ asset('library/ckeditor5/ckeditor.js') }}"></script>
    @endsection

    @section('title')
        Products
    @endsection

    <div class="drawer-content" x-data="{ drawer: false }">

        @livewire('admin.components.navbar')
        @include('livewire.admin.components.drawer')


       <div class="px-5 mt-10" :class="{ 'lg:ml-80 lg:p-5 md:ml-80 md:p-5': drawer }">
            <div class="flex flex-wrap justify-between">
                <div>
                    <h1 class="text-4xl font-bold">Product</h1>
                    <h3 class="mt-3 text-xl font-thin">This is page for manajement product</h3>
                </div>
                <div class="text-sm breadcrumbs">
                    <ul>
                      <li>
                        <a>Home</a>
                      </li>
                      <li>Product</li>
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
                        <button wire:click='$set("openForm", true)' class="btn btn-primary">Create Product <i class="fa fa-tags" aria-hidden="true"></i></button>
                    @endif
               </div>
            </div>
                <div class="container h-auto shadow-xl">
                    <div class="mt-3 overflow-x-auto">
                        @if ($openForm)
                            <div class="p-7">
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Nama Product <span class="text-error">*</span></span>
                                    </label>
                                    <input wire:model='name' type="text" class="input input-bordered @error('name')
                                        input-error
                                    @enderror" placeholder="Masukkan nama product" />
                                    @error('name')
                                        <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                @include('livewire.admin.components.description-input')
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Category <span class="text-error">*</span></span>
                                    </label>
                                    <select wire:model='category' name="category" id="category" class="select select-bordered @error('category')
                                        select-error
                                    @enderror">
                                        <option value="" selected>Pilih</option>
                                        @foreach ($data_category as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                @include('livewire.admin.components.tags-input')
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Stock <span class="text-error">*</span></span>
                                    </label>
                                    <input wire:model='stock' type="number" class="input input-bordered @error('stock')
                                        input-error
                                    @enderror" placeholder="Masukkan jumlah stock" />
                                    @error('stock')
                                        <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Discount</span>
                                    </label>
                                    <select wire:model='discount' class="select select-bordered @error('discount')
                                        select-error
                                    @enderror" name="discount" id="discount">
                                        <option value="" selected>Pilih</option>
                                        @for ($i = 1; $i <= 100; $i++)
                                            <option value="{{ $i }}">{{ $i }}%</option>
                                        @endfor

                                    </select>
                                </div>
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Price <span class="text-error">*</span></span>
                                    </label>
                                    <input wire:model='price' type="number" class="input input-bordered @error('price')
                                        input-error
                                    @enderror" placeholder="Masukkan harga product" />
                                    @error('price')
                                        <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="label">
                                        <span class="label-text">Image <span class="text-error">*</span></span>
                                    </label>
                                    <input wire:model='image' type="file" class="@error('image')
                                        input-error
                                    @enderror"/>
                                    @error('image')
                                        <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-6 mb-2">
                                   @if ($product_id)
                                        <button wire:click='update({{ $product_id }})' wire:loading.remove class="btn btn-primary">Update</button>
                                        <button wire:loading wire:target='save' class="btn btn-primary" disabled>Updating...</button>
                                   @else
                                        <button wire:click='save' wire:loading.remove class="btn btn-primary">Save</button>
                                        <button wire:loading wire:target='save' class="btn btn-primary" disabled>Saving...</button>
                                   @endif
                                </div>
                            </div>
                        @else
                            <table class="table w-full rounded-lg table-zebra">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Stock</th>
                                        <th>Discount</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['data_product'] as $key => $item)
                                        <tr>
                                            <td>{{ $data['data_product']->firstItem() + $key }}</td>
                                            <td>
                                                <img class="w-16 h-16" src="{{ asset('storage/images/products/' . $item->image) }}" alt="" srcset="">
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{!! substr($item->description, 0, 50) !!} ...</td>
                                            <td>{{ $item->product_detail->stock }}</td>
                                            <td>
                                                @if (is_null($item->product_detail->discount))
                                                    0%
                                                @else
                                                    {{ $item->product_detail->discount }}%
                                                @endif
                                            </td>
                                            <td>
                                                Rp. {{ number_format($item->product_detail->price) }}
                                            </td>
                                            <td class="flex gap-3">
                                                <svg wire:click='delete({{ $item->id }})' role="button" class="text-error" style="width:24px;height:24px" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                                                </svg>
                                                <svg role="button" wire:click='edit({{ $item->id }})' class="text-blue-500" style="width:24px;height:24px" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                                </svg>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
                <div class="justify-center mt-5">
                    {{-- {{ $data['data_product']->links() }} --}}
                </div>
           </div>

       </div>

    </div>
</div>
