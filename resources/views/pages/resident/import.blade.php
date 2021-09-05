<div class="container">
  {{-- <div class="my-4">
    <h6><strong> Untuk melakukan import data silahkan download template terlebih dahulu.</strong></h6>
  </div> --}}
  {{-- <div class="row">
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
    </div> --}}
    
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


{{-- <!DOCTYPE html>
<html>
<head>
  <title>Laravel 8 Import Export Excel and CSV File To Database Example Tutorial - Tutsmake.com</title>
 
  <meta name="csrf-token" content="{{ csrf_token() }}">
 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
</head>
<body>
 
<div class="container mt-5">
 
   
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
 
  <div class="card">
 
    <div class="card-header font-weight-bold">
      <h2 class="float-left">Import Export Excel, CSV File In Laravel 8 - Tutsmake.com</h2>
      <h2 class="float-right">
        <a href="{{url('export-excel-csv-file/xlsx')}}" class="btn btn-success mr-1">Export Excel</a>
        <a href="{{url('export-excel-csv-file/csv')}}" class="btn btn-success">Export CSV</a></h2>
    </div>
 
    <div class="card-body">
 
        <form id="excel-csv-import-form" method="POST"  action="{{ route('importResident') }}" accept-charset="utf-8" enctype="multipart/form-data">
 
          @csrf
            <div class="col-lg-6 col-md-12">
              <p>With Icon And Button Color</p>
              <div class="form-file">
                  <input type="file" class="form-file-input" id="customFile">
                  <label class="form-file-label" for="customFile">
                      <span class="form-file-text">Choose file...</span>
                      <span class="form-file-button btn-primary "><i
                              data-feather="upload"></i></span>
                  </label>
                  @error('file')
                        <div class="alert alert-light mt-1 mb-1">{{ $message }}</div>
                  @enderror
              </div>
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
            </div>
        </form>
    </div>
  </div>
 
</div>  
</body>
</html> --}}