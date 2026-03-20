<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1> Welcome, {{ auth()->user()->name }}</h1>
    <form method="POST" action="{{ route('logout') }}">
        <button type="submit">Logout</button>
    </form>
    <h2> Search Books</h2>
    <form method="GET" action="{{ url('/books') }}">
        <input type="text" name="title" placeholder="Search by title" value="{{ request('title') }}">
        <input type="text" name="author" placeholder="Search by author" value="{{ request('author') }}">
        <select name="category"> 
            <option value="">All categories</option>
          @foreach($categories as $category)
                <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
            @endforeach
        </select>
        <button type="submit">Search</button>
        </select>
    </form>
</body>
</html>