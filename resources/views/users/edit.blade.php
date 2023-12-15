<x-app-layout>
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0 mx-auto">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
            <form action="{{ route('profile.update', $user) }}" method="POST">
                @csrf
                @method('patch')
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <label>名前:</label><br/>
                        <input name="name" value="{{ $user->name }}" class="border"/>
    
                    </div>
                    <div class="mt-8">
                        <label>自己紹介:</label><br/>
                        <textarea class="resize-none h-[100px]" name="profile">{{ $user->profile }}</textarea>
                    </div>
                    <button type="submit" class="mt-4 text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">変更する</button>
                </div>
            </form>
        </div>
</x-app-layout>