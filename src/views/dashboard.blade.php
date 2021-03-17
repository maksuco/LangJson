<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LangJson {{config('app.name')}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/maksuco/maksucocss@master/public/assets/maksucocss.css">
</head>
<body class="bg-light">
    <main role="main" class="container">
 
      <div class="pt-4 pb-5 text-center">
        <h2>LangJson</h2>
        <p class="lead">
        @foreach($langs as $lang)
          <span class="text-uppercase">{{$lang}}:</span> {{count($files[$lang])}} keys | 
        @endforeach
          <span class="text-uppercase">APP:</span> {{count($app_files)}} keys | 
          ->the idea are that this counts are realtime using vue</p>
        <p class="lead"><span class="text-danger">Missing Keys: 54 404 Keys 97 Un-translated</span></p>
        <a href="#" class="btn btn-secondary btn-sm">Show un-translated</a>
        <a href="#" class="btn btn-secondary btn-sm">Show missing in files</a>
        <a href="#" class="btn btn-secondary btn-sm">Show missing in app</a>
        <button type="button" class="btn btn-danger btn-sm">Erase from files all unused keys</button>
      </div>
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <div class="input-group pr-1">
              <input type="text" class="form-control form-control-lg" placeholder="Search keys in files">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">X</button>
              </div>
            </div>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">key_name</h6>
                <small class="text-muted">first translation</small>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-danger">
                <h6 class="my-0">Key name</h6>
                <small>missing in en</small>
              </div>
              <span class="text-danger text-bold">!</span>
            </li>
          </ul>
 
          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Key name">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Add Key</button>
              </div>
            </div>
          </form><br>
            <button type="button" class="btn btn-primary btn-lg mt-30">Save all changes</button>
            <p>On submit just POST each lang file in json, for example en = json data</p>
        </div>
        <div class="col-md-8 order-md-1">
          <form action="{{route('langjson_post')}}" method="post">
          @csrf
            <div class="row">
              <div class="col-12 mb-2">
                <h4 class="text-dark">key name <span class="text-danger text-capitalize">Missing in files!</span> <a href="delete" class="btn btn-danger btn-sm float-right">X</a></h4>
                <hr>
              </div>
              <div class="col-md-12 mb-4">
                <h5 class="text-uppercase">en</h5>
                <textarea class="form-control" id="en" name="en" placeholder="">something</textarea>
              </div>
 
              <div class="col-md-12 mb-4">
                <h5 class="text-uppercase">es <span class="text-danger text-capitalize">!</span></h5>
                <textarea class="form-control" id="es" name="es" placeholder=""></textarea>
              </div>
 
            </div>
 
 
          </form>
        </div>
      </div>
 
    </main>

@php
    var_dump($files,$app_files,$langs)
@endphp

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">Made with love by</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="https://maksuco.com">Maksuco</a></li>
        </ul>
      </footer>
  <script>
  
  </script>
</body>
</html>