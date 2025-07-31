<!DOCTYPE html>
<html>
<head><title>Edit Student</title></head>
<body>
    <h1>Edit Student</h1>
    <form method="POST" action="{{ route('students.update', $student->id) }}">
        @csrf @method('PUT')
        First Name: <input type="text" name="fname" value="{{ $student->fname }}"><br>
        Last Name: <input type="text" name="lname" value="{{ $student->lname }}"><br>
        Email: <input type="email" name="email" value="{{ $student->email }}"><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>