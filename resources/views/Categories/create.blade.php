@extends('index')

@section('content')

     

<div class="mx-auto h-screen lg:w-[85%] xl:w-[65%] 2xl:w-[50%] mt-16">
    <form action="{{route('categories.store')}}"  method="POST" class="flex flex-col gap-6 h-fit">
        @csrf
        @method('POST')
        <h3 class=" text-lg font-semibold text-center text-gray-900 dark:text-white">Create Category</h3>
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category name</label>
            <input type="text" id="name" value="{{old('name')}}" name="name" class="bg-gray-50 outline-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('name')
            <p  class="block  mt-3 mb-2 text-sm font-medium text-red-500">
                {{$message}}
                </p>
            @enderror
        </div>
        <div>
            <label for="description"  class="block mb-2 text-sm font-medium text-gray-900  dark:text-white">Category Description</label>
            <textarea id="description" value="{{old('description')}}" name="description" rows="4" class="block outline-none p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placer-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placer="Leave a comment..."> {{old('description')}} </textarea>
            @error('description')
            <p  class="block  mt-3 mb-2 text-sm font-medium text-red-500">
              {{$message}}
             </p>
            @enderror
    </div>
        
        <button type="submit" class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create Category</button> 
    </form>


</div>

  
  


@endsection