<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 mx-auto">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('items.update_image', $item) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="flex flex-col mx-auto w-96">
                            <div>
                                現在の画像:
                                <img src="{{ asset('storage/' . $item->image) }}" />
                            </div>
                            <label>
                                画像:
                                <input type="file" name="image">
                            </label>
                            <div class="mt-4 mx-auto">
                                <input type="submit" value="更新する" class="bg-green-700 text-white p-2 font-bold cursor-pointer shadow-xl rounded">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>