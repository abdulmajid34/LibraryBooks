<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Admin;
use App\Models\ListBook;
use Illuminate\Http\Request;
use App\Models\BorrowedBook;
use DB;

class BorrowedController extends Controller
{
    public function index() {
        $data = DB::table('borrowed_books')
            ->join('user_admins', 'borrowed_books.UserAdmin_id', '=', 'user_admins.id')
            ->join('list_books', 'borrowed_books.ListBook_id', '=', 'list_books.id')
            ->get();
        // return $data;
        return view('borrowed-book', [
            'userList' => $data
        ]);
    }
    public function borrowedBook($id) {
        $reqData = array();
        $reqData = ListBook::find($id);
        $reqData->status = 'unavailable';
        $reqData->save();
        $data['ListBook_id'] = ListBook::find($id)->id;
        $data['UserAdmin_id'] = Auth::id();
        $data['created_at'] = new \DateTime();
        $data['updated_at'] = new \DateTime();
        BorrowedBook::insert($data);
        return redirect()->route('dashboard')->with('success', trans('message.msg-success-borrowBook'));
    }
    public function mylist() {
        $mylist = DB::table('borrowed_books')
        ->select('borrowed_books.*', 'list_books.title', 'list_books.genre', 'list_books.sinopsis', 'list_books.rating')
            ->where('UserAdmin_id', Auth::id())
            ->join('list_books', 'borrowed_books.ListBook_id', '=', 'list_books.id')
            ->get();
        return view('mylist-book', [
            'mylistBook' => $mylist
        ]);
    }
    public function returnBook($id) {
        $myListData = BorrowedBook::find($id);
        $bookId = $myListData->listBook_id;
        $getData = ListBook::find($bookId);
        $getData->status = 'available';
        $getData->save();
        $myListData->delete();
        return redirect()->route('dashboard')->with('success', trans('message.msg-success-returnBook'));
    }
}
