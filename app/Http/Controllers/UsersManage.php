<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Enums\Comment\Status as CommentStatus;
use App\Http\Requests\Comments\Store as StoreRequest;
use App\Enums\Comment\Types as CommentTypes;
use App\Http\Requests\FirstMustBeAdminRequest;
use App\Models\Role;
use App\Models\User;

class UsersManage extends Controller
{
    public function index()
    {
        $roles = Role::pluck('role', 'id');
        // $roles = Role::orderBy('role')->get();
        // $users = User::whereDoesntHave('roles', function ($query) {
        //     $query->where('role', '=', 'admin');
        // })
        $users = User::with('roles')->paginate(30);

        return view('users.index', compact('roles', 'users'));
    }

    public function manage(Request $request, string $id)
    {
        $data = $request->validate([
            'roles' => 'required',
            "user_id" => 'required',
        ]);

        $userId = intval($data['user_id']);
        $roles = $data['roles'];
        if ($userId === 1 && !in_array(1, $roles)) {
            return redirect()->back()->with('notification', 'users.first_user_admin_always');
        } // rf to request 


        $user = User::findOrFail($id);
        $user->roles()->sync($data["roles"]);
        return redirect()->route('users.index')->with('notification', 'users.roles_updated');
    }

    // public function edit($id)
    // {
    //     $comment = Comment::with("commentable")->find($id);
    //     return view('comments.edit', ['comment' => $comment]);
    // }

    // public function destroy($id)
    // {
    //     $comment = Comment::findOrFail($id);
    //     $comment->delete();
    //     return redirect()->back();
    // }

    // public function restore($id)
    // {
    //     Comment::onlyTrashed()->findOrFail($id)->restore();
    //     return redirect()->back();
    // }

    // public function approve($id)
    // {
    //     $comment = Comment::findOrFail($id);
    //     $comment->update(["status" => CommentStatus::APPROVED]);
    //     return redirect()->back();
    // }

    // public function decline($id)
    // {
    //     $comment = Comment::findOrFail($id);
    //     $comment->update(["status" => CommentStatus::REJECTED]);
    //     return redirect()->back();
    // }

    // public function new()
    // {
    //     $comments = Comment::with('commentable')->where("status", CommentStatus::MODERATION)->where("deleted_at", "=", null)->get();
    //     return view('comments.index', [
    //         'comments' => $comments,
    //     ]);
    // }

    // public function store(StoreRequest $request)
    // {
    //     $data = $request->validated();

    //     $modelName = CommentTypes::fromName($request->safe()->for)->value;

    //     $essence = $modelName::findOrFail($data['id']);

    //     if ($essence->comments()->count() >= 5) {
    //         return redirect()
    //             ->back()
    //             ->withErrors(['comments_limit' => 'Reached the maximum number of comments for this post.']);
    //     }

    //     $data = $request->safe()->only(['nickname', 'body']);

    //     $model = $modelName::findOrFail($request->safe()->id);
    //     $model->comments()->create($data);
    //     session()->flash('notification', 'comments.create');
    //     return redirect()->back();
    // }
}
