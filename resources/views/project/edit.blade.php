<x-app-layout>
    <div class="profile-container">
    <div class="project">
        <h2 class="project-item">Update {{$project->title}} Information</h2>     
        <form method="POST" action="{{route('project.update', ['id' => $project->id])}}" style="max-width:750px; width:100%;">
            <div class= "container form">
                @csrf
                {{ method_field('PUT') }}
                <!-- Title -->
                <div class= "container ">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" type="text" name="title" :value="$project->title"/>
                    <x-input-error :messages="$errors->get('title')"/>
                </div>
                <!-- Select Students -->
                <div class= "container ">
                        <x-input-label for="students" :value="__('Students Needed')" />
                        <x-select-input id="students" name="students" :roles="['3', '4', '5', '6']" :selected="$project->students_needed"/>
                        <x-input-error :messages="$errors->get('students')" />
                </div>
                <!-- Description -->
                <div class= "container ">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-textarea id="description" name="description" rows="3" :text="$project->description" />
                    <x-input-error :messages="$errors->get('description')"/>
                </div>

                <!-- Trimestre -->
                <div class= "container ">
                        <x-input-label for="trimestre" :value="__('Trimestre')" />
                        <x-select-input id="trimestre" name="trimestre" :roles="['1', '2', '3']" :selected="$project->trimestre"/>
                        <x-input-error :messages="$errors->get('trimestre')" />
                </div>

                <!-- Year -->
                <div class= "container ">
                    <x-input-label for="year" :value="__('Year')" />
                    <x-text-input id="year" type="text" name="year" :value="$project->year"  />
                    <x-input-error :messages="$errors->get('year')"/>
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