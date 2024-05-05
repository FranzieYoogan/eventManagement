<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <link rel="stylesheet" href="{{asset('/css/search.css')}}">

</head>
<body>

    @include('header')


    <section class="containerAll">

        <div style="position: relative; display: flex; justify-content: center">

        
<form class="formStyle max-w-md mx-auto" method="POST" action="/dashboard">   
    @csrf
    <label for="serachValue" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="search" id="serachValue" name="searchValue" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for events" required />
        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
</form>

<img class="imgStyle" src="{{asset('/img/events.jpeg')}}" alt="">

        </div>
        @if (isset($eventStuff))
        <div class="containerItems">

            <div class="containerItems2">


          

     

            @foreach ($eventStuff as $item)

                <h1 class="titleEvent">{{$item->eventName}} -  {{$item->eventDate}}</h1>
                <img class="imgEvent" src="{{'/uploads/' . $item->eventImg}}" alt="">
                <p class="about">{{$item->eventDescription}} - {{$item->eventCity}}</p>
                
            @endforeach

            @endif

            @if (isset($error))

           
            <h1>Failed</h1>
           
           
      
        </div>

        </div>
        @endif
 
      

       
        

    </section>

    
    
</body>
</html>