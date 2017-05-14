<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title', 'Design15')
    </title>
    <meta charset='utf-8'>
    <link href="/css/styles.css" type='text/css' rel='stylesheet'>
    @stack('head')
</head>
<body>
    <div id='content'>
        <header>
            <a href='/'><img alt='Welcome to Design15.com' id="logo" src='/images/design15_logo.png' alt='Design15 logo'></a>
        </header>
        <nav>
          <a class="nav" href="/">Home</a> |
          <a class="nav" href="/new">Add Synchronicity</a> |
          <a class="nav" href="/dictionaries">View Dictionaries</a> |
          <a class="nav" href="/new_dictionary">Add Dictionary</a>
        </nav>
        <section>
            @yield('content')
        </section>
        <footer>
        </footer>
    </div>
    @stack('body')
</body>
</html>
