<x-app-layout>
    <div class="container px-5 py-24 mx-auto">
        @if($errors->any())
        <div class="alert alert-danger mb-8">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="lg:w-4/5 mx-auto flex flex-wrap">
            @if ($user->image === null)
            <span>現在の画像</span><img src="{{ asset('/images/noAvatar.png') }}" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" />
            @else
            <span>現在の画像</span><img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{ asset('storage/' . $user->image) }}">
            @endif
            <form enctype="multipart/form-data" action="{{ route('profile.update_image', $user) }}" method="POST">
                @csrf
                @method('patch')
                <input type="file" name="image" />
                <button type="submit" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">変更する</button>
            </form>
        </div>
    </div>
</x-app-layout>