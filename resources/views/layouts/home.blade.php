<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')

    <!-- Fontawesome ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php $setting = App\Models\Setting::find(1); ?>
    <nav class="navbar navbar-expand-md navbar-light bg-light" aria-label="Fourth navbar example">
        <div class="container-fluid px-md-4 px-lg-5">
            <a class="navbar-brand" href="/">{{$setting->title}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">হোম</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/course">কোর্স</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/road-sign">রোড সাইন</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/notice">নোটিশ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/youtube">Youtube</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">যোগাযোগ</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login">লগইন</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">রেজিস্ট্রেশন</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">লগ আউট</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">প্রোফাইল</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                            <li><a class="dropdown-item" href="/my-course">আমার কোর্স</a></li>
                            <li><a class="dropdown-item" href="/certificate">সার্টিফিকেট</a></li>
                            <li><a class="dropdown-item" href="/profile">আপডেট প্রোফাইল</a></li>
                        </ul>
                    </li>
                    
                    @endguest

                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="bg-black text-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-4">
                    <h1 class="text-info">{{$setting->title}}</h1>
                    <p>{{$setting->address}}</p>
                    <p class="mb-1">ফোন: {{$setting->phone}}</p>
                    <p class="mb-1">মেইল: {{$setting->email}}</p>
                </div>
                <div class="col-md-4">
                    <a href="/contact" class="nav-link ps-0 text-light">যোগাযোগ</a>
                    <a href="/terms" class="nav-link ps-0 text-light">শর্তাবলী</a>
                    <a href="/privacy" class="nav-link ps-0 text-light">গোপনীয়তা নীতি</a>
                    <a href="/return" class="nav-link ps-0 text-light">রিটার্ন পলিসি</a>
                </div>
                <div class="col-md-4">
                    <a href="{{$setting->facebook}}" class="social-link"><i class="fa fa-facebook-square"></i></a>
                    <a href="{{$setting->twitter}}" class="social-link"><i class="fa fa-twitter"></i></a>
                    <a href="{{$setting->instagram}}" class="social-link"><i class="fa fa-instagram"></i></a>
                    <a href="{{$setting->youtube}}" class="social-link"><i class="fa fa-youtube"></i></a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 text-center text-md-start"><p>{{$setting->title}} &copy; 2020</p></div>
                <div class="col-md-6 text-center text-md-end"><p>Powerd By Web Design BD</p></div>
            </div>
        </div>
    </footer>
    <script src="/js/app.js"></script>

    <a href="https://wa.me/{{$setting->whatsapp}}" target="_blank" class="wa-style">
      <i class="fa fa-whatsapp"></i>
    </a>

    @yield('script')

    
</body>
</html>