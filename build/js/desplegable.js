$(document).ready(function() {
    $('.dropdown').click(function(event) {
        var dropdownContent = $(this).find('.dropdown-content');
        if (dropdownContent.css('display') === 'block') {
            dropdownContent.css('display', 'none');
        } else {
            dropdownContent.css('display', 'block');
        }
    });
});
