@extends('canevas')

@section('title', 'CourseList')

<?php $courses = json_decode($courses,true); ?>

@section ('content')
    <h1>Courses List</h1>
    @if(count($courses)===0)
        <p>No student</p>
    @else
        <table>
            <tr><th>course</th><th>date</th><th>hour</th></tr>
            @foreach($courses as $course)
                <tr>
                    <td><?=$course["course"]?></td>
                    <td><?=$course["date"]?></td>
                    <td><?=$student["hour"]?></td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection
