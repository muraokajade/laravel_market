<x-app-layout>
    <div class="container px-5 py-24 mx-auto">
        <div class="mx-auto flex flex-wrap">
            @if ($user->image === null)
            <img src="{{ asset('/images/noAvatar.png') }}" />
            @else
            <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{ asset('storage/' . $user->image) }}">
            @endif
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <p class="mt-4 text-xl">ユーザー名:{{$user->name}}</p>
                <p class="mt-4 text-xl">プロフィール:{{ $user->profile }}</p>
                <p class="mt-4 text-xl">出品数:{{ $itemCount }}</p>
                <h1 class="text-3xl">購入履歴</h1>
                @forelse ($purchaseHistory as $item)
                <p class="mt-4">{{ $item->name }}: {{$item->price}}円、出品者{{ $item->user->name }}さん</p>
                @empty
                    <p>まだ購入していません</p>
                @endforelse
                <div class="flex mt-8">
                    <a href="{{ route('profile.edit_image') }}">
                        <button class="flex ml-auto text-white bg-indigo-500 border-0 p-2 focus:outline-none hover:bg-indigo-600 rounded">画像編集</button>
                    </a>
                    <a href="{{ route('profile.edit') }}" class="ml-4">
                        <button class="flex ml-auto text-white bg-indigo-500 border-0 p-2 focus:outline-none hover:bg-indigo-600 rounded">プロフィール編集</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>