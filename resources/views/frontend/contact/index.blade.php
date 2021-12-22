@extends('frontend.master')
@section('title', 'Contact Us')
@section('content')

    <!-- revolution slider begin -->
    @include('frontend.partials.banner')
    @include('frontend.partials.message')

    <!-- revolution slider close -->
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3>Send Us Message</h3>
                    <form name="contactForm" id='contact_form' method="post" action='{{ route('contact_store') }}' enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div id='name_error' class='error'>Please enter your name .</div>
                                <div>
                                    <input type='text' name='name' id='name' class="form-control" placeholder="Your Name">
                                </div>
                                <div>
                                    <input type='email' name='email' id='email' class="form-control" placeholder="Your Email">
                                </div>
                                <div>
                                    <input type='number' min="0" name='phone' id='phone' class="form-control" placeholder="Your Phone">
                                </div>
                                <div>
                                    <label for="attached">Select files ( If You have any ) :</label>
                                    <input type='file' name='attached' id='attached' class="form-control" multiple>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div>
                                    <textarea name='message' id='message' class="form-control" rows="10" placeholder="Your Message"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12 pt-2">
                                <button type="submit" class="btn btn-sm btn-line w-100">
                                    Send
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="sidebar" class="col-md-4">

                    <div class="widget widget_text">
                        <h3>Contact Info</h3>
                        <address>
                            <span>100 S Main St, Los Angeles, CA</span>
                            <span><strong>Phone:</strong>(208) 333 9296</span>
                            <span><strong>Fax:</strong>(208) 333 9298</span>
                            <span><strong>Email:</strong><a href="mailto:contact@example.com">contact@example.com</a></span>
                            <span><strong>Web:</strong><a href="#test">http://example.com</a></span>
                            <span><strong>Open</strong>Sunday - Friday 08:00 - 18:00</span>
                        </address>
                    </div>
                </div>
            </div>
        </div>
        <section id="de-map" aria-label="map-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="map-container map-fullwidth img-rounded">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3305.7152203584424!2d-118.2453181849353!3d34.05117548060617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c648d9808fbd%3A0xb79dfbc6ae338c12!2s100%20S%20Main%20St%2C%20Los%20Angeles%2C%20CA%2090012%2C%20USA!5e0!3m2!1sen!2sid!4v1592143290578!5m2!1sen!2sid"
                                width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                                tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
