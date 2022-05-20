//const { data } = require("autoprefixer");

$(function(){
    
})
$(document).ready(function(){
    // var step = 1;
    // $('.next-button').click(function(){
    //     var parent = $(this).parent().parent();
    //     var next = $(this).parent().parent().next();

    //     $(parent).removeClass('active');
    //     $(next).addClass('active');
    //     step++;
    //     $('.steps-container').attr('finish', step);
    //     $('.steps-container #step' + step).addClass('active');
    //     $('.step-text').hide();
    //     $('#stepText' + step).show();
        
    //       $('.previous-button').click(function(){
    //     var parent = $(this).parent().parent();
    //     var previous = $(this).parent().parent().prev();
    //     $(parent).removeClass('active');
    //     $(previous).addClass('active');
    //     step--;
       
    //     $('.steps-container').attr('finish', step);
    //     $('.steps-container #step' + step).addClass('active');
    //     $('.step-text').hide();
    //     $('#stepText' + step).show();
    // })
    // })
    jQuery(document).ready(function() {
    // click on next button
    jQuery('.form-wizard-next-btn').click(function() {
        var parentFieldset = jQuery(this).parents('.wizard-fieldset');
        var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
        var next = jQuery(this);
        var nextWizardStep = true;
        parentFieldset.find('.wizard-required').each(function(){
            var thisValue = jQuery(this).val();

            if( thisValue == "") {
                jQuery(this).siblings(".wizard-form-error").slideDown();
                nextWizardStep = false;
            }
            else {
                jQuery(this).siblings(".wizard-form-error").slideUp();
            }
        });
        data = {}
        parentFieldset.find('input, select').each(function(){
            var thisValue = ""
            let name = $(this).attr('name');
            if ( $(this).attr('type') == 'radio') {
                if ($(this).is(":checked")) {
                    thisValue = jQuery(this).val();
                    data[name] = thisValue;
                }                
            } else {
                thisValue = jQuery(this).val();
                data[name] = thisValue;
            }  
            
        });
        step = $(this).data('step')
        data['step'] = step
        $('.alert-danger').addClass('hide');
         $.ajax({
            type: "POST",
            url: registerValidateURL,
            data: data,
            success: function(response){
                if( nextWizardStep) {
                    next.parents('.wizard-fieldset').removeClass("show","400");
                    currentActiveStep.removeClass('active').addClass('activated').next().addClass('active',"400");
                    next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show","400");
                    jQuery(document).find('.wizard-fieldset').each(function(){
                        if(jQuery(this).hasClass('show')){
                            var formAtrr = jQuery(this).attr('data-tab-content');
                            jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
                                if(jQuery(this).attr('data-attr') == formAtrr){
                                    jQuery(this).addClass('active');
                                    var innerWidth = jQuery(this).innerWidth();
                                    var position = jQuery(this).position();
                                    jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
                                }else{
                                    jQuery(this).removeClass('active');
                                }
                            });
                        }
                    });
                }
            }

        }).fail(function(jqXHR, textStatus, errorThrown) {
            var errorMessagesLsit = '';
            var data = jqXHR.responseJSON;
            errors = [];
            if (data.errors instanceof Object || data.errors instanceof Array) {
                console.log(data.errors)
              for (var i in data.errors) {
                $('#error_'+i).html(data.errors[i])
               /*  errorMessagesLsit += '<li>';
                errorMessagesLsit += data.errors[i].join('<br />');
                errorMessagesLsit += '</li>'; */
              }
            } else {
              errorMessagesLsit += '<li>';
              errorMessagesLsit += data.errors;
              errorMessagesLsit += '</li>';
            }
   
          /*   $('.alert-danger').removeClass('hide'); */
            $('.alert-danger ul').html(errorMessagesLsit);
          });
        
    });
    //click on previous button
    jQuery('.form-wizard-previous-btn').click(function() {
        var counter = parseInt(jQuery(".wizard-counter").text());;
        var prev =jQuery(this);
        var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
        prev.parents('.wizard-fieldset').removeClass("show","400");
        prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show","400");
        currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active',"400");
        jQuery(document).find('.wizard-fieldset').each(function(){
            if(jQuery(this).hasClass('show')){
                var formAtrr = jQuery(this).attr('data-tab-content');
                jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
                    if(jQuery(this).attr('data-attr') == formAtrr){
                        jQuery(this).addClass('active');
                        var innerWidth = jQuery(this).innerWidth();
                        var position = jQuery(this).position();
                        jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
                    }else{
                        jQuery(this).removeClass('active');
                    }
                });
            }
        });
    });
    //click on form submit button
    jQuery(document).on("click",".form-wizard .form-wizard-submit" , function(){
        var parentFieldset = jQuery(this).parents('.wizard-fieldset');
        var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
        parentFieldset.find('.wizard-required').each(function() {
            var thisValue = jQuery(this).val();
            if( thisValue == "" ) {
                jQuery(this).siblings(".wizard-form-error").slideDown();
            }
            else {
                jQuery(this).siblings(".wizard-form-error").slideUp();
            }
        });
    });
    // focus on input field check empty or not
    jQuery(".form-control").on('focus', function(){
        var tmpThis = jQuery(this).val();
        if(tmpThis == '' ) {
            jQuery(this).parent().addClass("focus-input");
        }
        else if(tmpThis !='' ){
            jQuery(this).parent().addClass("focus-input");
        }
    }).on('blur', function(){
        var tmpThis = jQuery(this).val();
        if(tmpThis == '' ) {
            jQuery(this).parent().removeClass("focus-input");
            jQuery(this).siblings('.wizard-form-error').slideDown("3000");
        }
        else if(tmpThis !='' ){
            jQuery(this).parent().addClass("focus-input");
            jQuery(this).siblings('.wizard-form-error').slideUp("3000");
        }
    });
});

