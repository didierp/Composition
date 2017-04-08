$(document).ready(function(){
	$('input#compute').bind('click', function(event){
		computeClick(event, $(event.target).attr('id'));
	});
});
function computeClick() {
	var carbon_count = $('input[name="carbon_count"]').val();
	var oxygen_count = $('input[name="oxygen_count"]').val();
	var hydrogen_count = $('input[name="hydrogen_count"]').val();
	$.ajax({
		url:"resolve.php",
		type:'GET',
		async: true,
		dataType:'json',
		data: {carbon_count: carbon_count,hydrogen_count: hydrogen_count,oxygen_count: oxygen_count},
		success: function(data){
			var insaturation = data['insaturation'];
			var compositions = data['compositions'];
			var count = data['count'];
			var ms = data['ms'];
			$('div.consigne').show();
			$('div.search').hide();
			printInsaturation(insaturation);
			printCount(count);
			printTime(ms);
		},
		error:function(data) {
		}
	});

}
function printInsaturation(value) {
	$('div.insaturation').show();
	$('span#insaturation').text(value);
}
function printCount(value) {
	$('div.count').show();
	$('span#count').text(value);
}
function printTime(value) {
	$('div.ms').show();
	$('span#ms').text(value);
}
