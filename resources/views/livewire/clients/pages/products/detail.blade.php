<div>
    @section('title', 'Detail Product')
    @livewire('clients.components.navbar')
    <div class="px-5 py-5 mb-4">
        <div class="product-detail">
            <figure>
                <img loading="lazy" src="{{ asset('storage/images/products/' . $data_product->image) }}" alt="" class="w-full h-full bg-repeat rounded-xl" />
            </figure>
            <h2 class="mt-3 mb-4 text-xl font-bold">{{ $data_product->name }}</h2>
            <h3 class="mt-3 mb-2">Category : <span class="badge badge-primary">{{ $category }}</span></h3>
            <h3>Tags :
                @foreach ($data_product->tag as $tag)
                    <span class="badge badge-info">{{ $tag->name }}</span>
                @endforeach
            </h3>
            <h4 class="mt-5 mb-3 text-md">
                {!! $data_product->description !!}
            </h4>

            <div class="detail-harga">
                @if ($data_product->product_detail->discount > 0)
                    <h1>Lebih hemat <b>{{ $data_product->product_detail->discount }}%</b></h1>
                    Total Harga : <strong>
                        Rp. <s class="text-red-500">{{ number_format($data_product->product_detail->price) }}</s>
                        <span class="text-green-500">
                            {{ number_format( $data_product->product_detail->price - ($data_product->product_detail->price / 100) * $data_product->product_detail->discount) }}
                        </span>
                    </strong>
                @else
                    Total Harga : <span class="text-green-500">{{ number_format($data_product->product_detail->price) }}</span>
                @endif
            </div>
            <div class="mt-10 mb-2">
                <button class="btn btn-primary">Add to Cart</button>
            </div>
        </div>
    </div>
    @include('livewire.clients.components.footer')
</div>
