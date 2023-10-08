<x-app-layout>
    <div class="profile-container">
    <div class="project">
        <h2 class="project-item"> {{$student->user->name}} Information</h2>     
        <div class="container form">
            <div class= "container row">
                <h3 >Name: </h3>
                <p>{{$student->user->name}}</p>
            </div>
            <div class= "container row">
                <h3 >Email: </h3>
                <p>{{$student->user->email}}</p>
            </div>
            <div class= "container row">
                <h3 >User Type: </h3>
                <p>{{$student->user->user_type}}</p>
            </div>
            <div class= "container row">
                <h3 >GPA: </h3>
                <p>{{$student->GPA}}</p>
            </div>
            @if(count($student->roles)>0)
            <div class= "container row">
                <h3 style="align-self:start;">Roles: </h3>
                <ul>
                    @foreach($student->roles as $user_role)
                    <li><p>{{$user_role->name}}</p></li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(auth()->user()->user_type == 'Student')
            <div class= "button-container ">
                <a  href="{{route('student.edit',['id' => $student->user_id])}}">
                <x-primary-button >
                    {{ __('Edit') }}
                </x-primary-button>
                </a>
            </div>
            @endif
        </div>

    </div>
    </div>
</x-app-layout>