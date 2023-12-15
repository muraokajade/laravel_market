<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-wrap justify-around">
                        @forelse ($recommend_items as $item)
                        <div class="flex flex-col lg:w-1/4 md:w-1/2 p-4 w-full border m-2 rounded-lg shadow-xl">
                            <a href="{{ route('items.detail', $item) }}" class="block relative h-48 rounded overflow-hidden cursor-pointer">
                                <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="{{ asset('storage/' .$item->image) }}">
                            </a>
                            <div class="mt-4">
                                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY:{{$item->category->name}}</h3>
                                <h2 class="text-gray-900 title-font text-lg font-medium">{{ $item->name }}</h2>
                                <p class="mt-1">Price: {{ $item->price }} $</p>
                                <p class="mt-1">Description: {{ $item->description }}</p>
                                <div class="flex items-center">
                                    Status:
                                    @if (empty($item))
                                    <p>売り切れ</p>
                                    @else
                                    <p>出品中</p>
                                    @endif
                                    <form action="{{ route('likes.toggle_like', $item->id) }}" method="POST">
                                        @csrf
                                        @method('patch')
                                        @if ($item->isLikedBy(Auth::user()))
                                        <button type="submit" class="rounded-full w-10 h-10  p-0 border-0 inline-flex items-center justify-center text-red-500 ml-20 ">
                                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24" class="text-red-500">
                                                <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
                                            </svg>
                                        </button>
                                        @else
                                        <button type="submit" class="rounded-full w-10 h-10  p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-20 ">
                                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24" class="text-red-500">
                                                <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
                                            </svg>
                                        </button>
                                        @endif

                                    </form>
                                </div>

                            </div>

                        </div>
                        @empty
                        <p>商品はありません</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>