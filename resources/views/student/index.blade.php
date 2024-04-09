<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('List of Students') }}
        </h2>
    </x-slot>

        <div class="list-container">
        @foreach ($students as $student)
                <div class="partner-card">
                    <a href="{{route('student.show', ['id' => $student->user_id])}}">
                        <p>{{$student->user->name}}</p>
                    </a>
                </div>
        @endforeach
        <div class="pagination-container">
            {{$students->links()}}
        </div>
        </div>    
</x-app-layout>
