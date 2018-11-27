<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LangJson {{config('app.name')}}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
</head>
<body class="bg-light pt-5">
 
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
 
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Add key</a>
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-primary">Scan</button>
          </li>
          <li class="nav-item px-1">
            <button type="button" class="btn btn-danger">Erase unused keys</button>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <button type="button" class="btn btn-primary my-2 my-sm-0">Save</button>
        </form>
      </div>
    </nav>
 
    <main role="main" class="container">
 
    <div class="py-5 text-center">
        <h2>LangJson</h2>
        <p class="lead"><span class="text-danger">Mising Keys: 54 404 Keys 97 Un-translated</span><a href="#" class="btn btn-secondary btn-sm">Show un-translated</a></p>
      </div>
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <div class="input-group pr-1">
              <input type="text" class="form-control form-control-lg" placeholder="Search">
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
          </form>
        </div>
        <div class="col-md-8 order-md-1">
          <form action="{{route('langjson_post')}}" method="post">
          @csrf
            <div class="row">
              <div class="col-12 mb-2">
                <h4 class="text-dark">key name</h4>
                <hr>
              </div>
              <div class="col-md-12 mb-4">
                <h5 class="text-uppercase">en</h5>
                <textarea class="form-control" id="en" name="en" placeholder="">something</textarea>
              </div>
 
              <div class="col-md-12 mb-4">
                <h5 class="text-uppercase">es <span class="text-danger text-capitalize">Missing!</span></h5>
                <textarea class="form-control" id="es" name="es" placeholder=""></textarea>
              </div>
 
              <div class="col-12">
                <button type="button" class="btn btn-primary btn-lg my-2 my-sm-0">Save</>
              </div>
 
            </div>
 
 
          </form>
        </div>
      </div>
 
    </main>
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">Made with love by</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="https://maksuco.com">Maksuco</a></li>
        </ul>
      </footer>
</body>
</html>