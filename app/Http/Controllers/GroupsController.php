<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Groups;
use App\Models\Group_collaborators;
use App\Helpers;

class GroupsController extends Controller
{
    //post
    public function create(Request $request)
    {

        $cover = Helpers::uploadImage($request->file('imageGroup'), 'group' . date("Ymd") . rand(000, 999), 'resources/user/user_' . Auth::User()->id . '/groups/');

        if (!$cover) {
            $cover = "images/no-image.jpg";
        }
        $group = Groups::create([
            'name' => $request->input('nameGroup'),
            'description' => $request->input('descriptionGroup'),
            'image' => $cover,
            'creator_id' => Auth::User()->id,
            'admin_id' => Auth::User()->id,
            'state_id' => 1,
            'facebook' => $request->input('linkFacebook'),
            'twitter' => $request->input('linkTwitter'),
            'linkedin' => $request->input('linkLinkedin'),
            'instagram' => $request->input('linkInstagram'),
        ]);
        $this->saveCollaborators($request->input('collaborators'), $group);


        return redirect()->back();

    }

    private function saveCollaborators($collaborators, $group)
    {
        $collaborators = explode(",", $collaborators);
        foreach ($collaborators as $collaborator) {
            Group_collaborators::create([
                'groups_id' => $group->id,
                'user_id' => $collaborator
            ]);
        }
    }

    private function updateCollaborators($collaborators, $group)
    {
        Group_collaborators::where("groups_id", $group->id)->delete();
        $this->saveCollaborators($collaborators, $group);
    }

    private function deleteCollaborators($group)
    {
        Group_collaborators::where("groups_id", $group->id)->delete();
    }


    public function show($groupId)
    {

        $group = Groups::findOrFail($groupId);

        return view('groups/group', compact('group'));
    }

    public function update(Request $request)
    {
        $cover = Helpers::uploadImage($request->file('imageGroup'), 'group' . date("Ymd") . rand(000, 999), 'resources/user/user_' . Auth::User()->id . '/groups/');

        if (!$cover) {
            $cover = "";
        }
        $group = Groups::find($request->input('group_id'));
        $group->update([
            'name' => $request->input('nameGroup'),
            'description' => $request->input('descriptionGroup'),
            'image' => $cover,
            'facebook' => $request->input('linkFacebook'),
            'twitter' => $request->input('linkTwitter'),
            'linkedin' => $request->input('linkLinkedin'),
            'instagram' => $request->input('linkInstagram'),
        ]);

        $this->updateCollaborators($request->input('collaborators'), $group);

        return redirect()->back();

    }

    public function delete(Request $request)
    {
        $group = Groups::find($request->input('group_id'));
        $this->deleteCollaborators($group);
        $group->delete();

        return redirect()->back();
    }

    public function filter(Request $request)
    {
        $filter = $request->input('filter');
        $groups = Groups::where('name', 'like', '%$filter%')->paginate(12);
        return view('groups/list', compact('groups', 'filter'));
    }

}
