$(document).ready(function() {
    // $(window).scroll(function() {
    //     if ($(this).scrollTop() > 40) {
    //         $("#scroll-top").fadeIn();
    //     } else {
    //         $('#scroll-top').fadeOut();
    //     }
    // });
    // $("#scroll-top").click(function() {
    //     $('html,body').animate({
    //         scrollTop: 0
    //     }, 800);
    // });
    $('.navbar-nav li a').on('click', function(e) {
        var href_val = $(this).attr('href');
        // e.preventDefault();

        if (href_val == '#blog') {
            window.open('/blog');
        } else if (href_val == '#recipes') {
            window.location.href = '/recipes';
        }
    });

    var scrollLink = $('.own-scroll-abt');
    scrollLink.click(function(e) {
        e.preventDefault();
        $('body,html').animate({
            scrollTop: $(this.hash).offset().top
        }, 1000);
    });
    $('.more-info').on('click', function() {
        var infoId = $(this).data('id');
        infoId = parseInt(infoId);
        $.ajax({
            type: 'get',
            url: '/membership_info.json?v=1',
            dataType: 'json',
            success: function(response) {
                $.each(response, function() {
                    var infoTitle = response.memInfo[infoId].modalTitle;
                    var introPara = response.memInfo[infoId].intro_para;
                    var descPara = response.memInfo[infoId].desc_para;
                    
                    $('#mem-info').find('.modal-title').text(infoTitle);
                    $('#mem-info').find('.intro-para').text(introPara);
                    $('#mem-info').find('.desc-para').text(descPara);
                    
                });
            },
            error: function(response) {
                alert("Data Not found!");
            }
        });
    });
    $(".succ-wrap .succ-item .succ-img, .succ-wrap .succ-item .succ-img-info").hover(function() {
        $(this).parent().find('.succ-img-info').addClass('show');
        $(this).parent().find('.read_more').show();
    }, function() {
        $(this).parent().find('.succ-img-info').removeClass('show');
        $(this).parent().find('.read_more').hide();
    });


    //Recipes Page
    $('body').on('change','.radio-btns-wrap .filter',function(){
        var target = $(this).val();

        $('.recipes-video-wrap .video-item').each(function() {
            if ( $(this).hasClass(target) ) {
                $(this).show(200);
            }else {
                $(this).hide(200);
            }
        });
    });
    //recipe search
    $('body').on('keyup','input[name="recipe_search"]',function(){

        //css
        $('.rvw-parent').addClass('stack');

        $.ajax({
            type: 'GET',
            url: 'ajax/autocomplete?q='+$(this).val(),
            success: function(data) {
                var suggest='';
                $.each(data.success,function (k,v) {
                    suggest+='<li data-id="'+k+'" class="suggestions">'+v+'</li>';
                })

                if (data.count!=0) {
                  $('.ftco-explore .suggestions-list').html(suggest).show(200);
                }
                else {
                  $('.suggestions-list').hide();
                }
            },
            error: function(data) {
            },
        });
    });

    $('body').click(function(){
      $('.rvw-parent').removeClass('stack');
      $('.suggestions-list').hide();
    });

});
var frm = $('#contact_form');
frm.submit(function(e) {
    e.preventDefault();
    // $('#contact_captcha_msg').fadeOut(400)
    $.ajax({
        type: frm.attr('method'),
        url: frm.attr('action'),
        data: frm.serialize(),
        success: function(data) {
            $('#contact_success_msg').fadeIn(300);
            setTimeout(function() {
                $('#contact_success_msg').fadeOut(300);
            }, 8000);
            $("#contact_form")[0].reset();
        },
        // error: function(data) {
        //     if (data.status === 422) {
        //         $('#contact_captcha_msg').fadeIn(400)
        //     } else {
        //         $('#contact_error_msg').fadeIn(400);
        //         setTimeout(function() {
        //             $('#contact_error_msg').fadeOut(400);
        //         }, 6000);
        //     }
        // },
    });
});

$('body').on('click','.video-item',function () {
  $('#recipes-modal').find('iframe').attr('src',$(this).data('link')+'?autoplay=1&rel=0')
})

$('#recipes-modal').on('hidden.bs.modal', function () {
  $('#recipes-modal').find('iframe').attr('src','')
})

$('body').on('click','.suggestions',function () {
  window.location.href='/recipes?q='+$(this).data('id')
})
