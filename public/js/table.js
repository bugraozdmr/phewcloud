$('.custom-button').on('click', function(e) {
e.preventDefault();

// get data id
var id = $(this).data('id');

console.log("id: ",id);
// close other opened ones
$('.custom-detail').removeClass('open');

// open related detail
$('#detail-' + id).addClass('open');
});

$('.custom-close').on('click', function() {
// close
$(this).closest('.custom-detail').removeClass('open');
});