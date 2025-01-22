@extends('layouts.template')

@section('content')
<div class="herocontent">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-xl bg-white rounded">
            <form class="px-5 py-5" action="{{ route('ticket.store')}}" method="post">
                @csrf
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Sopd</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="sopd_id" required>
                            <option></option>
                            @foreach ($sopds as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_sopd }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Aduan</label>
                    <div class="col-sm-8">
                        <input type="text" style="width:100%" name="aduan" class="form-control @error('aduan') is-invalid @enderror" id="aduan" required/>
                        @error('aduan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Status</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="status" required>
                            <option value="masuk">masuk</option>
                            <option value="diproses">diproses</option>
                            <option value="selesai">selesai</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Tanggal Masuk</label>
                    <div class="col-sm-8">
                        <input type="date" style="width:100%" name="tanggalMasuk" class="form-control @error('tanggalMasuk') is-invalid @enderror" id="tanggalMasuk" required/>
                        @error('tanggalMasuk')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Tanggal Selesai</label>
                    <div class="col-sm-8">
                        <input type="date" style="width:100%" name="tanggalSelesai" class="form-control @error('tanggalSelesai') is-invalid @enderror" id="tanggalSelesai"/>
                        @error('tanggalSelesai')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Keterangan</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="keterangan"></textarea>
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

