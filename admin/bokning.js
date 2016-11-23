$('.book-item').on('click', function() {
    $('.info').toggle('.hidden');
    $('.click').toggle('.hidden');
});



function saySomething(name, age) {

    if(age < 18) {
        return name + ' is young';
    }


}