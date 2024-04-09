<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Projects') }}
        </h2>
        @if(auth()->user()->user_type === 'Industry Partner')
            <a  href="{{route('project.create')}}">
            <x-primary-button >
                {{ __('New Project') }}
            </x-primary-button>
            </a>
        @endif
    </x-slot>

    <div class="profile-container profile-container_header">
        <div class="project project-item project-title">
            <div>
            <h2 > List of Projects by Offering</h2>
            </div>
        </div>
        <div class="project">
            @foreach($projects as $year => $value)
                @foreach($value as $trimestre=>$projects)
                <a class=" project-item project-name dropdownOffers" onclick="dropdown({{$year}}{{$trimestre}})">
                    <h3>{{$year}}-{{$trimestre}}</h3>
                    <i class="fa fa-caret-down"></i>
                </a>
                <div class="dropdownList" id="dropdownList{{$year}}{{$trimestre}}">
                    @foreach($projects as $project)
                    <a class=" project-item project-name" href="{{route('project.show', ['id' => $project->id])}}">
                    <p>{{$project->title}}</p>
                    </a>
                    @endforeach
                </div>
                @endforeach
            @endforeach
        </div>
    </div>
</x-app-layout>
