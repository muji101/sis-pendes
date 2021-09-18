@php
    //isset buat ngecek data kalau ada true kalau tidak false
    $isEdit = isset($rws);
    
    $title = $isEdit ? 'Edit Data Desa' : 'Tambah Data Desa';

    $route = $isEdit ? route('rws.update', $rws->id) : route('rws.store');

    $button = $isEdit ? 'Update' : 'Create';
@endphp
<div class="row match-height">
    <div class="col-12 mx-auto">
        <form class="form form-vertical" action="{{ $route }}" method="POST">
            @csrf
            @if ($isEdit)
                @method('PUT')
            @else
                @method('POST')
            @endif
            <div class="form-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                        <label for="first-name-vertical">Rukun Warga</label>
                        <input type="number" id="first-name-vertical" class="form-control" name="rw" value="{{ $isEdit ? $rws->rw : '' }}"
                            placeholder="Masukkan Angka">
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">{{ $button }}</button>
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>