<!DOCTYPE html>
<html>
<head>
    <title>New Book Notification</title>
</head>
<body>
    <h2>New Book Added</h2>

    <p>Hello {{ $user->name }},</p>

    <p>A new book titled "{{ $book->title }}" has been added to our collection.</p>

    <p>Here are some details about the book:</p>

    <ul>
        <li>Title: {{ $book->title }}</li>
        <li>Author(s): 
            @foreach ($book->authors as $author)
                {{ $author->name }}
            @endforeach
        </li>
        <li>Category: {{ $book->category->name }}</li>
        <li>Description: {{ $book->description }}</li>
    </ul>

    <p>Thank you for being a part of our community!</p>
</body>
</html>
