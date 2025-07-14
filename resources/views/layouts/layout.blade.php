<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">
  <x-head >
    <x-slot:title>
      @yield('title', 'Dashboard')
    </x-slot:title>
    <x-slot:head>
      @yield('head')
    </x-slot:head>
  </x-head>

  <body>
    <x-sidebar />

    <main class="dashboard-main">
      <x-navbar />

      @yield('content')

      <x-footer />
    </main>

    <x-script> 
      <x-slot:script>
        @yield('scripts')
      </x-slot:script>
    </x-script>
  </body>
</html>
