<?php
if (filter_input(INPUT_POST, 'data'))
	{
	parse_str($_POST['data'], $_POST);
	//print_r($_POST);

	echo 'success';
	}
?>