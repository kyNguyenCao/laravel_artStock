@extends('auth.auth')
@section('login_form')
    <form class="row g-3" action=" {{ route('password.update') }} " method="POST">
        @csrf
        <div class="col-12 text-center">
            <a href="{{ route('index') }}">
                <img src="{{ asset('/assets/logo/logo.png') }}" alt="Logo" height="90px">
            </a>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-12">
            <input type="hidden" id="token" name="token" value="{{ $token }}">
        </div>
        <div class="col-12">
            <input type="hidden" id="email" name="email" value="{{ $email }}">
        </div>
        <div class="col-12">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword4" name="password">
        </div>
        <div class="col-12">
            <label for="inputPassword5" class="form-label">Confirm your password</label>
            <input type="password" class="form-control" id="inputPassword5" name="password_confirmation">
        </div>
        <div class="h10"></div>
        <div class="row">
            <div class="col-5"></div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-5"></div>
        </div>
    </form>
@endsection
@push('js')
    <script>
        window.addEventListener("pageshow", function(event) {
            var historyTraversal = event.persisted ||
                (typeof window.performance != "undefined" &&
                    window.performance.getEntriesByType("navigation")[0].type === "back_forward");
            if (historyTraversal) {
                // Handle page restore.
                window.location.reload();
            }
        });
    </script>
@endpush
