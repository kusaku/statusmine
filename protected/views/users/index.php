<?php
/*
	Show info about peoples
*/

print "<table border=1>\n";

	print "<tr>";
	print '<th>ID</th>';
	print '<th>Login</th>';
	print '<th>Name</th>';
	print '<th>Birth Day</th>';
	print "</tr>\n";

	foreach ($users as $user)
	{

		print "<tr>";
		print '<td>'.$user['id'].'</td>';
		print '<td>'.$user['login'].'</td>';
		print '<td>'.$user['firstname'].' '.$user['lastname'].'</td>';
		print '<td>'.$user['birthDay'].'</td>';
		print "</tr>\n";

	}
print "</table>\n";


?>