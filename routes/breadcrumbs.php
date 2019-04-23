<?php
/**
 * Created by PhpStorm.
 * User: Kyle_Staples
 * Date: 4/1/19
 * Time: 10:59 AM
 */

// Directory
Breadcrumbs::for('test', function ($trail) {
    $trail->push('Directory', route('test'));
});


// Admin
Breadcrumbs::for('admin', function ($trail) {
    //$trail->parent('test');
    $trail->push('Admin', route('admin.index'));
});

    // User Group
    Breadcrumbs::for('usergroup', function ($trail) {
        $trail->parent('admin');
        $trail->push('User Group', route('admin.usergroup.index'));
    });

    // Create Usergroup
    Breadcrumbs::for('create usergroup', function ($trail) {
        $trail->parent('usergroup');
        $trail->push('Create', route('admin.usergroup.create'));
    });

    //global
    Breadcrumbs::for('global', function ($trail) {
        $trail->parent('admin');
        $trail->push('Global User Group', route('admin.global.index'));
    });

    //Create Global
    Breadcrumbs::for('create global', function ($trail) {
        $trail->parent('global');
        $trail->push('Create', route('admin.global.create'));
    });

    //Master Courses
    Breadcrumbs::for('Master Courses', function ($trail) {
        $trail->parent('admin');
        $trail->push('Courses', route('admin.courses.index'));
    });

    //Master Courses Create
    Breadcrumbs::for('create master', function ($trail) {
        $trail->parent('Master Courses');
        $trail->push('Create', route('admin.courses.create'));
    });

// Professor
Breadcrumbs::for('professor', function ($trail) {
    //$trail->parent('test');
    $trail->push('Professor', route('professor.index'));
});

    // View Class
    Breadcrumbs::for('courses', function ($trail) {
        $trail->parent('professor');
        $trail->push('My Courses', route('professor.courses.index'));
    });

    // Class Name
    Breadcrumbs::for('course name', function ($trail, $course) {
        $trail->parent('courses');
        $trail->push($course, route('professor.courses.index'));
    });

    // Make class
    Breadcrumbs::for('create course', function ($trail) {
        $trail->parent('courses');
        $trail->push('Create', route('professor.courses.create'));
    });

// Student
Breadcrumbs::for('student', function ($trail) {
    $trail->parent('test');
    $trail->push(\Illuminate\Support\Facades\Auth::user()->userName, route('student.index'));
});

    // Classes
    Breadcrumbs::for('student courses', function ($trail) {
        $trail->parent('student');
        $trail->push('My Courses', route('student.courses.index'));
    });

    // Enroll
    Breadcrumbs::for('student enroll', function ($trail) {
        $trail->parent('student courses');
        $trail->push('Enroll', route('student.courses.index'));
    });
/*
// Home > About
Breadcrumbs::for('about', function ($trail) {
    $trail->parent('home');
    $trail->push('About', route('about'));
});

// Home > Blog
Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});
*/
?>
