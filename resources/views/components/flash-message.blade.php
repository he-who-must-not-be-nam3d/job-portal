@if(session()->has('message'))
    <div class="fixed top-0 sm:left-1/2 z-20 transform sm:-translate-x-1/2 bg-green-600 text-white px-48 py-3">
        <p>{{session('message')}}</p>
    </div>
@endif
@if(session()->has('deleteMessage'))
    <div class="fixed top-0 sm:left-1/2 z-20 transform sm:-translate-x-1/2  bg-red-600 text-white px-48 py-3">
        <p>{{session('deleteMessage')}}</p>
    </div>
@endif
