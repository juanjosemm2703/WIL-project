<x-app-layout>
    <div class="profile-container">
    <div class="project">
        <h2 class="project-item">Update {{$student->user->name}} Information</h2>     
        <form method="POST"  action="{{route('student.update', ['id' => $student->user_id])}}" style="max-width:750px; width:100%;">
            <div class="container form">
                @csrf
                {{ method_field('PUT') }}

                <!-- Name -->
                <div class= "container ">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" type="text" name="name" :value="old('name', $student->user->name)"  />
                    <x-input-error :messages="$errors->get('name')"/>
                </div>

                <!-- Email -->
                <div class= "container ">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email"  type="email" name="email" :value="old('email', $student->user->email)" />
                    <x-input-error :messages="$errors->get('email')"/>
                </div>

                <!-- Roles -->
                <div class="container ">
                    <x-input-label :value="__('Roles')" />
                    @foreach($roles as $role)
                    <label class="checkbox">
                        <input name="roles[]" value="{{$role->id}}" type="checkbox" 
                        @foreach($student->roles as $user_role)
                            @if($user_role->id == $role->id)
                                checked
                            @endif
                        @endforeach    
                        name="{{ $role->name }}">
                        <span>{{ $role->name }}</span>
                    </label>
                    @endforeach
                    <x-input-error :messages="$errors->get('roles')"/>
                </div>

                <!-- GPA -->
                <div class= "container ">
                    <x-input-label for="gpa" :value="__('GPA')" />
                    <x-text-input id="gpa"  type="text" name="gpa" :value="old('gpa', $student->GPA)" />
                    <x-input-error :messages="$errors->get('gpa')"/>
                </div>

                <div class= "button-container ">
                    <x-primary-button >
                         {{ __('Update') }}
                    </x-primary-button>
                </div>

            </div>
        </form>
    </div>
    </div>
</x-app-layout>