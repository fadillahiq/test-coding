<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Paginator::useBootstrap();
        $employees = Employee::with('position')->latest()->paginate(10);

        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::orderBy('position', 'ASC')->get();
        return view('employee.create', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:64',
            'email' => 'required|max:50|email|unique:employees',
            'age' => 'integer|required',
            'id_position' => 'required|integer',
            'salary' => 'required|integer'
        ]);

        $data = $request->all();
        Employee::create($data);

        return redirect()->route('employee.index')->with('success', 'Data employee berhasil ditambahkan !');
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
        $positions = Position::orderBy('position', 'ASC')->get();
        $employee = Employee::findOrFail($id);

        return view('employee.edit', compact('employee', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|max:64',
            'email' => 'required|max:50|email|unique:employees,email,'.$employee->id,
            'age' => 'integer|required',
            'id_position' => 'required|integer',
            'salary' => 'required|integer'
        ]);

        $data = $request->all();
        $employee->update($data);

        return redirect()->route('employee.index')->with('success', 'Data employee berhasil diperbarui !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employee.index')->with('success', 'Data employee berhasil dihapus !');
    }
}
