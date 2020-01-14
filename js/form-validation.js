$(function() {
	
    $('form').validate({
        highlight: function(element, errorClass) {
            $(element).add($(element).parent()).addClass("invalidElem");
        },
        unhighlight: function(element, errorClass) {
            $(element).add($(element).parent()).removeClass("invalidElem");
        },
        errorElement: "div",
        errorClass: "errorMsg"
    });
	
    $.validator.addClassRules({
        flowerValidation: {
			required: true,
			digits: true,
            min: 0,
			max: 100
        }
    })
	
    $('.form-group input').each(function(index, elem) {
        $(elem).rules("add", {
            min: 10,
            max: 20
        })
    });
		
});