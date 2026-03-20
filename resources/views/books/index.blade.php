<h1> Search </h1>

    <form method="GET" action="{{ url('/books') }}">
        <input type="text" name="title" placeholder="Search by title" value="{{ request('title') }}">
        <input type="text" name="author" placeholder="Search by author" value="{{ request('author') }}">
        <select name="category"> 
            <option value="">All categorys</option>
            @foreach($categories as $category)
                <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
            @endforeach
        </select>
        <button type="submit">Search</button>
    </form>

    <h2>Books</h2>
    @foreach($books as $book)
    <div style="margin: 5px; border: black 1px solid; padding: 10px; border-radius: 5px;
    background-color: hsl({{ $loop->index*20 }}, 50%, 80%); box-shadow: 0px 8px 8px 4px #000000;">
        <p>{{ $book->title }} - {{ $book->author }}</p>
        <p>category: {{ $book->category }}</p>
        <p>Description: {{ $book->description ?? ''}}</p>
        <p>Published: {{ $book->publish_date ?? ''}}</p>
    </div>
    <br>
    @endforeach
