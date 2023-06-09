<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Actions\Admin\Role\FetchRole;
use App\Actions\Admin\Doctor\FetchDoctor;
use App\Http\Requests\StoreDoctorRequest;
use App\Actions\Admin\Doctor\FetchDoctors;
use App\Actions\Admin\Doctor\UpdateDoctor;
use App\Http\Requests\UpdateDoctorRequest;
use App\Actions\Admin\Doctor\RegisterNewDoctor;

class DoctorController extends Controller
{
    private $fetchRoles;
    private $fetchDoctors;
    private $fetchDoctor;
    private $updateDoctor;

    public function __construct(FetchRole $fetchRoles, FetchDoctors $fetchDoctors, FetchDoctor $fetchDoctor, UpdateDoctor $updateDoctor)
    {
        $this->fetchRoles = $fetchRoles;
        $this->fetchDoctors = $fetchDoctors;
        $this->fetchDoctor = $fetchDoctor;
        $this->updateDoctor = $updateDoctor;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = $this->fetchDoctors->handle();
        return view('admin.doctor.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = $this->fetchRoles->execute();

        return view('admin.doctor.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request, RegisterNewDoctor $registerNewDoctor)
    {
        //
        $data = $request->validated();

        $user = rescue(function () use ($data, $registerNewDoctor) {
            return $registerNewDoctor->handle($data);
        });

        if (!$user) {
            return redirect()->back()->with('error', 'Error adding doctor');
        }
        return redirect()->route("doctor.create")->with('message', 'Doctor added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $user = $this->fetchDoctor->handle($id);
        $roles = $this->fetchRoles->execute();

        return view('admin.doctor.edit', compact(['user', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, $id)
    {
        //
        $data =  $request->validated();

        $user = $this->fetchDoctor->handle($id);

        $this->updateDoctor->handle($data, $user);

        return redirect()->route("doctor.index")->with('success', 'Doctor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
