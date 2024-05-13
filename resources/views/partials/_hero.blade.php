<section id="hero" class="mt-0 text-center mx-auto py-10 flex flex-col justify-center">
    <p class="text-black font-bold dark:text-white text-5xl py-4">Iko Kazi KE</p>
    <p class="text-teal-700 dark:text-teal-400 text-3xl py-4">Find or Post Jobs to find the best Employer/Employee</p>
    @auth
    <a
      class=" sm:flex sm:flex-col justify-center mx-auto items-center border border-solid border-slate-900 dark:border-gray-100 bg-transparent py-2 px-2 text-teal-900 dark:text-white rounded-xl shadow-xl hover:text-white hover:bg-green-400 dark:hover:text-white dark:hover:bg-green-700"
      href="/listings/create"
    >
      Post A  Job
    </a>
    @else
    <a
      class=" sm:flex sm:flex-col justify-center mx-auto items-center border border-solid border-slate-900 dark:border-gray-100 bg-transparent py-2 px-2 text-teal-900 dark:text-white rounded-xl shadow-xl hover:text-white hover:bg-green-400 dark:hover:text-white dark:hover:bg-green-700"
      href="/login"
    >
      Sign Up To Post A  Job
    </a>
    
    @endauth
    
  </section>