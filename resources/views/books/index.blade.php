<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1> Search </h1>
    <a href="{{ route('home') }}" class="btn btn-primary"> Home </a>

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
    </form>
    @php
        $startIndex = ($books->currentPage() - 1) * $books->perPage();
    @endphp

    <h2>Books</h2>
    @foreach($books as $book)
    @php
        $hue = ($loop->index + $startIndex) * 5 % 360;
    @endphp
    <div style="margin: 5px; border: black 1px solid; padding: 10px; border-radius: 5px;
    background-color: hsl({{ $hue }}, 50%, 80%); box-shadow: 0px 8px 8px 4px #000000;">
        <p>{{ $book->title }} - {{ $book->authors->pluck('name')->implode(', ')}}</p>
        <p>category: {{ $book->categories->pluck('name')->implode(', ')}}</p>
        <p>Description: {{ $book->description ?? ''}}</p>
        <p>Published: {{ $book->publish_date ?? ''}}</p>
        <p>Average Price: ${{ $book->price ?? '' }}</p>
    </div>
    <br>
    @endforeach
    {{ $books->links('pagination::bootstrap-4') }}
</body>
</html>