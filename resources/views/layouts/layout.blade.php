<<<<<<< HEAD
<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">
  <x-head />

  <body>
    <x-sidebar />

    <main class="dashboard-main">
      <x-navbar />

      @yield('content')

      <x-footer />
    </main>

    <x-script/>
=======
<!DOCTYPE html>
<html class="scroll-smooth overflow-x-hidden" lang="en">
    <x-heads>
        <x-slot:title>
            @yield('title', 'Gamma')
        </x-slot:title>
        <x-slot:head>
            @stack('head')
        </x-slot:head>
    </x-heads>
  <body class="w-screen relative overflow-x-hidden min-h-screen bg-gray-100 scrollbar-hide ecommerce-dashboard-page dark:bg-[#000]">
    <div class="wrapper mx-auto text-gray-900 font-normal grid scrollbar-hide grid-cols-[257px,1fr] grid-rows-[auto,1fr]" id="layout">

        {{-- sidebar --}}
        <x-sidebar />

        {{-- Navbar --}}
        <x-navbar />

        {{-- Main --}}
      <main class="overflow-x-scroll scrollbar-hide flex flex-col justify-between pt-[42px] px-[23px] pb-[28px]">

        {{-- Main Content --}}
        @yield('content')

        {{-- Footer --}}
        <x-footer />
      </main>

    </div>
    <x-scripts>
        <x-slot:script>
            @stack('script')
        </x-slot:script>
    </x-scripts>
>>>>>>> 3297bc6d97ef58cc42acece89cf820f3a43d037b
  </body>
</html>
