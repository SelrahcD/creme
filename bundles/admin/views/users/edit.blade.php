<h1>Editer un utilisateur</h1>
{{ $form->open() }}
    <fieldset>
        {{ $form->hidden('id') }}
        <!-- username field -->
        {{ $form->text('name', 'Nom d\'utilisateur') }}

        <!-- email field -->
        {{ $form->text('email', 'Email') }}

        @if(sizeof(Role::$roles))
        <table>
            <tr>
            @foreach(Role::$roles as $role)
                <td>{{ $role }}</td>
            @endforeach
            </tr>
            <tr>
            @foreach(Role::$roles as $role)
            <td>{{ $form->checkbox('roles_'.$role, '', $role, $user->has_role($role)) }}</td>
            @endforeach
            </tr>
        </table>
        @endif
        <!-- submit button -->
        {{ $form->submit('Editer') }}
    </fieldset>
{{ Form::close() }}