<div class="mb-10 -mt-7">
    <div class="mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl">
        <div class="mx-auto">
            <div class="flex flex-wrap">
               @foreach ($data['data_product'] as $item)
                <div class="w-full p-4 sm:w-1/2 md:w-1/2 xl:w-1/3">
                    <div class="block overflow-hidden transition duration-500 transform bg-white rounded-lg shadow-md hover:scale-105 c-card hover:shadow-xl">
                        <figure><img loading="lazy" src="{{ asset('storage/images/products/' . $item->image) }}" alt="" class="w-full h-auto" /></figure>
                        <div class="card-body">
                            <div class="flex justify-between">
                                <a href="{{ route('client.product.detail', [$item->category->slug, $item->slug]) }}" class="card-title hover:opacity-80">
                                    {{ $item->name }}
                                </a>
                                <span class="badge badge-primary">{{ $item->category->name }}</span>
                            </div>
                            <div class="flex flex-wrap gap-3 mb-4">
                                @foreach ($item->tag as $tag)
                                    <a href="{{ $tag->slug }}" role="button" class="badge badge-secondary">#{{ $tag->name }}</a>
                                @endforeach
                            </div>
                            </p>
                                {!! substr($item->description, 0, 100) !!} ...
                            </p>
                            <div class="flex justify-between mt-5">
                                <div class="indicator">
                                    @if ($item->product_detail->discount > 0)
                                        <span class="mb-2 indicator-item indicator-top indicator-end badge badge-success">
                                            Rp. {{ number_format( $item->product_detail->price - ($item->product_detail->price / 100) * $item->product_detail->discount) }}
                                        </span>
                                        <s class="mt-2 text-lg font-bold">Rp. {{ number_format($item->product_detail->price) }}</s>

                                    @else
                                        <span class="mt-2 text-lg font-bold">Rp. {{ number_format($item->product_detail->price) }}</span>
                                    @endif
                                </div>
                                <div class="btn btn-ghost hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
        </div>
    </div>
</div>
