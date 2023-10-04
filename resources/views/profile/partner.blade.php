<x-app-layout>
    <div class="profile-container">
        <div class="profile-attributes">
            <div class="container attribute">
                <h3>Name</h3>
                <p>{{$partner->user->name}}</p>
            </div>
            <div class="container attribute">
                <h3>Email</h3>
                <p>{{$partner->user->email}}</p>
            </div>
            @if(auth()->user()->user_type === 'Teacher')
            <div class="container attribute">
                <h3>Approved</h3>
                <form method="POST" action="{{ route('partner.update', ['id' => $partner->user_id]) }}">
                @csrf
                {{ method_field('PUT') }}
                <input type="hidden" id="is_approved" name="is_approved" value="{{$partner->approved}}">
                @if($partner->approved == 0)
                    <x-primary-button >
                        {{ __('Approve') }}
                    </x-primary-button>
                @else
                    <x-secondary-button >
                        {{ __('Disapprove') }}
                    </x-secondary-button>
                @endif
                </form>
            </div>
            @endif
        </div>
        <div class="project project-item project-title">
            <div>
            <h2 > List of Projects</h2>
            </div>
        </div>
        <div class="project">
            @foreach($partner->projects->reverse() as $project)
                <a  class=" project-item project-name" href="{{route('project.show', ['id' => $project->id])}}">
                <p>{{$project->title}}</p>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>