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
    },

    bindEvents: function () {
        this.$mini.on('click', this.showImg);                   //Array med bilderna
        /*this.$big.on('click', this.hideImg.bind(this));*/     //Fixa så att det går att trycka på knapparna
        this.$bigimg.on('click', this.hideImg.bind(this));
        this.$leftbtn.on('click', this.prevImg.bind(this));
        this.$rightbtn.on('click', this.nextImg.bind(this));
    },

    imgPos: 0,

    showImg: function () {
        var self = Gallery;
        self.imgPos = self.$mini.index(this);
        self.$big.fadeIn('fast').css('display', 'flex');
        self.$bigimg.attr('src', this.src);
    },

    hideImg: function () {
        this.$big.fadeOut('fast');
        this.$el.css('overflow', 'scroll').css('position', 'relative');
    },

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
