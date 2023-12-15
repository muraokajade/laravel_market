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
                    <form method="POST" action="{{ route('items.update', $item) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="flex flex-col mx-auto w-96">
                            <label>
                                商品名:
                                <input type="text" name="name" class="w-full" value="{{ $item->name }}">
                            </label>
                            <div class="mt-4">
                                <label>
                                    値段:
                                    <input type="number" name="price" class="w-full" value="{{ $item->price }}">
                                </label>
                            </div>
                            <div class="mt-4">
                                <label>
                                    カテゴリー:
                                    <select name="category_id" class="w-full">
                                        <option value="{{ $category->id }}">{{$category->name}}</option>
                                    </select>
                                </label>

                            </div>
                            <div class="mt-4">
                                <label>
                                    商品詳細:
                                </label>
                                <textarea type="text" name="description" placeholder="商品の詳細を記入してください" class="resize-none w-full">{{ $item->description }}</textarea>

                            </div>
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