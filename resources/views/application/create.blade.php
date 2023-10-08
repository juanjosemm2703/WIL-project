<x-app-layout>

    <div class="profile-container">
    <div class="profile-attributes">
            <div class="container attribute">
                <h3>Title</h3>
                <p>{{$project->title}}</p>
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
    <div class="project">
        <h2 class="project-item">New Application</h2>     
        <form method="POST"  action="{{route('application.store')}}" style="max-width:750px; width:100%;">
            <div class="container form">
                @csrf
                <input type="hidden" id="project_id" name="project_id" value="{{$project->id}}">
                <!-- Name -->
                <div class= "container row">
                    <h3>Name:</h3>
                    <p>{{auth()->user()->name}}</p>
                </div>
                <!-- Justification -->
                <div class= "container ">
                    <x-input-label for="justification" :value="__('Justification')" />
                    <x-textarea id="justification"  :text="old('justification')" name="justification" rows="3"  />
                    <x-input-error :messages="$errors->get('justification')"/>
                </div>


                <div class= "button-container ">
                    <x-primary-button >
                         {{ __('Apply') }}
                    </x-primary-button>
                </div>

            </div>
        </form>
    </div>
    </div>
</x-app-layout>