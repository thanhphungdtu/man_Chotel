<?php

namespace App\Http\Controllers\Chotel;

use App\Http\Requests\Chotel\ContactRequest;
use App\Model\Chotel\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Chotel\Room;

class IndexController extends Controller
{
    public function __construct(Room $room)
        //$room = new Room(..);
       // $controller = new IndexController($room);
    {
        $this->room = $room;
    }

    //Trang chu
    public function getIndex()
    {
        //$a = $this->room;
        $listRoom = $this->room->getListRoom();
        //dd($listRoom);
        return view('chotel.index', compact('listRoom'));
    }

    // Xem chi tiet
    public function detail($id)
    {
        $roomDetail = $this->room->getDetail($id);
        //dd($roomDetail);
        $id = $roomDetail->rid;
        $type_id = $roomDetail->type_id;
        $relativeRoom = $this->room->getRelative($id, $type_id);
        //dd($relativeRoom);
        return view('chotel.detail', compact('roomDetail', 'relativeRoom'));
    }

    //
    public function getCategory($id)
    {
        //dd($id);
        $listRoom = $this->room->getRoomByCategory($id);
        //dd($listRoom);
        return view('chotel.cat', compact('listRoom'));
    }

    public function getAbout()
    {
        $about = DB::table('aboutus')
            ->select()
            ->first();
        return view('chotel.about', compact('about'));
    }

    public function getContact()
    {
        return view('chotel.contact');
    }

    public function postContact(ContactRequest $request)
    {
        $contact = new Contact();
        $contact->fullname = $request->full_name;
        $contact->email = $request->email;
        $contact->subject = $request->title;
        $contact->content = $request->description;
        $result = $contact->save();
        if ($result) {
            $request->session()->flash('msg', 'Cam on ban da phan hoi');

        }
        return redirect()->route('chotel.chotel.postContact');
    }

    public function getSearch(Request $request)
    {
        $search = $request->search;
        //dd($search);
        $listRoom = $this->room->search($search);
        //dd($listRoom);
        return view('chotel.search', compact('listRoom', 'search'));
    }

}
