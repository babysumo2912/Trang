$(document).ready( function(){
    // $(".price").hover(function(){
    //     $(".buy").show();
    //     $(".price").hide();
    // });
    // tao back to top
    if($(".btn-top").length > 0){
        $(".btn-top").hide();
        $(window).scroll(function(){
            var e = $(window).scrollTop();
            if(e >= 280){
                $(".btn-top").show();
            }else{
                $(".btn-top").hide();
            }
        });
        $(".btn-top").click(function(){
            $('body','html').animate({
                scrollTop: 0
            })
        })
    }
    // endtao back to top
    // tao menu an
    // if($(".fix").length > 0){
    //     $(".fix").hide();
    //     $(window).scroll(function(){
    //         var e = $(window).scrollTop();
    //         if(e <= $(window).scrollTop()){
    //             // $(".third-header").hide();
    //             $(".fix").Show();
    //         }else{
    //             $(".fix").hide();
    //             // $(".third-header").show();
    //         }
    //     })
    // }
    //end
    //tao form login
    // $('a.login-window').click(function() {
    //     //Getting the variable's value from a link
    //     var loginBox = $(this).attr('href');
    //     //Fade in the Popup
    //     $(loginBox).slideDown();
    //     $('a.register-window').click(function(){
    //         var registerBox = $(this).attr('href');
    //         $(loginBox).fadeOut();
    //         $(registerBox).fadeIn("300");
    //         $('a.relogin-window').click(function(){
    //             var relogin = $(this).attr('href');
    //             $(registerBox).fadeOut();
    //             $(relogin).fadeIn(300);
    //         });
    //     });
    //     $('body').append('<div id="over"></div>');
    //     $('#over').fadeIn(300);
    //     return false;
    // });
    // $(document).keyup(function(e){
    //     if(e.keyCode == '27'){
    //         $('#over, .login-box').fadeOut(300 , function() {
    //             $('#over').remove();
    //         });
    //         return false;
    //     }
    // });
    // $(document).on('click', "a.close, #over", function() {
    //     $('#over, .login-box').fadeOut(300 , function() {
    //         $('#over').remove();
    //     });
    //     return false;
    // });
    // //tao menu show, hide
    // $(".menual").click(function(){
    //     // alert("abc"); 
    //     $('.menual-drop').animate({width:'toggle'});
    // })
    // ;
    // //end
    // //show, hide log out
    // $('a.admin-name').click(function(){
    //     $('.logout-admin').slideDown();
    // });
    // // $('body').click(function(){
    // //     $('.logout-admin').hide();        
    // // });
    // $(document).keyup(function(e){
    //     if(e.keyCode == 27){
    //         $('.logout-admin').slideUp();
    //         return false;
    //     }
    // });
    //end
    //tao menu doc truot
    // alert($('.menu-left').height());
    // $(window).scroll(function(){
    //     if($(window).scrollTop() <= 540){
    //         $('.menu-left').css({'position':'relative'});
    //     }else{
    //         $('.menu-left').css({'position':'fixed'});
    //     }
    // })

    //end
});