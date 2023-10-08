<x-app-layout>
    <div class="profile-container">
        <div class="profile-attributes">
            <div class="container attribute">
                <h3>Title</h3>
                <p>{{$project->title}}</p>
            </div>
            <div class="container attribute">
                <h3>Students Nedeed</h3>
                <p>{{$project->students_needed}}</p>
            </div>
            <div class="container attribute">
                <h3>Offering</h3>
                <p>{{$project->trimestre}}-{{$project->year}}</p>
            </div>
            <div class="container attribute">
                <h3>Offered By</h3>
                <p>{{$project->partner->user->name}}</p>
            </div>
        </div>
        @if(auth()->user()->id == $project->partner->user->id)
        <div class="button-container">
                <a  href="{{route('project.edit', ['id' => $project->id])}}">
                <x-primary-button >
                    {{ __('Update') }}
                </x-primary-button>
                </a>
                <form method="POST" action="{{route('project.destroy', ['id' => $project->id])}}">
                 @csrf
                {{ method_field('DELETE') }}
                <x-danger-button >
                    {{ __('Delete') }}
                </x-danger-button>
                </form>
        </div>
        @endif
         @if(auth()->user()->user_type == 'Student')
        <div class="button-container">
                <a  href="{{route('application.create',['project_id' => $project->id])}}">
                <x-primary-button >
                    {{ __('Apply') }}
                </x-primary-button>
                </a>
        </div>
        @endif
        @if($errors->get('application'))
        <div class="error-msg">
            <x-input-error :messages="$errors->get('application')"/>
        </div>
        @endif
            
        @if($errors->get('condition'))
        <div class="error-msg">
            <x-input-error :messages="$errors->get('condition')" />
        </div>
        @endif
        
        <div class="project">
            <div class=" project-item project-title">
                    <h2>Description</h2>
            </div>
            <div class="project-item">
            <p class="description" >{{$project->description}}</p>
            </div>
            <div class="img-container">
            @foreach ($project->files as $file)
            @if ($file->type === 'image')
                <a  href="{{ url($file->file_path) }}" target="_blank">
                <img src="{{ url($file->file_path) }}" alt="Description Img" class="grid-img">
                </a>
            @elseif ($file->type === 'pdf')
                <a class="project-item grid-pdf" href="{{ url($file->file_path) }}" target="_blank">{{ asset($file->file_path)}}</a>
            @endif
            @endforeach
            </div>
           
            @if(count($project->applications)>0)
            <div class=" project-item project-title">
                <h2>Applications : {{count($project->applications)}} </h2>
            </div>
            <div class="img-container">
            @foreach ($project->applications as $application)
            <div class=" project-item grid-img">
                <h2 class="grid-title">{{$application->user->name}} </h2>
                <p class="grid-body">{{$application->pivot->justification}}</p> 
            </div>
            @endforeach
            </div>
            @endif
        </div>
  

    </div>
</x-app-layout>

