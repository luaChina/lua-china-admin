@extends('errors::illustrated-layout')
@section('code', '500')
@section('title', __('Error'))

@section('image')
<div style="background-image: url({{ asset('/svg/500.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
<div class="content">
    <div class="title">Something went wrong.</div>

    @if(app()->bound('sentry') && !empty(Sentry::getLastEventID()))
        <div class="subtitle">Error ID: {{ Sentry::getLastEventID() }}</div>

        <!-- Sentry JS SDK 2.1.+ required -->
        <script src="https://cdn.ravenjs.com/3.3.0/raven.min.js"></script>

        <script>
            Raven.showReportDialog({
                eventId: '{{ Sentry::getLastEventID() }}',
                // use the public DSN (dont include your secret!)
                dsn: 'https://af1c69ca66c641d482f2b441a7581a3b@sentry.io/1327673',
                user: {
                    'name': 'Jane Doe',
                    'email': 'jane.doe@example.com',
                }
            });
        </script>
    @endif
</div>
@endsection

@section('message', __('Whoops, something went wrong on our servers.'))
