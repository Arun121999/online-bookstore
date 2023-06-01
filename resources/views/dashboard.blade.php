<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-2" id="successMessage" style="display: none;"></div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Title</th>
                            <th>Author(s)</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>
                                    @foreach ($book->authors as $author)
                                        {{ $author->name }}<br>
                                    @endforeach
                                </td>
                                <td>{{ $book->category->name }}</td>
                                <td>{{ $book->description }}</td>
                                <td>
                                    <form class="send-notification-form" data-book-id="{{ $book->id }}">
                                        @csrf
                                        <button type="button" class="btn btn-primary send-notification-btn">Send Notification</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
