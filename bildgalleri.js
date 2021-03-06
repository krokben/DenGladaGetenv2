var Gallery = {

    init: function() {
        this.cacheDom();
        this.bindEvents();
    },

    cacheDom: function() {
        this.$el = $('#gallery');
        this.$mini = this.$el.find('.mini');
        this.$big = this.$el.find('.big');
        this.$bigimg = this.$el.find('.bigimg');
        this.$leftbtn = this.$el.find('.leftbtn');
        this.$rightbtn = this.$el.find('.rightbtn');
        this.$imgcontainer = this.$el.find('.img-container');
    },

    /*Härifråntill--*/bindEvents: function () {
        this.$mini.on('click', this.showImg);                   //Array med bilderna
        /*this.$big.on('click', this.hideImg.bind(this));*/
        //Fixa så att det går att trycka på knapparna
        this.$imgcontainer.on('click', this.hideImg.bind(this));
        this.$leftbtn.on('click', this.prevImg.bind(this));
        this.$rightbtn.on('click', this.nextImg.bind(this));

        $(document).on('keydown', function(e) {
          var self = Gallery;
          // left = 37
          // right = 39
          var keyPressed = e.keyCode;

          if(keyPressed === 37) {
            self.prevImg();
          } else if (keyPressed === 39) {
            self.nextImg();
          }
          else if (keyPressed === 27) {
            self.hideImg();
          }
        });

    },

    imgPos: 0,

    showImg: function () {
        var mq = window.matchMedia("(min-width: 767px)");
        var self = Gallery;
        if (mq.matches) {
            self.imgPos = self.$mini.index(this);
            self.$big.fadeIn('fast').css('display', 'flex');
            self.$bigimg.attr('src', this.src);
        };

    },

    hideImg: function () {
        this.$big.fadeOut('fast');
        this.$el.css('overflow', 'scroll').css('position', 'relative');
    },

/*HIT...*/

    prevImg: function () {
        this.imgPos = this.imgPos - 1;
        this.checkArrayLength(this.imgPos);
        this.$bigimg.attr('src', this.$mini[this.imgPos].src);
    },

    nextImg: function () {
        this.imgPos = this.imgPos + 1;
        this.checkArrayLength(this.imgPos);
        this.$bigimg.attr('src', this.$mini[this.imgPos].src);
    },

    checkArrayLength: function (pos) {
        var self = Gallery;
        if (pos < 0) {
            self.imgPos = self.$mini.length -1;
        }
        else if (pos > self.$mini.length - 1) {
            self.imgPos = 0;
        }
        else {
            return self.imgPos;
        }
    }
};
Gallery.init();
