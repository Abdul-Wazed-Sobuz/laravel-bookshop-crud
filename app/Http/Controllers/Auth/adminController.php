<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Demo_mail;
use App\Models\Account;
use App\Models\Addbook;
use App\Models\AdminProfile;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use JetBrains\PhpStorm\NoReturn;



class adminController extends Controller
{
    //

    function adminList(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $admins = Account::all();
        return view('admin.adminList',['admins'=>$admins]);
    }

    function addBookPage(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.addBook');
    }

    function addBook(Request $req): \Illuminate\Http\RedirectResponse
    {
        $validated = $req->validate(
            [
                'title'=>"required",
                'author'=>"required|max:20|regex:/^[a-z ,.'-]+$/i",
                'image'=>'required|mimes:png,jpg,jpeg,gif|max:2048',
                'date'=>'required'
            ]
        );

        $imageName = '';
        if($image = $req->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/books',$imageName);
        }

        $book = new Addbook();

        $book->title = $req->title;
        $book->author = $req->author;
        $book->image = $imageName;
        $book->date = $req->date;
        $book->save();


        return redirect()->back()->with('success', 'Book added successfully.');
    }

    function books(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $books = Addbook::all();
        return view('layouts.bookList',['books'=>$books]);
    }

    function bookList(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $books = Addbook::paginate(5);
        return view('admin.bookDetails',['books'=>$books]);
    }

    function updateBook($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $book = Addbook::findorFail($id);
//        return $book;
        return view('admin.updateBook',compact('book'));
    }

    function bookUpdate( Request $req, $id): \Illuminate\Http\RedirectResponse
    {
        $book = Addbook::findorFail($id);
        $validated = $req->validate(
            [
                'date'=>'required'
            ]
        );

        $imageName = '';
        $deleteOldImage = 'images/books/' .$book->image;
        if($image = $req->file('image')){
            if(file_exists(public_path($deleteOldImage))){
                \Illuminate\Support\Facades\File::delete($deleteOldImage);
            }
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/books',$imageName);
        }

        else{
            $imageName = $book->image;
        }

//        $book = new Addbook();
//
        $book->title = $req->title;
        $book->author = $req->author;
        $book->image = $imageName;
        $book->date = $req->date;
        $book->save();

//        Addbook::where('id',$id)->update([
//            'title'=>$req->title,
//            'author'=> $req->author,
//            'image'=> $imageName,
//            'date'=> $req>date,
//
//        ]);

        return redirect()->back()->with('success', 'Book updated successfully.');
//        return view('admin.updateBook',compact('book'))->with('success', 'Book updated successfully.');
    }

    function deleteBook($id): \Illuminate\Http\RedirectResponse
    {
        $book = Addbook::findorFail($id);

        $deleteOldImage = 'images/books/' .$book->image;
        if($book->image) {
            if(file_exists(public_path($deleteOldImage))){
                \Illuminate\Support\Facades\File::delete($deleteOldImage);
            }
        }

        $book->delete();

        return redirect()->back()->with('success', 'Book deleted successfully.');
//        return view('admin.bookDetails',compact('book'))->with('success', 'Book deleted successfully.');
    }

    function mail(): void
    {
        Mail::to('bookshop@gmail.com')->send(new Demo_mail('team'));
    }

    function profilePage(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.profileEdit');
    }

    function editProfile(Request $req): \Illuminate\Http\RedirectResponse
    {
        $validated = $req->validate(
            [
                'username'=>"required|max:20|regex:/^[a-z ,.'-]+$/i",
                'email'=>'required|email1',
                'phone'=>'required|regex:/^[0-9]{11}',
                'address'=>'required',
                'dob'=>'required',
                'gender'=>'required',
                'image'=>'required|mimes:png,jpg,jpeg,gif|max:2048',

            ]
        );

//        $admin= Account::where('email', $req->email)->first();

        $imageName = '';
        if($image = $req->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/books',$imageName);
        }


        $profile = new AdminProfile();

        $profile->username = $req->username;
        $profile->email = $req->email;
        $profile->phone = $req->phone;
        $profile->address = $req->address;
        $profile->dob = $req->dob;
        $profile->gender = $req->gender;
        $profile->image = $imageName;
        $profile->save();

        return redirect()->back()->with('success', 'Book added successfully.');
    }
}
