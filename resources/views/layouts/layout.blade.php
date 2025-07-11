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
  </body>
</html>
