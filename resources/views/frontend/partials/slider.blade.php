
<section id="section-slider" class="fullwidthbanner-container" aria-label="section-slider">
    <div id="revolution-slider">
        <ul>
            @forelse($sliders as $key=>$item)
            <li data-transition="fade" data-slotamount="10" data-masterspeed="200" data-thumb="">
                <!--  BACKGROUND IMAGE -->
                <img src="{{ file_exists(public_path('images/slider/'.$item->image)) ? asset('images/slider/' . $item->image) : asset('images/slider_image.jpg') }}" alt="" />
                <div class="tp-caption big-white sft" data-x="0" data-y="150" data-speed="800" data-start="400" data-easing="easeInOutExpo"
                     data-endspeed="450">
                    {{ $item->caption ?? '' }}
                </div>

                <div class="tp-caption ultra-big-white customin customout start" data-x="0" data-y="center" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:2;scaleY:2;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                     data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.85;scaleY:0.85;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                     data-speed="800" data-start="400" data-easing="easeInOutExpo" data-endspeed="400">
                    {{ $item->title ?? '' }}
                </div>

                <div class="tp-caption sfb" data-x="0" data-y="335" data-speed="400" data-start="800" data-easing="easeInOutExpo">
                    <a href="#" class="btn-slider">{{ $item->button_text }}
                    </a>
                </div>
            </li>
            @empty
                <li data-transition="fade" data-slotamount="10" data-masterspeed="200" data-thumb="">
                    <!--  BACKGROUND IMAGE -->
                    <img src="{{ asset('frontend/images/slider/wide1.jpg') }}" alt="" />
                    <div class="tp-caption big-white sft" data-x="0" data-y="150" data-speed="800" data-start="400" data-easing="easeInOutExpo"
                         data-endspeed="450">
                        Our Expertise For
                    </div>

                    <div class="tp-caption ultra-big-white customin customout start" data-x="0" data-y="center" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:2;scaleY:2;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                         data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.85;scaleY:0.85;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                         data-speed="800" data-start="400" data-easing="easeInOutExpo" data-endspeed="400">
                        Interior Design
                    </div>

                    <div class="tp-caption sfb" data-x="0" data-y="335" data-speed="400" data-start="800" data-easing="easeInOutExpo">
                        <a href="#" class="btn-slider">Our Portfolio
                        </a>
                    </div>
                </li><li data-transition="fade" data-slotamount="10" data-masterspeed="200" data-thumb="">
                    <!--  BACKGROUND IMAGE -->
                    <img src="{{ asset('frontend/images/slider/wide2.jpg') }}" alt="" />
                    <div class="tp-caption big-white sft" data-x="0" data-y="160" data-speed="800" data-start="400" data-easing="easeInOutExpo"
                         data-endspeed="450">
                        Featured Project
                    </div>

                    <div class="tp-caption ultra-big-white customin customout start" data-x="0" data-y="center" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:2;scaleY:2;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                         data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.85;scaleY:0.85;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                         data-speed="800" data-start="400" data-easing="easeInOutExpo" data-endspeed="400">
                        Green Interior
                    </div>

                    <div class="tp-caption sfb" data-x="0" data-y="335" data-speed="400" data-start="800" data-easing="easeInOutExpo">
                        <a href="#" class="btn-slider">Our Portfolio
                        </a>
                    </div>
                </li>

                <li data-transition="fade" data-slotamount="10" data-masterspeed="200" data-thumb="">
                    <!--  BACKGROUND IMAGE -->
                    <img src="{{ asset('frontend/images/slider/wide3.jpg') }}" alt="" />
                    <div class="tp-caption big-white sft" data-x="0" data-y="160" data-speed="800" data-start="400" data-easing="easeInOutExpo"
                         data-endspeed="450">
                        Interior Remodeling To Makes
                    </div>

                    <div class="tp-caption ultra-big-white customin customout start" data-x="0" data-y="center" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:2;scaleY:2;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                         data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.85;scaleY:0.85;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                         data-speed="800" data-start="400" data-easing="easeInOutExpo" data-endspeed="400">
                        Your Life Easier
                    </div>

                    <div class="tp-caption sfb" data-x="0" data-y="335" data-speed="400" data-start="800" data-easing="easeInOutExpo">
                        <a href="#" class="btn-slider">Our Portfolio
                        </a>
                    </div>
                </li>
            @endforelse
        </ul>
    </div>
</section>
