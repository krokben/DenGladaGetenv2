$('.book-item').on('click', function() {
    $(this).children(":nth-child(5)").toggle();
    $(this).children(":nth-child(4)").toggle();
    $(this).next().toggle();
});
