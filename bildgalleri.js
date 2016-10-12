/**
 * Created by Mattias on 2016-10-01.
 */
/*var Gallery = {
    init: function() {
        this.bindEvents();
    },

    bindEvents: function() {
        $('.mini').on('click', this.showImg);
        $('.switchImg').on('click', this.switchImg);
    },

    showImg: function() {
        console.log(this);
    },

    switchImg: function() {
        console.log(this);
    }


};

Gallery.init(); */

$(window).on('load', function() {


    var pics = $('.mini').on('click', function () {             //Gör en array av alla bilder med class .mini
        $('.big').fadeIn('fast').css('display', 'flex');        //Visar en förstorad variant av bilden som klickades på
        $('.bigimg').on('click', function () {                  //Återgå till galleri-läget vid klick på förstorad bild
            $('.big').fadeOut('fast');                          //
        }).attr('src', this.src);
        that = pics.index(this);
    });

    $('.leftbtn').on('click', function () {
        that--;
        checkArrayLength(that);
        $('.bigimg').attr('src', pics[that].src);
    });

    $('.rightbtn').on('click', function () {
        that++;
        checkArrayLength(that);
        $('.bigimg').attr('src', pics[that].src);
    });

    function checkArrayLength(num) {
        if(num < 0) {
            that = pics.length - 1;
        }
        else if(num > pics.length - 1) {
            that = 0;
        }
    }

});

