<!DOCTYPE html>
<html>
<head><title>Students</title></head>
<body>
    <h1>All Students</h1>
    <a href="{{ route('students.create') }}">Add Student</a>
    <ul>
        @foreach ($students as $student)
            <li>
                <a href="{{ route('students.show', $student->id) }}">
                    {{ $student->fname }} {{ $student->lname }}
                </a>
                | <a href="{{ route('students.edit', $student->id) }}">Edit</a>
                <form method="POST" action="{{ route('students.destroy', $student->id) }}" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>