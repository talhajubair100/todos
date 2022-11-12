<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>



    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-7">
              <div class="card rounded-3">
                <div class="card-body p-4">
      
                  <h4 class="text-center my-3 pb-3">Category </h4>
      
                  <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                    <div class="col-12">
                      <div class="form-outline">
                        <label class="form-label" for="form1">Create Categorirs</label>
                      </div>
                    </div>
      
                    <div class="col-12">
                      <a class="btn btn-primary" href="{{ route('categories.create') }}">Create</a>
                    </div>
      
                  </form>
      
                  <table class="table mb-4">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">edit</th>
                        <th scope="col">Delete</th>

                      </tr>
                    </thead>
                    <tbody>
      
                        @foreach($categories as $category)
                        
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></td>
                            <td>
                                @if ($category->status==1)
                                    Active
                                @else
                                    Inactive
                                @endif
                            </td>

                            <td>
                                <a class="btn btn-success ms-1" href="{{ route('categories.edit',$category->id) }}">Edit</a>
                            </td>

                            <td>
                                <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>


                        </tr>
                        @endforeach
                      
                      
                    </tbody>
                  </table>
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>