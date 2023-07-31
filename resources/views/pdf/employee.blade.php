<!DOCTYPE html>
<html>

<head>
    <title>Employee Information</title>
    <style>
        * {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif';
 font-size: 10pt;
        }

        h1 {
            font-size: 22pt;
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <p style="text-align: center; margin-bottom: 18pt">
        <img src="{{ public_path('images/logo.png') }}" style="width: 200px;" alt=""> <br><br>
        {{-- <strong style="font-size: 16pt">MDC Cooperative Inc.</strong> <br> --}}
        Botique Store<br>
        Dao, Tagbilaran, Bohol <br>
        Tel. No.:(038) 508 8638
    </p>

    <h1 style="padding-bottom: 10pt; border-bottom: 1px solid #333">Employee Information</h1>

    <table>
        <tr>
            <th>Employee ID</th>
            <td>{{ $employee->id }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $employee->lname }}, {{ $employee->fname }} {{ $employee->age }}</td>
        </tr>
        <tr>
            &nbsp; &nbsp; &nbsp;<th>Department</th>
            <td>{{ $employee->department }}</td>
        </tr>

        <tr>
            <th>Year Level</th>
            <td>{{ $employee->year_level }}</td>
        </tr>
    </table>

    <hr>

    <table style="width: 100%">
        <thead style="background-color: #000000; color: white;">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Job</th>
                <th>Year</th>
            </tr>
        </thead>
    </table>
</body>

</html>
