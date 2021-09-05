{{-- <div class="container">
  <div class="my-4">
    <h6><strong> Untuk melakukan import data silahkan download template terlebih dahulu.</strong></h6>
  </div>
  <div class="row">
    <div class="col-6">
      <div class="card">
        <div class="card-body bg-info">
          <div class="row justify-content-between">
            <div class="col-2">
              <i style="font-size: 4rem;" class="fas fa-cloud-download-alt text-light"></i>
            </div>
            <div class="col-8">
             <h6 class="text-light"> Download Template</h6>
             <a href="{{ route('download-template-iq') }}" class="btn btn-sm bg-light px-5"><strong class="text-info">Download</strong></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-6">
      <div class="card">
        <div class="card-body bg-success">
          <div class="row justify-content-between">
            <div class="col-2">
              <i style="font-size: 4rem;" class="fas fa-cloud-upload-alt text-light"></i>
            </div>
            <div class="col-8">
             <h6 class="text-light"> Import File</h6>
              <form action="{{ route('import-soal.iq') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file"
                  id="file"
                  onchange="form.submit()"
                  class="d-none"
                  name="soal"
                  required
                  accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                />
                <button type="button" onclick="upload()" class="btn btn-sm bg-light px-5">
                  <strong class="text-success">
                  Pilih File
                </strong>
              </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
</div>

<script>
  function upload(){
    document.getElementById('file').click();
  }
</script>
<script>
  $('#up1').click(function(){
    $('#up2').click();
  })
</script> --}}
