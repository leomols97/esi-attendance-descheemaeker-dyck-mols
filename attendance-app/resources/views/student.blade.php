@extends('canevas')

@section('title', 'StudentList')

<?php $students = json_decode($students,true); ?>

@section ('content')
    <h1>Listes des étudiants</h1>
    @if(count($students)===0)
        <p>No student</p>
    @else
        <table>
            <tr><th>id</th><th>Last name</th><th>First name</th></tr>
            @foreach($students as $student)
                <tr>
                    <td><?=$student["id"]?></td>
                    <td><?=$student["last_name"]?></td>
                    <td><?=$student["first_name"]?></td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection
