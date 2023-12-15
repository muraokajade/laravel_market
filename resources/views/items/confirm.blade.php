<x-app-layout>
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-4/5 mx-auto flex flex-wrap">
            <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{ asset('storage/' . $item->image) }}">
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <h2 class="title-font text-gray-500 tracking-widest">商品名</h2>
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$item->name}}</h1>
                <p class="mb-4 leading-relaxed">説明:{{ $item->description }}</p>
                <p class="mb-4">カテゴリー:{{$category->name}}</p>

                <p class="mb-4">値段:{{$item->price}}円</p>

                <form action="{{ route('items.finish', $item) }}" method="POST">
                    @csrf
                    <button type="submit" class="mt-8 bg-green-700 text-white rounded p-4">内容を確認し購入する</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>