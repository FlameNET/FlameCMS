$(document).ready(function() {
	// Set error
    var error = $('section[data-error]');
    error.attr('class', 'error error-' + error.attr('data-error'));
});
