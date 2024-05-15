@extends('index')

@section('content')
<div class="flex justify-center mx-auto lg:w-[90%] xl:w-[80%] 2xl:w-[70%]  items-center bg-gray-800 mb-2 rounded-lg">
    <nav class="text-sm sm:text-base p-4 md:p-6 lg:p-6 rounded-md shadow-lg">
      <ol class="list-none p-0 inline-flex space-x-2">
        <li class="flex items-center ">
            <svg xmlns="http://www.w3.org/2000/svg" class=" text-gray-50" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-home"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>       <span class="mx-2">/</span>
        </li>
        <li class="flex items-center">
          <a href="{{route('products.index')}}" class="text-gray-50 hover:text-blue-500 transition-colors duration-300">Products</a>
          <span class="mx-2">/</span>
        </li>
        <li class="flex items-center">
          <span class="text-gray-50">Show</span>
        </li>
      </ol>
    </nav>
  </div>

<div class="bg-gray-100 mx-auto lg:w-[90%] xl:w-[80%] 2xl:w-[70%] rounded-lg dark:bg-gray-800 py-8"> 
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                    @if (filter_var($product->image, FILTER_VALIDATE_URL))
                    <img class="w-full h-full object-cover" src="{{$product->image}}" alt="Product Image">
                    
                    @else
                    <img class="w-full h-full object-cover" src="{{Storage::url($product->image)}}" alt="Product Image">
                        
                    @endif
                </div>
                <div class="flex gap-3 mx-2 mb-4 mt-5">

                        <a  href="{{route('products.edite' , $product->id)}}"   class="w-full text-center bg-green-500 dark:bg-green-500 text-white py-3 px-8 rounded-lg font-bold hover:bg-green-700 dark:hover:bg-green-700">
                            Update
                        </a>
                        <a   href="{{route('products.delete' , $product->id)}}" class="w-full text-center bg-red-500 dark:bg-red-500
                         text-gray-800 dark:text-white py-3 px-8 rounded-lg font-bold hover:bg-red-700 dark:hover:bg-red-700">
                           
                    
                            Delete
                        </a>
                </div>
            </div>
            <div class="md:flex-1 px-4">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">{{$product->name}}</h2>
                <h2 class="text-lg font-bold text-gray-800 dark:text-white mb-2">Category : {{$product->category->name}}</h2>
               
                <div class="flex flex-col gap-2 mb-4 mt-4 ">
                    <div class="mr-4 flex flex-row items-center gap-2 ">
                        <span class="font-bold text-gray-700 dark:text-gray-300">Price :</span>
                        <span class="text-gray-600 text-xl text-green-400 font-semibold">{{$product->price}}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" class=" text-white"  height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-dollar-sign"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/><path d="M12 18V6"/></svg> 
                    </div>
                    <div class="mr-4">
                        <span class="font-bold text-gray-700 dark:text-gray-300">Quantity:</span>
                        <span class="text-gray-600 text-xl text-orange-300 font-semibold">{{$product->quantity}}</span>
                    </div>
                    <div>
                        <span class="font-bold text-gray-700 dark:text-gray-300">Status :</span>
                        @if ($product->status == "available")
                        <span class="text-gray-600 text-xl text-green-400 font-semibold">{{$product->status}}</span>
                            
                        @else
                        <span class="text-gray-600 text-xl text-red-500 font-semibold">{{$product->status}}</span>
                            
                        @endif
                    </div>
                </div>
               
               
                <div>
                    <span class="font-bold text-gray-700 dark:text-gray-300">Product Description:</span>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mt-2">
                       {{$product->description}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection