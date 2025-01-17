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
  </div>
</div>
