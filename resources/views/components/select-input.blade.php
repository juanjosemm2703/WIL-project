@props(['roles'])
<select {{ $attributes }}>
    @foreach ($roles as $role)
        <option value="{{$role}}">{{$role}}</option>
    @endforeach
</select>