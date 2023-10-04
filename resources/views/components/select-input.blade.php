@props(['roles', 'selected'=>0])
<select {{ $attributes }}>
    @foreach ($roles as $role)
        <option value="{{$role}}"  @if($selected == $role) selected="selected" @endif>{{$role}}</option>
    @endforeach
</select>