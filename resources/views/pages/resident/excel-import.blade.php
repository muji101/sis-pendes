<form  method="POST"  action="{{ route('importResident') }}" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
            <p>
                Pastikan anda sudah memiliki template file download
                <a href="{{ route('residents.template') }}">disini</a>
            </p>
            <div class="form-file">
                <input type="file" name="file" class="form-file-input" id="customFile">
                <label class="form-file-label" for="customFile">
                    <span class="form-file-text">Choose file...</span>
                    <span class="form-file-button btn-primary "><i
                            data-feather="upload"></i></span>
                </label>
            </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary me-1 mb-1">Create</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</form>