<?php
if (filter_input(INPUT_POST, 'data'))
	{
	parse_str($_POST['data'], $_POST);

	if ((filter_input(INPUT_POST, 'name')) && (filter_input(INPUT_POST, 'email')))
		{
		//$result_text = '';

		$email = str_replace(' ', '', strtolower($_POST['email']));
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
			//$result_text = '<p class="alert alert-danger">'.$email.' is wrong!</p>';
			echo 'unsuccess';
			}
		else
			{
			$email_slug_array = explode('@', $email);
			$domain = array_pop($email_slug_array);

			if ((!checkdnsrr($domain, 'MX')) && (!checkdnsrr($domain, 'A')))
				{
				//$result_text = '<p class="alert alert-danger">'.$email.' is wrong!</p>';
				echo 'unsuccess';
				}
			else
				{
				//SQL query or send mail
				//$result_text = '<p class="alert alert-success">Success!</p>';
				echo 'success';
				}
			}

		//echo $result_text;
		}
	}
?>