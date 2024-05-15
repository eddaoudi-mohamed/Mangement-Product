@extends('index')

@section('content') 
<div class="w-[90%] lg:w-[85%] xl:w-[80%] 2xl:w-[70%] mx-auto">
    <h2 class="text-4xl font-extrabold dark:text-white py-4 mb-4 uppercase">History App </h2>
    <div class="flex flex-col w-full gap-3 "> 
    @foreach ($histories as $date => $records)
        <div href="#" class=" p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$date}}</h5>
            @foreach($records as $record)
                <div class="font-normal flex items-center   gap-8 pt-3  text-gray-700 dark:text-gray-400">
                    <input  id="disabled-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">     
                    <p class="font-normal  text-gray-700 dark:text-gray-400">{{ $record->created_at->format('H : i') }}</p>
                    @if ($record->action_name == 'Create')
                        <svg xmlns="http://www.w3.org/2000/svg" width="19"  height="22" class=""  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                       
                        <p id="helper-checkbox-text" class="text-md font-normal text-gray-500 dark:text-gray-300">A new {{$record->table_name}} named {{$record->item_name}} was created.</p>              
                    @endif
                    @if($record->action_name == 'Search')
                      <svg xmlns="http://www.w3.org/2000/svg" width="19" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search-check"><path d="m8 11 2 2 4-4"/><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                      <p id="helper-checkbox-text" class="text-md font-normal text-gray-500 dark:text-gray-300">Search To: "{{ $record->item_name }}" in the products table.</p>              
                    @endif

                    @if($record->action_name == 'Update')
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                    <p id="helper-checkbox-text" class="text-md font-normal text-gray-500 dark:text-gray-300">The product named {{ $record->item_name }} was updated.</p>              
                    @endif

                    @if($record->action_name == 'Delete')
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-x"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="m14.5 12.5-5 5"/><path d="m9.5 12.5 5 5"/></svg>
                    <p id="helper-checkbox-text" class="text-md font-normal text-gray-500 dark:text-gray-300">The {{$record->table_name}}  named {{ $record->item_name }} was Deleted.</p>              
                    @endif

                </div>
          @endforeach

        </div>
    @endforeach

</div>
</div>

@endsection

