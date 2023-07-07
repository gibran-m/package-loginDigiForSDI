@extends('login.template-copy')

@section('login')
    <section>         
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <img class="left-image" src="/local_assets/img/login/left2.png" alt="looginpage">
                </div>
                <div class="col-5"> 
                <div class="row d-flex justify-content-center">
                    <img class="right-group14" src="/local_assets/img/login/Group14.png" alt="looginpage">
                </div>
                <div class="row mt-5">
                    <div class="container right-container-top">
                        <div class="row">
                            <img class="right-logo" src="/local_assets/img/login/bjbs.png" alt="looginpage">
                        </div>
                        <div class="row">
                            <p>Human Resources Management Information System</p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <form class="theme-form login-form needs-validation @if($errors->any()) was-validated @enderror" id="loginFormDigi" method="POST" action="{{ route('login-auth') }}" novalidate>
                    @csrf
                    <div class="container ">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col">
                            <div class="card" style="border-radius: 1rem; border:none">
                            <div class="card-body text-center" style="padding-left: 30px; padding-right 30px; padding-top:0px">
                                <h3>Sign In</h3>

                                <div class="mb-3">
                                </div>
                    
                                <div class="form-outline form-group mb-4">
                                    <label for="email"><i class="bi bi-person"></i></label>
                                    <input class="form-control" type="email" required="" placeholder="Username" name="email" id="email" value="{{ old('email') }}" autofocus />
                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                    
                                <div class="form-outline form-group mb-4">
                                    <label for="email"><i class="bi bi-lock"></i></label>
                                    <input class="form-control" id="password"  type="password" name="password" required="" placeholder="Passsword" />
                                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                </div>

                                <div class="text-end">
                                    <a href="#">Forgot Password?</a>
                                </div>

                                <div class="mb-3">
                                </div>
                                <button class="btn btn-primary btn-lg btn-block" type="submit" style="width: 100%">Sign In</button>
                                
                                <div class="mb-3">
                                </div>

                                <p class="text-muted">Belum punya akun? <a href="#" class="text-danger">Sign Up!</a></p>
                                <div class="mb-5">
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </form>
                </div>
                <br>
                <br>
                <div class="row mt-5 d-flex text-center justify-content-center align-items-end bottom-footer">
                    <div class="col">
                        <p>&copy; 2023 bank <b>bjb</b> syariah<br>
                            <span class="text-muted" style="font-size: 12px"> version {{config('app.version') ?? 0 }}</span></p>
                    </div>
                </div>
                

                

                
                </div>
            </div>
          </div>
    </section>
@endsection

@section('script')
<script>
    
    function submitForm() {
        document.getElementById("loginFormDigi").submit();
    }

</script>

@endsection

