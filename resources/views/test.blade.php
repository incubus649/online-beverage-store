
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1 class="text-3xl font-bold">Listings</h1>
  <ul>
    <!-- show all categories 
    <a href="{ route('home') }}?category_id={ $category->id }}">
    -->
    @foreach($categories as $category)
      <li>
        {{ $category -> name }} ({{ $category -> id }})

        @foreach($category->children as $child)
          <li style="margin-left: 20px">
            {{ $child -> name }} ({{ $child -> id }})            
          </li>
        @endforeach
      </li>
    @endforeach

    <h1> --------- </h1>

    @foreach($test as $test1)
    <li>
      {{ $test1 }}
    </li>
  @endforeach
</ul>
</body>
</html>