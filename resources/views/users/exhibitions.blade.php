<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 relative">
                    <a href="{{ route('items.create')}}" class="bg-indigo-700 text-white p-4 rounded absolute right-1 top-1 translate-y-[-50px]">商品を出品する+</a>
                    <div class="flex flex-wrap justify-around">
                        @forelse ($userItems as $item)
                        <div class="lg:w-1/4 md:w-1/2 p-4 w-full border m-2 rounded-lg shadow-xl">
                            <a href="{{ route('items.show', $item->id) }}" class="block relative h-48 rounded overflow-hidden cursor-pointer">
                                <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="{{ asset('storage/' .$item->image) }}">
                            </a>
                            <div class="mt-4">
                                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY:{{$item->category->name}}</h3>
                                <h2 class="text-gray-900 title-font text-lg font-medium">{{ $item->name }}</h2>
                                <p class="mt-1">Price: {{ $item->price }} $</p>
                                    @if (empty($item))
                                    <p class="mt-4" >Status:売り切れ</p>
                                    @else
                                    <p class="mt-4">Status:出品中</p>
                                    @endif
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