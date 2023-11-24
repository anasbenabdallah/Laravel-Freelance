<!DOCTYPE html>
<html>
<head>
    <!-- Other head content here -->

    <style>
        /* Styling for the <li> element */
        .nav-link {
            display: block;
            padding: 10px 15px;
            background-color: #ff6600; /* Change background color to orange */
            color: #fff; /* Text color for the link */
            border-radius: 5px; /* Rounded corners */
            text-align: center;
            text-decoration: none; /* Remove the underline on the link */
        }

        /* Hover effect for the <li> element */
        .nav-link:hover {
            background-color: #ff9900; /* Change background color on hover */
        }

        /* Style the text inside the link */
        .nav-link span {
            font-size: 16px; /* Adjust the font size */
        }

        /* Style the money icon */
        .money-icon::before {
            content: "\0024"; /* Unicode character for dollar sign */
            color: green; /* Make the icon green */
        }
    </style>

</head>
<body>
    <header id="header" id="home">
        <!-- Header content here -->
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt="" title="" /></a>
                </div>
                <li><span class="user-role" style="font-size: 30px; color: green;">{{ auth()->user()->roles->first()->title ?? 'No Role' }}</span></li>

                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="{{ route('home') }}">Home</a></li>
                        @auth
                            @if(auth()->user()->roles->first()->title === 'Client')
                                <li>
                                    <a href="{{ route('facture.index') }}" class="nav-link">
                                        <span class="money-icon"></span> <span style="color: black; font-weight: bold;">Facture</span>
                                    </a>
                                </li>
                            @endif
                                <li>
                                    <a href="{{ route('blogs.index') }}" class="nav-link">
                                        <span class="fa-fw fas fa-clipboard nav-icon"></span> <span style="color: black; font-weight: bold;">Blogs</span>
                                    </a>
                                </li>
                            @if(auth()->user()->roles->first()->title === 'Freelancer')
                                <li>
                                    <a href="{{ route('offres.index') }}" class="nav-link">
                                        <span class="fa-fw fas fa-clipboard nav-icon"></span> <span style="color: black; font-weight: bold;">Offre</span>
                                    </a>
                                </li>
                            @endif
                            @if(auth()->user()->roles->first()->title === 'Freelancer')
                                <li>
                                    <a href="{{ route('contrats.index') }}" class="nav-link">
                                        <span class="fa-fw fas fa-clipboard nav-icon"></span> <span style="color: black; font-weight: bold;">Contrat</span>
                                    </a>
                                </li>
                            @endif
                            @if(auth()->user()->roles->first()->title === 'Client')
                            <li>
                                <a href="{{ route('projects.index') }}" class="nav-link">
                                    <span class="fa-fw fas fa-clipboard nav-icon"></span> <span style="color: black; font-weight: bold;">Projects</span>
                                </a>
                            </li>
                        @endif
                            @if(auth()->user()->roles->first()->title === 'Client')
                                <li>
                                    <a href="{{ route('offresclient.index') }}" class="nav-link">
                                        <span class="fa-fw fas fa-clipboard nav-icon"></span> <span style="color: black; font-weight: bold;">Offer</span>
                                    </a>
                                </li>
                            @endif

                            @if(auth()->user()->roles->first()->title === 'Client')
                                <li>
                                    <a href="{{ route('contratsclient.index') }}" class="nav-link">
                                        <span class="fa-fw fas fa-clipboard nav-icon"></span> <span style="color: black; font-weight: bold;">Contracts</span>
                                    </a>
                                </li>
                            @endif

                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endauth
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- Rest of the HTML content -->
</body>
</html>
