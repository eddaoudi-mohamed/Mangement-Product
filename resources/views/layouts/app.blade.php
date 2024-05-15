<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body  class="font-sans antialiased">

     @if (session('warrning'))
         
     <div 
     id="modalDialog"
       class="fixed inset-0 opacity-0 z-[999] grid h-screen w-screen place-items-center  ">
       <div 
         class="relative m-4 w-2/5  w-[50%] lg:w-[35%] xl:w-[30%]     2xl:w-[20%] rounded-lg bg-white font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased shadow-2xl bg-[#111827] font-medium  dark:text-white">
        <div class=" flex gap-4 pl-4">
           <div class="mx-auto flex h-12 w-12 mt-5 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
               <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
               </svg>
             </div>
         <div
           class="relative p-4 mt-2 font-sans text-base antialiased font-light leading-relaxed text-blue-gray-500">
           {{session('warrning')}}
         </div>

       </div>


         <div class="flex flex-wrap items-center justify-end p-4 shrink-0 text-blue-gray-500">
           <button
           id="removeModel"
             class="px-6 py-3 cursor-pointer  mr-1 font-sans text-xs font-bold text-green-500 uppercase transition-all rounded-lg middle none center hover:bg-green-500/10 active:bg-green-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
             Ok,thanks
           </button>
           
         </div>
       </div>
     </div>
         
     @endif

  @if (session('success'))
      
     <div 
     id="modalDialog"
       class="fixed inset-0 opacity-0 z-[999] grid h-screen w-screen place-items-center  ">
       <div 
         class="relative m-4 w-2/5  w-[50%] lg:w-[35%] xl:w-[30%]     2xl:w-[20%] rounded-lg bg-white font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased shadow-2xl bg-[#111827] font-medium  dark:text-white">
        <div class=" flex gap-4 pl-4">
           <div class="mx-auto flex h-12 w-12 mt-5 flex-shrink-0 items-center justify-center rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600"  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
             </div>
         <div
           class="relative p-4 font-sans mt-2 text-base antialiased font-light leading-relaxed text-blue-gray-500">
          {{session('success')}}
         </div>

       </div>


         <div class="flex flex-wrap items-center justify-end p-4 shrink-0 text-blue-gray-500">
           <button
           id="removeModel"
             class="px-6 py-3 cursor-pointer  mr-1 font-sans text-xs font-bold text-green-500 uppercase transition-all rounded-lg middle none center hover:bg-green-500/10 active:bg-green-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
             Ok,thanks
           </button>
           
         </div>
       </div>
     </div>
  @endif
     

                {{ $slot }}
         
    </body>
</html>
