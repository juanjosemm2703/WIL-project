@extends('layouts.master')
@section('content')
    <body>

            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="header">
                    <div class="hed-wrapper">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

    </body>
@endsection

