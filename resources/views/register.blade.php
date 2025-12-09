<!DOCTYPE html>
<html lang="en">

@include('partials.head', ['pageTitle' => $pageTitle])

<body class="d-flex flex-column min-vh-100" id="registration">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="flex-grow-1 d-flex align-items-center justify-content-center bg-body-tertiary">
        <div class="container position-static d-block p-4 py-md-5 rounded-2 shadow"
            style="max-width: 400px; width: 100%;">
            <div class="mb-4 text-center">
                <p class="h5 fw-semibold mb-2 text-center mb-3">Registrati</p>
                <p class="mb-4 text-muted op-7 fw-normal text-center">Incomincia subito creando il tuo account!</p>
            </div>
            <form class="needs-validation" novalidate method="POST" action="{{ route('registerUser') }}">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ old('name') }}" required>
                    <label for="name">Nome</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="surname" name="surname" placeholder="surname" value="{{ old('surname') }}" required>
                    <label for="surname">Cognome</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                    <label for="email">Indirizzo Mail</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ old('password') }}" required>
                    <label for="password">Password</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Conferma la Password" required>
                    <label for="password_confirmation">Conferma la Password</label>
                </div>
                
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="checkConditions" name="checkConditions" required>
                    <label class="form-check-label" for="checkConditions">Dichiaro di accettare
                        <a href="terms_conditions.html" class="text-success">
                            <u>Termini e Condizioni</u>
                        </a> e la nostra
                        <a href="privacy_policy.html" class="text-success">
                            <u>Privacy Policy</u>
                        </a>
                    </label>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary w-50">Crea Account</button>
                </div>
                <div class="text-center">
                    <p class="fs-12 text-muted mt-3">Hai già un account?
                        <a href="{{ route('login') }}" class="text-primary">Accedi</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"></script>
</html>