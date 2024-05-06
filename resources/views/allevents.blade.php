<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <link rel="stylesheet" href="{{asset('/css/allEvents.css')}}">

</head>
<body>
    @include('header')
    <section class="containerAll">

  

    @if (isset($allEvents))

    @foreach ($allEvents as $item)



        <div >
            

            <div style="position: relative; margin-left: 1em;">
                

                <h1 class="titleAll">{{$item->eventName}}</h1>
                <img class="imgAll" src="{{asset('/uploads/' . $item->eventImg)}}" alt="">
                <p class="descriptionAll">{{$item->eventDescription}}</p>
            </div>


        </div>

 
        
    @endforeach
        
    @endif

</section>
    
</body>
</html>