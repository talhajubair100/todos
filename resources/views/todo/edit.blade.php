<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Edit Todo</title>
</head>
<body>
    <form action="{{ route('todos.update', $todo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="">
            <label for="name">Todo Title</label>
            <input type="text" name="title" value="{{ $todo->title }}">
            <p>{{ $errors->first('title') }}</p>
        </div>

        <div class="">
            <label for="name">Todo Description</label>
            <input type="text" name="description" value="{{ $todo->description }}">
            <p>{{ $errors->first('description') }}</p>
        </div>

        <div class="">
            <label for="name">Category</label>
            <select name="category_id" id="">
                @foreach($categories as $id => $value)
                <option value="{{ $id }}"@if($todo->category_id == $id) selected @endif>{{ $value }}</option>
                @endforeach
            </select>
        </div>


        <div class="">
            <label for="name">Status</label>
            <select name="status" id="">
                <option value="1"@if($todo->status == 1) selected @endif>Active</option>
                <option value="0"@if($todo->status == 0) selected @endif>In-Active</option>
            </select>
            <p>{{ $errors->first('status') }}</p>
        </div>

        <div class="">
            <label for="">Image</label>
            <input type="file" name="image" id="">
        </div>
        <div>
            <button type="submit">Save</button>
        </div>
    </form>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>