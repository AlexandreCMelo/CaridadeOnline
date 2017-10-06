<nav class="navbar navbar-default">

    <div class="container">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

                @foreach ($menuOptions as $option)
                    <li><a href="/">{{ $option }}</a></li>
                @endforeach

        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
    </div>
</nav>