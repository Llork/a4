<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title', 'Design15')
    </title>
    <meta charset='utf-8'>
    <link href="css/styles.css" type='text/css' rel='stylesheet'>
    @stack('head')
</head>
<body>
    <div id='content'>
        @if(Session::get('message') != null)
            <div class='message'>{{ Session::get('message') }}</div>
        @endif
        <header>
            <a href='/'><img id="logo" src='/images/design15_logo.png' alt='Design15 logo'></a>
        </header>
        <section>
            @yield('content')
        </section>
        <footer>
        </footer>
    </div>
    @stack('body')
</body>
</html>