$('#brand_name').keyup(function(){
    console.log($(this).val());
});
var swiper = new Swiper(".mySwiper", {
       
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
        820: {
          mousewheel: true,
          keyboard: true,
          slidesPerView: 1,
          spaceBetween: 24,
          allowSlidePrev: true,
          allowSlideNext: true
        },
        900: {
          mousewheel: true,
          keyboard: true,
           slidesPerView: 3,
        spaceBetween: 30,
        slidesPerGroup: 3,
          allowSlidePrev: true,
          allowSlideNext: true
        }
    },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
   
     
   // $('#sellersButton').click(function (){
   //   $('.rowBtn1').show();
   //   $('.rowBtn2').hide();
   //   $('#sellersButton').css('border','2px solid #51cbb0','color','#51cbb0','border-radius','5px');
   //   $('#buyersButton').css('border','1px solid #000','color','#000','border-radius','5px');

   //   });

   //   $('#buyersButton').click(function (){
   //      $('.rowBtn2').show();
   //      $('.rowBtn1').hide();
   //      $('#buyersButton').css('border','2px solid #51cbb0','color','#51cbb0','border-radius','5px');
   //      $('#sellersButton').css('border','1px solid #000','color','#000','border-radius','5px');
   //      });

        $('#beforeButton').click(function (){
            $('.rowBtn1').show();
            $('.rowBtn2').hide();
            $('#beforeButton').addClass("active");
            $('#afterButton').removeClass("active");
       
            });
       
            $('#afterButton').click(function (){
               $('.rowBtn2').show();
               $('.rowBtn1').hide();
               $('#afterButton').addClass("active");
               $('#beforeButton').removeClass("active");
               });

               $('#learn').click(function (){
                $('.learn').show();
                $('#learn').hide();
                $('#less').show();
                });

                $('#less').click(function (){
                    $('.learn').hide();
                    $('#learn').show();
                    $('#less').hide();
                    });
    


    
    $('#signupForm').submit(function(ev){
        var data = $('#signupForm').serialize();
        $.ajax({
           type: "POST",
           url: window.location.pathname,
           data: data, // serializes the form's elements.
           success: function(data)
           {
                $('.steps-container').attr('finish', 5);
                $('.steps-container #step4').addClass('active');
                $('.step-text').hide();
                $('#stepText5').show();
           },
           error: function(data){
               $('.step-form-4').removeClass('active');
               $('.step-form-5').addClass('active');
               $('.steps-container').attr('finish', 5);
                $('.steps-container #step4').addClass('active');
                $('.step-text').hide();
                $('#stepText5').show();
           }
         });
        ev.preventDefault();
        ev.stopPropagation();
    });

});
(function ($) {
    var swiper = null;
    var oldHtml = null;


    function checkOnMobile() {

        var width = window.innerWidth;
        if (width <= 769) {
            if (!$('.slider').hasClass('swiper-container-initialized')) {

                oldHtml = $('.slider').html();

                swiper = new Swiper('.slider', {
                    slideClass: 'item',
                    loop: true,
                    slidesPerView: 'auto',
                    parallax: true,
                    wrapperClass: 'top-articles',
                    pagination: {
                        el: '.dots',
                        type: 'bullets',
                        clickable: true
                    },
                    breakpoints: {
                        // when window width is >= 320px
                        320: {
                            slidesPerView: 1,
                            spaceBetween: 0
                        },
                        768: {
                            slidesPerView: 'auto',
                            spaceBetween: 0
                        }
                    }

                });

            }

        } else {

            if ($('.slider').hasClass('swiper-container-initialized')) {
                console.log('Done Remove');
                $('.slider').attr('class', 'slider');
                $('.slider').html(oldHtml);
                $('.slider img[lazy-src]').each(function (i, item) {
                    var url = $(item).attr('lazy-src');
                    $(item).removeAttr('lazy-src');
                    $(item).attr('src', url);
                });
            }
        }

    }



    $(window).resize(function () {
        checkOnMobile();
    });

    setTimeout(function() {
        checkOnMobile();
        var mostArtilces = new Swiper('.most-section', {
            loop: true,
            wrapperClass: 'articles',
            slideClass: 'article',
            parallax: true,
            slidesPerView: 'auto',
            navigation: {
                nextEl: '.buttons .next',
                prevEl: '.buttons .prev',
            },
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 0
                },
                768: {
                    slidesPerView: 'auto',
                    spaceBetween: 0
                }
            }
        });
    }, 500);
})(jQuery);



