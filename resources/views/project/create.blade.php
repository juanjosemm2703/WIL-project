<x-app-layout>
    <div class="profile-container">
    <div class="project">
        <h2 class="project-item">Create New Project</h2>     
        <form method="POST" action="{{route('project.store')}}" enctype="multipart/form-data" style="max-width:750px; width:100%;">
            <div class= "container form">
                @csrf
                <!-- Title -->
                <div class= "container ">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title"  :value="old('title')" type="text" name="title" />
                    <x-input-error :messages="$errors->get('title')"/>
                </div>
                <!-- Select Students -->
                <div class= "container ">
                    <x-input-label for="students" :value="__('Students Needed')" />
                    <x-select-input id="students"  :selected="old('students')" name="students" :roles="['3', '4', '5', '6']" />
                    <x-input-error :messages="$errors->get('students')" />
                </div>
                <!-- Description -->
                <div class= "container ">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-textarea id="description"  :text="old('description')" name="description" rows="3"  />
                    <x-input-error :messages="$errors->get('description')"/>
                </div>

                <!-- Offering -->
                <div class= "container row ">
                    <x-input-label for="trimestre" :value="__('Trimestre')" />
                    <x-select-input id="trimestre"  :selected="old('trimestre')" name="trimestre" :roles="['1', '2', '3']" />
                    <x-input-label for="year"  :value="__('Year')" />
                    <x-text-input id="year" :value="old('year')" type="text" name="year"  />  
                </div>
                <div class= "container row ">
                    <x-input-error :messages="$errors->get('trimestre')" />
                    <x-input-error :messages="$errors->get('year')"/>
                </div>
                <div class= "container ">
                    <x-input-label for="files" :value="__('Files')" />
                    <x-text-input id="files" type="file" name="files[]" multiple  />
                    <x-input-error :messages="$errors->get('files')" />  
                </div>
                <div class= "button-container ">
                    <x-primary-button >
                        {{ __('Create') }}
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>
    </div>
</x-app-layout>