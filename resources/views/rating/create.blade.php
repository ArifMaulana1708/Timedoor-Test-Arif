<!DOCTYPE html>
<html>

<head>
    <title>Input Rating</title>
    <style>
        button {
            background-color: #1E90FF;
            color: white;
            padding: 5px 15px;
            border: none;
            cursor: pointer;
        }
    </style>
    <script>
        function filterBooksByAuthor() {
            const authorId = document.getElementById('id_author').value;
            const allBooks = @json($books);

            const filtered = allBooks.filter(b => b.id_author == authorId);
            const bookSelect = document.getElementById('id_book');

            bookSelect.innerHTML = '';
            filtered.forEach(b => {
                const opt = document.createElement('option');
                opt.value = b.id_book;
                opt.textContent = b.book_title;
                bookSelect.appendChild(opt);
            });
        }
    </script>
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

    <h1>Input Rating</h1>

    <form method="POST" action="{{ url('/rating') }}">
        @csrf
        <label>Pilih Penulis:</label>
        <select name="id_author" id="id_author" onchange="filterBooksByAuthor()">
            <option value="">-- Pilih Penulis --</option>
            @foreach ($authors as $author)
                <option value="{{ $author->id_author }}">{{ $author->author_name }}</option>
            @endforeach
        </select>
        <br><br>

        <label>Pilih Buku:</label>
        <select name="id_book" id="id_book">
            <option value="">-- Pilih Buku --</option>
        </select>
        <br><br>

        <label>Rating:</label>
        <select name="rating_score">
            @for ($i = 1; $i <= 10; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <br><br>

        <button type="submit">Kirim</button>
    </form>
</body>

</html>
