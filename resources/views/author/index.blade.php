<!DOCTYPE html>
<html>

<head>
    <title>Top 10 Penulis</title>
    <style>
        button {
            background-color: #1E90FF;
            color: white;
            padding: 5px 15px;
            border: none;
            cursor: pointer;
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

    <h1>Top 10 Penulis Terpopuler</h1>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Nama Penulis</th>
            <th>Jumlah Voter</th>
        </tr>
        @foreach ($authors as $author)
            <tr>
                <td>{{ $author->author_name }}</td>
                <td>{{ $author->voter_count }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
