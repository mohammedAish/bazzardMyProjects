<x-ecommerce1-layout>

  <!-- Start All Title Box -->
  <div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>{{__('home.Contact us')}}</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('home.home')}}</a></li>
                    <li class="breadcrumb-item active"> {{__('home.Contact us')}} </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Contact Us  -->
<div class="contact-box-main">
    <div class="container">
    @if (app()->getLocale() == 'ar')
        <div class="row text-right">
            @else
            <div class="row text-left">
                @endif
            <div class="col-lg-4 col-sm-12">
                <div class="contact-info-left">
                    <h2>{{__('home.contact_info')}}</h2>
                    <p>   {!!data_get($page, 'desc'.app()->make('db_lang_suffix'))!!} </p>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="contact-form-right">
                    <h2>{{__('home.get_in_touch')}}</h2>
                    <p>{{data_get($page, 'intro'.app()->make('db_lang_suffix'))}}</p>
                    <form method="post" id="contactForm" action="{{route('ecommerce_contactus.store')}}">
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
                                    <button class="btn hvr-hover" id="submit" type="submit">{{__('home.send_message')}}</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Cart -->
</x-ecommerce1-layout>
