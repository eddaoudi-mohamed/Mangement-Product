@extends('index')

@section('content') 


<div class="flex justify-center mx-auto lg:w-[90%] xl:w-[80%] 2xl:w-[70%] items-center bg-gray-800 mb-2 rounded-lg">
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
        <span class="text-gray-50">Update</span>
      </li>
    </ol>
  </nav>
</div>


<div class="flex justify-center items-center mx-auto lg:w-[90%] xl:w-[80%] 2xl:w-[70%] bg-gray-700 mb-2 rounded-lg">
    <form  method="POST" action="{{ route('products.update' , $product->id) }}" enctype="multipart/form-data" class="container max-w-screen-lg mx-auto ">
        @csrf        
        <div>
        <div class="bg-white rounded  p-4 px-4 md:p-8 mb-6 dark:bg-gray-700 dark:text-white" >
          <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
            <div class="text-gray-600">
                <h2 class="font-semibold text-xl text-gray-300">Form To Update product</h2>
                 <p class=" mt-1 text-sm text-base text-gray-400" >Please fill out all the fields.</p>
            </div>
  
            <div class="lg:col-span-2">
              <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                <div class="md:col-span-5">
                  <label for="name">Product Name</label>

                  <input type="text" name="name" id="name" class="h-10  mt-1 rounded px-4 
                  bg-gray-50 outline-none border border-gray-300 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                  " value="{{$product->name}}" />
                  @error('name')
                  <p  class="block  mt-3 mb-2 text-sm font-medium text-red-500">
                      {{$message}}
                      </p>
                  @enderror
                </div>
  
                <div class="md:col-span-5">
                  <label for="category_id">Select Product Category</label>
                  <select type="text" name="category_id" id="category_id" class="h-10  mt-1 rounded px-4 
                  bg-gray-50 outline-none border border-gray-300 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                  " value="" placeholder="email@domain.com" > 
                  @foreach ($categories as $item)
                      <option value="{{$item->id}}" @if($product->category_id == $item->id) selected @endif >{{$item->name}}</option>
                  @endforeach
                  </select>
                  @error('category_id')
                  <p  class="block  mt-3 mb-2 text-sm font-medium text-red-500">
                      {{$message}}
                      </p>
                  @enderror
                </div>
  
                <div class="md:col-span-3">
                  <label for="quantity">quantity</label>
                  <input type="text" name="quantity" id="quantity" class="h-10  mt-1 rounded px-4 
                  bg-gray-50 outline-none border border-gray-300 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                  " value="{{$product->quantity}}" placeholder="" />
                  @error('quantity')
                  <p  class="block  mt-3 mb-2 text-sm font-medium text-red-500">
                      {{$message}}
                      </p>
                  @enderror
                </div>
  
                <div class="md:col-span-2">
                  <label for="price">Price</label>
                  <input type="text" name="price" id="price" class="h-10  mt-1 rounded px-4 
                  bg-gray-50 outline-none border border-gray-300 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                  " value="{{$product->price}}" placeholder="" />
                  @error('price')
                  <p  class="block  mt-3 mb-2 text-sm font-medium text-red-500">
                      {{$message}}
                      </p>
                  @enderror
                </div>
  
                <div class="md:col-span-5">
                    <label for="description">Product Description</label>
                    <textarea id="description"  name="description" rows="4" class="mt-1 rounded px-4 
                    bg-gray-50 outline-none border border-gray-300 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    " placeholder="Prduct Description...">{{$product->description}}</textarea>
                    @error('description')
                    <p  class="block  mt-3 mb-2 text-sm font-medium text-red-500">
                    {{$message}}
                    </p>
                    @enderror
                </div>
  
            
  
                <div class="md:col-span-5">
                  <label for="soda">Upload Image Product ?</label>
                  <div class="flex items-center justify-center w-full mt-1">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-800 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <input id="dropzone-file"  name="image" type="file" class="hidden" />
                    </label>
                  </div> 
                  @error('image')
                  <p  class="block  mt-3 mb-2 text-sm font-medium text-red-500">
                  {{$message}}
                  </p>
                  @enderror
                </div>
        
                <div class="md:col-span-5 text-right">
                  <div class="inline-flex items-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                  </div>
                </div>
  
              </div>
            </div>
          </div>
        </div>
      </div>
  

    </form>
  </div>  
  
@endsection