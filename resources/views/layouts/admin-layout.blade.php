<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
<title>DokanDari</title>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="">
<meta property="og:type" content="">
<meta property="og:url" content="">
<meta property="og:image" content="">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


<style>
    .section{
        min-width: 75vw;
        margin-top: 20px;
    }
</style>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
<link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/> <!--Replace with your tailwind.css once created-->
<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
@livewireScripts
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/theme/favicon.ico')}}">
<link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<link rel="stylesheet" href="{{ mix('css/app.css') }}">

@vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">

    <header>
        <!--Nav-->


        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand pl-10" href="{{ route('admin.dashboard') }}">Admin Home</a>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-gray-400" href="#">link</a>
                </li>
            </ul>

            <div class="d-flex justify-content-end">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="myDropdown" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Hi, {{ Auth::user()->name }}
                        <svg class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="myDropdown">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a class="dropdown-item" href="{{ route('profile.update') }}"><i
                                    class="bi bi-person-fill me-2"></i> Profile</a>
                            <a class="dropdown-item" href="#"><i class="bi bi-gear-fill me-2"></i> Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();"><i
                                    class="bi bi-box-arrow-right me-2"></i> Log Out</a>
                        </form>
                    </div>
                </div>
            </div>
        </nav>






    </header>

    <main>
        <div class="flex flex-col md:flex-row">
            <nav aria-label="alternative nav">
                <div
                    class="bg-gray-800 shadow-xl h-20 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48 content-center">

                    <div
                        class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                        <ul
                            class="list-reset flex flex-column md:flex-col pt-3 md:py-3 px-1 md:px-2  md:text-left">
                            <li class="mr-3 flex-1">
                                <a href="{{route('admin.dashboard')}}"
                                    class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                                    <i class="fas fa-home pr-0 md:pr-3"></i><span
                                        class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Home</span>
                                </a>
                            </li>

                            {{-- DropDown Add --}}
                            <li>
                                <button type="button" aria-controls="dropdown-example"
                                    data-collapse-toggle="dropdown-example">
                            <li class="mr-3 flex-1">
                                <a href="#"
                                    class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                                    <i class="fa fa-envelope pr-0 md:pr-3"></i><span
                                        class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Category</span>
                                </a>
                            </li>
                            </button>
                            <ul id="dropdown-example" class="hidden py-2 space-y-2">
                                <li class="mr-3 flex-1">
                                    <a href="{{ route('admin.category') }}"
                                        class="block py-1 ml-5 md:py-3 pl-1 align-middle text-gray-400 no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">All</a>
                                </li>
                                <li class="mr-3 flex-1">
                                    <a href="{{route('admin.category.add')}}"
                                        class="block py-1 ml-5 md:py-3 pl-1 align-middle text-gray-400 no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">Add
                                        New</a>
                                </li>
                            </ul>
                            </li>

                            <li>
                                <button type="button" aria-controls="dropdown-example2"
                                    data-collapse-toggle="dropdown-example2">
                            <li class="mr-3 flex-1">
                                <a href="#"
                                    class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                                    <i class="fa fa-shopping-cart pr-0 md:pr-3"></i><span
                                        class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Products</span>
                                </a>
                            </li>
                            </button>
                            <ul id="dropdown-example2" class="hidden py-2 space-y-2">
                                <li class="mr-3 flex-1">
                                    <a href="{{ route('admin.products') }}"
                                        class="block py-1 ml-5 md:py-3 pl-1 align-middle text-gray-400 no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">All</a>
                                </li>
                                <li class="mr-3 flex-1">
                                    <a href="{{route('admin.product.add')}}"
                                        class="block py-1 ml-5 md:py-3 pl-1 align-middle text-gray-400 no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">Add
                                        New</a>
                                </li>
                            </ul>
                            </li>


                            <li>
                                <button type="button" aria-controls="dropdown-example3"
                                    data-collapse-toggle="dropdown-example3">
                            <li class="mr-3 flex-1">
                                <a href="#"
                                    class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                                    <i class="fa fa-sliders-h pr-0 md:pr-3"></i><span
                                        class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Slider</span>
                                </a>
                            </li>
                            </button>
                            <ul id="dropdown-example3" class="hidden py-2 space-y-2">
                                <li class="mr-3 flex-1">
                                    <a href="{{ route('admin.slider') }}"
                                        class="block py-1 ml-5 md:py-3 pl-1 align-middle text-gray-400 no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">All</a>
                                </li>
                                <li class="mr-3 flex-1">
                                    <a href="{{route('admin.slide.add')}}"
                                        class="block py-1 ml-5 md:py-3 pl-1 align-middle text-gray-400 no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">Add
                                        New</a>
                                </li>
                            </ul>
                            </li>




                            <li class="mr-3 flex-1">
                                <a href="#"
                                    class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-blue-600">
                                    <i class="fas fa-chart-area pr-0 md:pr-3 text-blue-600"></i><span
                                        class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Analytics</span>
                                </a>
                            </li>
                            <li class="mr-3 flex-1">
                                <a href="#"
                                    class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-red-500">
                                    <i class="fa fa-wallet pr-0 md:pr-3"></i><span
                                        class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Payments</span>
                                </a>
                            </li>
                        </ul>
                    </div>


                </div>
            </nav>
            {{$slot}}
        </div>

    </main>



<script>

    // For expend dropdown
    $(document).ready(function() {
    $('.dropdown-toggle').click(function() {
        var target = $(this).attr('aria-controls');
        $('#' + target).toggleClass('hidden');
    });
    });

    /*Toggle dropdown list*/
    function toggleDD(myDropMenu) {
        document.getElementById(myDropMenu).classList.toggle("invisible");
    }
    /*Filter dropdown options*/
    function filterDD(myDropMenu, myDropMenuSearch) {
        var input, filter, ul, li, a, i;
        input = document.getElementById(myDropMenuSearch);
        filter = input.value.toUpperCase();
        div = document.getElementById(myDropMenu);
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }
    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
            var dropdowns = document.getElementsByClassName("dropdownlist");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (!openDropdown.classList.contains('invisible')) {
                    openDropdown.classList.add('invisible');
                }
            }
        }
    }
</script>
<script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
@livewireStyles
<script>
    Livewire.onLoad(function() {
        Livewire.hook('afterDomUpdate', () => {
            Livewire.rescan();
        });
    });
</script>
    <!-- Vendor JS-->
<script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/slick.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.syotimer.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/wow.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/js/plugins/magnific-popup.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/waypoints.js') }}"></script>
<script src="{{ asset('assets/js/plugins/counterup.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/images-loaded.js') }}"></script>
<script src="{{ asset('assets/js/plugins/isotope.js') }}"></script>
<script src="{{ asset('assets/js/plugins/scrollup.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.vticker-min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.theia.sticky.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.elevatezoom.js') }}"></script>
<!-- Template  JS -->
<script src="{{ asset('assets/js/main.js?v=3.3') }}"></script>
<script src="{{ asset('assets/js/shop.js?v=3.3') }}"></script>
@livewireScripts
@stack('scripts')
</body>

</html>
