
$('.course-content-togler').on('click', function() {
if($(this).find(".icon").hasClass("fa-plus")) {
    $(this).find(".icon").removeClass('fa-plus').addClass('fa-minus');
} else if($(this).find(".icon").hasClass("fa-minus")) {
    $(this).find(".icon").removeClass('fa-minus').addClass('fa-plus');
}
})