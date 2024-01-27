// In your Javascript (external .js resource or <script> tag)
$(document).ready(function () {
	$(".js-example-basic-single").select2();
});

$(".my_select_box").chosen({
	disable_search_threshold: 10,
	no_results_text: "Oops, nothing found!",
	width: "100%",
});
