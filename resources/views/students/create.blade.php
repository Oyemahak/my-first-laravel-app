<!DOCTYPE html>
<html>
<head><title>Add Student</title></head>
<body>
    <h1>Add Student</h1>
    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        First Name: <input type="text" name="fname"><br>
        Last Name: <input type="text" name="lname"><br>
        Email: <input type="email" name="email"><br>
        <button type="submit">Save</button>
    </form>
</body>
</html>