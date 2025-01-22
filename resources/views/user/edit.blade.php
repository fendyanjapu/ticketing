@extends('layouts.template')

@section('content')
<div class="herocontent">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-xl bg-white rounded">
            <form class="px-5 py-5" action="{{ route('user.update', ['user' => $user])}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" style="width:100%" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $user->name }}" required/>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                
                <div class="form-group row mt-3 border-top pt-3">
                        <label class="col-sm-4 control-label">Username Login</label>
                        <div class="col-sm-8">
                            <input type="text" style="width:100%" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ $user->username }}" required/>
                            @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
                <div class="form-group row mt-3">
                        <label class="col-sm-4 control-label">Password</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password">
                                <div class="input-group-append">
                                <span class="input-group-text" id="togglePassword">
                                    <i class="icon-eye-close" style="height: 25px;margin-top:6px"></i>
                                </span>
                                </div>
                            </div>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                </div>

                <div class="col-sm-offset-4 mt-4 text-center">
                    <button type="submit" class="btn btn-primary" id="bSimpan"><i class="fa fa-save"></i> Simpan</button>
                    <a href="#" class="btn btn-danger" onClick="self.history.back()">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    document.getElementById('togglePassword').addEventListener('click', function() {
        var passwordInput = document.getElementById('password');
        var icon = document.querySelector('#togglePassword i');

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove('icon-eye-close');
            icon.classList.add('icon-eye-open');
        } else {
            passwordInput.type = "password";
            icon.classList.remove('icon-eye-open');
            icon.classList.add('icon-eye-close');
        }
    });

</script>

@endsection

