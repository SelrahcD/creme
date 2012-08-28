<table>
	<tr><td>Username</td><td>Email</td>
		@foreach(Role::$roles as $role)
		<td>{{ $role }}</td>
		@endforeach
		<td>Editer</td>
	</tr>
@foreach($usersList as $user)
	<tr>
		<td>{{ $user->name }}</td>
		<td>{{ $user->email }}</td>
		@foreach(Role::$roles as $role)
		<td>@if($user->has_role($role)) &times; @endif</td>
		@endforeach
		<td>{{ HTML::link('admin/users/edit/'.$user->id, 'Editer')}}</td>
	</tr>
@endforeach
</table>