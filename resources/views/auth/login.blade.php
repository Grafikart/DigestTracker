@extends('empty')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 col-xl-4 my-5">

                <!-- Heading -->
                <h1 class="display-4 text-center mb-3">
                    Se connecter
                </h1>

                <!-- Form -->
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <x-input name="email" label="Email"/>
                    <x-input name="password" label="Mot de passe" type="password"/>
                    <!-- Submit -->
                    <button class="btn btn-lg w-100 btn-primary mb-3">
                        Se connecter
                    </button>

                </form>

            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
@endsection
