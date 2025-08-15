<!DOCTYPE html>
<html>

<head>
    <title>Top 10 Penulis</title>
</head>

<body>
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
