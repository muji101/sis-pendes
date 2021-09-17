<div class="container">
    <div class="col-6">
      <div class="card round">
        <div class="card-body bg-success round">
          <div class="row justify-content-between">
            <div class="col-2">
              <i style="font-size: 4rem;" class="fas fa-upload text-light"></i>
            </div>
            <div class="col-8">
             <h6 class="text-light"> Import File</h6>
              <form action="{{ route('importResident') }}" method="POST" enctype="multipart/form-data">
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
                  <strong class="fs-5 text-success fw-bold">
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
</script>

