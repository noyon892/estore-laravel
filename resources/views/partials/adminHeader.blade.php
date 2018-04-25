<nav class="navbar navbar-defult">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{route('admindashboard')}}">Home<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="{{route('product.create')}}">Add Product<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="{{route('product.index')}}">All Product </a></li>
        <li><a href="/admindashboard/create">Add Admin </a></li>
		<li><a href="{{route('user.index')}}">Users </a></li>
    <li><a href="/product/soldPendings">Sold Pendings</a></li>
    <li><a href="/product/productSold">Sold product</a></li>

    <form method="post" action="/admindashboard/search" class="navbar-form navbar-left">
      <div class="form-group">
        <input type="text" class="form-control" id="search" name="search" placeholder="Search">
      </div>
      <button type="submit" id="submit" class="btn btn-default">Submit</button>
    </form>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>