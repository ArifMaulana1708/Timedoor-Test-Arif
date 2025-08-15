<!-- resources/views/books/index.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Book List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
        }

        .pagination li {
            margin: 0 2px;
        }

        .pagination li a,
        .pagination li span {
            display: block;
            padding: 5px 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-decoration: none;
            color: #007bff;
            font-size: 12px;
        }

        .pagination li.active span {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .pagination li.disabled span {
            color: #ccc;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        button {
            background-color: #1E90FF;
            color: white;
            padding: 5px 15px;
            border: none;
            cursor: pointer;
        }

        select,
        input[type=text] {
            padding: 3px;
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <div style="margin-bottom: 1rem;">
        <a href="{{ url('/') }}">
            <button type="button">📚 Book</button>
        </a>
        <a href="{{ url('/author') }}">
            <button type="button">✍ Author</button>
        </a>
        <a href="{{ url('/rating/create') }}">
            <button type="button">⭐ Create Rating</button>
        </a>
    </div>
    <form method="GET" action="{{ url('/book') }}">
        <label>List shown :</label>
        <select name="limit">
            @foreach ([10, 20, 30, 40, 50, 60, 70, 80, 90, 100] as $num)
                <option value="{{ $num }}" {{ request('limit', 10) == $num ? 'selected' : '' }}>
                    {{ $num }}</option>
            @endforeach
        </select>

        <label>Search :</label>
        <input type="text" name="search" value="{{ request('search') }}">

        <button type="submit">SUBMIT</button>
    </form>

    <br>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Book Name</th>
                <th>Category Name</th>
                <th>Author Name</th>
                <th>Average Rating</th>
                <th>Voter</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $index => $book)
                <tr>
                    <td>{{ $loop->iteration + ($books->currentPage() - 1) * $books->perPage() }}</td>
                    <td>{{ $book->book_title }}</td>
                    <td>{{ $book->category->category_name }}</td>
                    <td>{{ $book->author->author_name }}</td>
                    <td>{{ number_format($book->ratings_avg_score, 2) }}</td>
                    <td>{{ $book->ratings_count ?? 0 }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center;">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br>
    {{-- {{ $books->appends(request()->query())->links() }} --}}
    <div class="text-sm">
        {{ $books->appends(request()->query())->links('vendor.pagination.default') }}

    </div>


</body>

</html>
