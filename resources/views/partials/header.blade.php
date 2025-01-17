<div class="bg-blue-700">
  <div class="max-w-[85rem] px-4 py-4 sm:px-6 lg:px-8 mx-auto flex justify-between items-center">
    <!-- Form to Reset Customer Selection -->
    <form action="{{ route('reset.customer') }}" method="POST" class="inline-flex">
      @csrf
      <button type="submit" class="inline-flex items-center bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-full shadow-md">
        <svg class="shrink-0 w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        Select Another Customer
      </button>
    </form>

    <!-- Selected Customer Name -->
    @if(session()->has('selected_customer'))
      <p class="text-white text-lg font-bold">{{ session('selected_customer.name') }}</p>
    @else
      <p class="text-white text-lg font-bold">No Customer Selected</p>
    @endif

    <div class="flex items-center gap-2">
      <!-- Logout Button -->
      <form action="{{ route('promoter.logout') }}" method="POST" class="inline-flex">
        @csrf
        <button type="submit" class="group inline-flex flex-wrap items-center bg-white/10 hover:bg-white/10 focus:outline-none focus:bg-white/10 border border-white/10 p-1 ps-4 rounded-full shadow-md">
          <p class="me-2 text-white text-sm">
            Logout
          </p>
          <span class="group-hover:bg-white/10 group-focus:bg-white/10 py-1.5 px-2.5 inline-flex justify-center items-center gap-x-2 rounded-full bg-white/10 font-semibold text-white text-sm">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="m9 18 6-6-6-6" />
            </svg>
          </span>
        </button>
      </form>

      <!-- Refresh Button -->
      <button onclick="location.reload();"
        class="inline-flex items-center justify-center w-10 h-10 bg-white/10 hover:bg-white/20 text-white rounded-full shadow-md">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 ml-1" viewBox="0 0 489.645 489.645">
          <path
            d="M460.656,132.911c-58.7-122.1-212.2-166.5-331.8-104.1c-9.4,5.2-13.5,16.6-8.3,27c5.2,9.4,16.6,13.5,27,8.3   c99.9-52,227.4-14.9,276.7,86.3c65.4,134.3-19,236.7-87.4,274.6c-93.1,51.7-211.2,17.4-267.6-70.7l69.3,14.5   c10.4,2.1,21.8-4.2,23.9-15.6c2.1-10.4-4.2-21.8-15.6-23.9l-122.8-25c-20.6-2-25,16.6-23.9,22.9l15.6,123.8   c1,10.4,9.4,17.7,19.8,17.7c12.8,0,20.8-12.5,19.8-23.9l-6-50.5c57.4,70.8,170.3,131.2,307.4,68.2   C414.856,432.511,548.256,314.811,460.656,132.911z" />
        </svg>
      </button>


    </div>
  </div>
</div>
