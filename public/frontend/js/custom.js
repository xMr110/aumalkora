$(document).ready(function (){
    $('.materialboxed').materialbox();
    $('select').material_select();
    $('.modal').modal();
    $(".close_modal").on("click", function(){
    	$('#cart_modal').modal('close');
    });
	$('.slider').slider({
		height: 550,
	});
	$('.right-arrow').on('click', function (){
		$('.slider').slider('next');
	});
	$('.left-arrow').on('click', function (){
		$('.slider').slider('prev');
	});
  // Initialize collapse button
  $(".button-collapse").sideNav();
  $(".apply_job_form").on("click", function(){
    $("#job_id").attr("value", $(this, ".apply_job_form").attr("data-id"));
  });
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
  });
});