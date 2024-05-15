@extends('index')

@section('content')

<div class="container mt-5 lg:w-[90%] xl:w-[80%] 2xl:w-[70%] mx-auto">
  <div class="relative overflow-x-scroll ">

        <div  class=" flex justify-between items-center  p-5  rounded-lg mt-6 mb-6 text-white bg-gray-700"> 
            <h3 class="text-lg capitalize font-normal" >List of products categories </h3> 
            <a href="{{route('categories.create')}}" class=" bg-blue-500 text-white rounded-xl text-sm  font-semibold text-center px-4 py-3">Create Category</a>
        </div> 

        <table  class=" text-sm text-left w-full rtl:text-right overflow-x-scroll mt-8 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-4">
                    name
                    </th>
                    <th scope="col" class="px-6 py-4 ">
                        description
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class=" min-w-[600px]  overflow-x-scroll">
                @foreach ($categories as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$item->name}}
                        </td>
                        <td class="px-6 py-4 dark:text-gray-400 font-normale text-base ">
                            {{$item->description}}
                        </td>
                        <td class="px-6 py-4  w-10 h-11 text-gray-50 hover:text-red-500"  >
                            <a href="{{route('categories.delete' , $item->id)}}" class="flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>                      
                            </a>
                        </td>
                    </tr>
                @endforeach
            
            </tbody>

        
        </table>
        <div class="bg-white border-b px-4 py-3 dark:bg-gray-800 dark:border-gray-700"> 
            {{$categories->links()}}
        </div>

    </div>
 

</div>


@endsection