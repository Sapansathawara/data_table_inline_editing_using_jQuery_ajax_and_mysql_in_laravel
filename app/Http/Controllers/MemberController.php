<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Category;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        $categories = Category::all();

        // echo "<pre>";
        // print_r($members);
        // die();

        return view('index', compact('members', 'categories'));
    }
    public function members_submit(Request $request)
    {
        // echo "<pre>";
        // print_r($request->post());
        // die();

        $model = new Member();
        $model->first_name = $request->post('first_name');
        $model->last_name = $request->post('last_name');
        $model->contact_number = $request->post('contact_number');
        $model->email = $request->post('email');
        $model->category_id = $request->post('category_id');
        $model->status = 1;

        $model->save();
        return response()->json(['status' => 1, 'msg' => 'Member Inserted', 'data' => $model]);
    }

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);
        $member->update($request->all());

        return response()->json(['status' => 1, 'msg' => 'Member data has been updated successfully.', 'data' => $member]);
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return response()->json(['status' => 1, 'msg' => 'Member data has been deleted successfully.']);
    }
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');
        Member::whereIn('id', $ids)->delete();

        return response()->json(['status' => 1, 'msg' => 'Selected members have been deleted successfully.']);
    }
}
