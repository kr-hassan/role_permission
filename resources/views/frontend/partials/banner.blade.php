
<section id="subheader" data-speed="8" data-type="background">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $page ?? '' }}</h1>
                <ul class="crumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="sep">/</li>
                    <li>{{ $page ?? '' }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>
