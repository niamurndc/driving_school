<section id="useful-link" class="py-5 bg-deep">
    <div class="container">
        <h2 class="text-white text-center mb-4">জরুরী লিংকসমূহ</h2>
        <div class="row">
            @foreach(App\Models\UsefulLink::all() as $link)
            <div class="col-md-4">
                <a href="{{$link->link}}" target="blank" class="text-white useful-link">{{$link->text}}</a>
            </div>
            @endforeach
        </div>
    </div>
</section>