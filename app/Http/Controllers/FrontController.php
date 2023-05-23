<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Category;
use App\Models\Flight;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    function contact()
    {
        return view('front.contact');
    }

    function test_db()
    {
        // dump("TEST DB");

        // select * from users where email = 1681645908@example.com limit 1
        $users = DB::table('users')->where('email', '1681645908@example.com')->first();

        $users = DB::select('select id, name from users where id > ?', [30]);

        $users = DB::table('users')->get(); // select * from users

        // select * from users where name = jhon
        $users = DB::table('users')->orderBy('id', 'desc')->where('name', 'jhon2')->get();

        $users = DB::table('users')->paginate(); // select * from users limit 10 offset 0

        // dd($users[0]);

        return view('front.test_db', compact('users'));
    }

    function test_model()
    {
        $users = User::get();

        $users = User::where('email', 'admin@admin.com')->first();

        $users = User::where('id', '>', 5)->select(['id', 'name'])->get();

        $users = User::orderBy('id', 'desc')->get();

        $users = User::paginate(5);

        // dd($users[0]);

        return view('front.test_db', compact('users'));
    }

    function flights()
    {
        $flights = Category::get();

        dd($flights);

        return view('front.test_db', compact('flights'));
    }
}
