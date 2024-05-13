<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Iko Kazi KE</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="{{asset('js/menu.js')}}"></script>
    @vite('public/css/app.css')
  </head>
  <body class="bg-white dark:bg-black">
    <header class="bg-slate-600 h-36 dark:bg-slate-700 text-white top-0 z-10 sticky sm:relative mb-5">
      <section class="max-w-7xl mx-auto p-4 flex justify-between items-center">
        <div>
          <a href="/"
            ><img src="{{asset('images/iko_kazi_logo.png')}}" alt="Logo" class=" w-1/2 h-auto"
          /></a>
        </div>
        <div>
          <button
            id="hamburger-button"
            class="text-3xl md:hidden cursor-pointer relative w-8 h-8"
          >
            <!-- &#9776; -->
            <div
              class="bg-white w-8 h-1 rounded absolute top-4 -mt-0.5 transition-all duration-500 before:content-[''] before:bg-white before:h-1 before:w-8 before:rounded before:absolute before:-translate-x-4 before:-translate-y-2.5 before:transition-all before:duration-500 after:content-[''] after:bg-white after:h-1 after:w-8 after:rounded after:absolute after:-translate-x-4 after:translate-y-2.5 after:transition-all after:duration-500"
            ></div>
          </button>
          <nav class="hidden md:block space-x-8 text-xl" aria-label="main">
            <ul class="style-none flex">
              @auth
              <li class="mx-4">
                <span class="font-bold text-green-500 uppercase">Welcome {{auth()->user()->name}}</span>
            </li>
          <li class="mx-4">
              <a href="/listings/manage" class="hover:text-pink-600 active:underline"
                >My Jobs
              </a>
          </li>
          <li class="mx-4">
              <a href="/applications" class="hover:text-pink-600 active:underline"
                >My Applications
              </a>
          </li>
          <li class="mx-4">
            <form action="/logout" >
              @csrf
              <button class="hover:text-pink-600 active:underline">Logout</button>
          </form>
        </li>
          @else
              <li class="mx-4">
                  <a href="/login" class="hover:text-pink-600 active:underline">Sign Up</a>
              </li>
            <li class="mx-4">
                <a href="/login" class="hover:text-pink-600 active:underline"
                  >Login
                </a>
            </li>
            @endauth
        </ul>
          </nav>
        </div>
      </section>
      <section
        id="mobile-menu"
        class="absolute top-68 bg-black opacity-85 w-full text-4xl flex-col justify-content-center origin-top animate-open-menu hidden"
      >
        <nav
          class="flex flex-col min-h-screen gap-y-8 items-center py-8"
          aria-label="mobile"
        >
        <ul class="style-none flex flex-col text-center">
          @auth
          <li class="mx-4">
            <span class="font-bold text-green-500 uppercase">
              Welcome {{ strstr(auth()->user()->name, ' ') ? explode(' ', auth()->user()->name)[1] : auth()->user()->name }}
            </span>
        </li>
      <li class="mx-4">
          <a href="/listings/manage" class="hover:text-pink-600 active:underline"
            >Manage Jobs
          </a>
      </li>
      <li class="mx-4">
        <a href="/applications" class="hover:text-pink-600 active:underline"
          >My Applications
        </a>
    </li>
      <li class="mx-4">
        <form action="/logout" >
          @csrf
          <button class="hover:text-pink-600 active:underline">Logout</button>
      </form>
    </li>
      @else
          <li class="mx-4 my-4">
              <a href="/login" class="hover:text-pink-600 active:underline">Sign Up</a>
          </li>
        <li class="mx-4 my-4">
            <a href="/login" class="hover:text-pink-600 active:underline"
              >Login
            </a>
        </li>
        @endauth
    </ul>
        </nav>
      </section>
    </header>
    <main>
      <div class="loader-wrapper" id="loader">
        <div class="loader"></div>
      </div>
        {{-- VIEW OUTPUT --}}
        @yield('content')
    </main>
    <footer id="footer" class="bg-slate-600 dark:bg-slate-700 opacity-85 text-white sticky bottom-0 left-0 h-20 mt-24 items-center flex justify-start font-bold">
        <p class="ml-2 flex">
            Copyright &copy; 2024,<span class="hidden text-green-600 sm:block mx-2">GeekyGeeks Technology</span>  All Rights Reserved
        </p>
        <a href="/listings/create" class="absolute dark:bg-teal-600 py-2 px-3 text-teal-900 dark:text-white hover:bg-green-400 hover:text-white dark:hover:text-white dark:hover:bg-green-700 top-1/3 right-10 bg-white text-white-py-2">Post Job</a>
    </footer>
    <x-flash-message/>
</body>
</html>