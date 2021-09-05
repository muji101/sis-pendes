<!DOCTYPE html>
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
                   
            <div class="row">
 
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="file" name="file" placeholder="Choose file">
                    </div>
                    @error('file')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>              
  
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                </div>
            </div>     
        </form>
 
    </div>
 
  </div>
 
</div>  
</body>
</html>