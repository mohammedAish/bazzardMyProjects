<x-ecommerce-layout>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{route('home')}}"><i class="fa fa-home"></i> {{__('home.home')}}</a>
                        <span>{{__('home.about_us')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__content">
                        <div class="contact__address">
                            <div class="col-lg-4 col-sm-12">
                                <div class="contact-info-left">
                                    <h4>{{__('home.contact_info')}}</h4>
                                    <p>   {!! $page->desc !!} </p>
                                </div>
                            </div>
                        </div>
                        <div class="contact__form">
                            <h5>{{__('home.send_message')}}</h5>
                            <form method="post" id="contactForm" action="{{route('ecommerce_contactus.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="{{__('home.name')}}" required data-error="Please enter your name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="{{__('home.email')}}" id="email" class="form-control" name="email" required data-error="Please enter your email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="subject" name="Subject" placeholder="{{__('home.subject')}}" required data-error="Please enter your Subject">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" id="message" name="message" placeholder="{{__('home.message')}}" rows="4" data-error="Write your message" required></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="submit-button text-center">
                                            <button class="btn hvr-hover btn btn-info" id="submit" type="submit">{{__('home.send_message')}}</button>
                                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__map">
                    @if($page->image)
                <img src="{{asset('img/'.$page->image)}}" width="500" height="700">
                @else
                <img src="{{asset('assets/images/home_2.gif')}}" width="500" height="500">
                @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->
</x-ecommerce-layout>
