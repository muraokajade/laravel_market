<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-wrap justify-around">
                        @forelse ($like_items as $item)
                        <div class="flex flex-col lg:w-1/4 md:w-1/2 p-4 w-full border m-2 rounded-lg shadow-xl">
                            <a href="{{ route('items.detail', $item) }}" class="block relative h-48 rounded overflow-hidden cursor-pointer">
                                <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="{{ asset('storage/' .$item->image) }}">
                            </a>
                            <div class="mt-4">
                                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY:{{$item->category->name}}</h3>
                                <h2 class="text-gray-900 title-font text-lg font-medium">{{ $item->name }}</h2>
                                <p class="mt-2">Price: {{ $item->price }} $</p>
                                <p class="mt-2">Description: {{ $item->description }}</p>
                                <p class="mt-2"> {{ $item->created_at }}</p>
                                <div class="flex items-center">
                                    Status:
                                    @if (empty($item))
                                    <p>売り切れ</p>
                                    @else
                                    <p>出品中</p>
                                    @endif
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