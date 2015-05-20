<?php namespace App\Http\Controllers\WebPanel\Panel;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = User::all();

        return view('templates.'.\Config::get('webpanel.template').'webpanel.panel.users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('templates.'.\Config::get('webpanel.template').'webpanel.panel.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\PanelUserRequest $request)
	{
        $input = $request->all();

        $user = User::create($input);
        $user->password = bcrypt($request->input('password'));
        $user->save();


        if($request->input('role_list') == null)
        {
            $role_list = array();
        }
        else
        {
            $role_list = $request->input('role_list');
        }

        $this->SyncRoles($user, $role_list);

        return redirect()->route('webpanel.panel.users.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return redirect()->route('webpanel.panel.users.edit',$id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $user = User::find($id);
        return view('templates.'.\Config::get('webpanel.template').'webpanel.panel.users.edit',compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $user = User::find($id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $user = User::find($id);

        $user->delete();
        return redirect()->route('webpanel.panel.users.index');
	}


    /**
     * Sync the Server List
     *
     * @param User $user
     * @param array $roles
     */
    private function SyncRoles(User $user, $roles = array())
    {
        $user->roles()->sync($roles);
    }

}