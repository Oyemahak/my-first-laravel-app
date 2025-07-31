<!DOCTYPE html>
<html>
<head><title>Student Details</title></head>
<body>
    <h1>{{ $student->fname }} {{ $student->lname }}</h1>
    <p>Email: {{ $student->email }}</p>
    <a href="{{ route('students.index') }}">Back to list</a>
</body>
</html>