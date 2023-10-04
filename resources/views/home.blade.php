<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('List of Industry Partners') }}
        </h2>
        @if(auth()->user()->user_type === 'Teacher')
        <h3>
            {{ __('Status') }}
        </h3>
        @endif
    </x-slot>

        <div class="list-container">
        @foreach ($partners as $partner)
                <div class="partner-card">
                    <a href="{{route('partner.show', ['id' => $partner->user_id])}}">
                        <p>{{$partner->user->name}}</p>
                    </a>
                    @if(auth()->user()->user_type === 'Teacher')
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
                    @endif
                </div>
            
        @endforeach
        <div class="pagination-container">
            {{$partners->links()}}
        </div>
        </div>    
</x-app-layout>
