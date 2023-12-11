<?php

return [
    'student.students' => [
        'index' => 'student::students.list resource',
        'create' => 'student::students.create resource',
        'edit' => 'student::students.edit resource',
        'destroy' => 'student::students.destroy resource',
    ],
    'student.departments' => [
        'index' => 'student::departments.list resource',
        'create' => 'student::departments.create resource',
        'edit' => 'student::departments.edit resource',
        'destroy' => 'student::departments.destroy resource',
    ],
    'student.groups' => [
        'index' => 'student::groups.list resource',
        'create' => 'student::groups.create resource',
        'edit' => 'student::groups.edit resource',
        'destroy' => 'student::groups.destroy resource',
    ],
// append



];
