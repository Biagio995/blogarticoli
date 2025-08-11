        <x-layout-component>
            <div class="container-fluid d-flex justify-content-center align-items-center vh-100 bg-light">
                <div class="main-box container position-relative p-0 @if($errors->has('signUp_active')) right-panel-active @endif" id="container">

                    <!-- Mobile tab switch -->
                    <div class="mobile-toggle d-md-none d-flex justify-content-around p-2 bg-white border-bottom">
                        <button class="btn btn-outline-danger btn-sm" id="mobileSignIn">Accedi</button>
                        <button class="btn btn-outline-danger btn-sm" id="mobileSignUp">Registrati</button>
                    </div>
                    
                    <!-- Sign In -->
                    <div class="form-container sign-in-container p-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h3 class="fw-bold mb-3">Accedi</h3>
                            <input type="text" class="form-control rounded-pill mb-3" placeholder="Email" name="email"/>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            <input type="password" class="form-control rounded-pill mb-3" placeholder="Password" name="password"/>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            <button type="submit" class="btn btn-danger w-100 rounded-pill">Accedi</button>
                        </form>
                    </div>
                    
                    <!-- Sign Up -->
                    <div class="form-container sign-up-container p-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <h3 class="fw-bold mb-4">Registrati</h3>
                            <div>
                                <input type="text" class="form-control rounded-pill mb-3" placeholder="Nome e Cognome" name="name_signUp" />
                                @error('name_signUp')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div>
                                <input type="email" class="form-control rounded-pill mb-3" placeholder="Email" name="email_signUp" />
                                @error('email_signUp')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <input type="password" class="form-control rounded-pill mb-3" placeholder="Password" name="password_signUp"/>
                                @error('password_signUp')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <input type="password" class="form-control rounded-pill mb-3" placeholder="Conferma Password" name="password_signUp_confirmation"/>
                            </div>
                            
                            <button type="submit" class="btn btn-danger w-100 rounded-pill">Registrati</button>
                        </form>
                    </div>
                    
                    <!-- Overlay Panel -->
                    <div class="overlay-container d-none d-md-block">
                        <div class="overlay">
                            <div class="overlay-panel overlay-left">
                                <h1>Bentornato!</h1>
                                <p>Hai già un account?</p>
                                <button class="btn btn-outline-light rounded-pill mt-2" id="signIn">Accedi</button>
                            </div>
                            <div class="overlay-panel overlay-right">
                                <h1>Benvenuto!</h1>
                                <p>Non hai un account?</p>
                                <button class="btn btn-outline-light rounded-pill mt-2" id="signUp">Registrati</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </x-layout-component>