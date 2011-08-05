<?php
/*
	Вывод полного списка людей из БД
*/

print "<table>\n";

	print "<tr>";
	print '<th>ID</th>';
	print '<th>ФИО</th>';
	print '<th>Email</th>';
	print '<th>Login</th>';
	print '<th>Телефон</th>';
	print "</tr>\n";

	foreach ($users as $user)
	{

		print "<tr>";
		print '<td>'.$user->id.'</td>';
		print '<td><a href="/users/'.$user->id.'">'.$user->name.'</td>';
		print '<td>'.$user->email.'</td>';
		print '<td>'.$user->login.'</td>';
		print "</tr>\n";

	}
print "</table>\n";


?>