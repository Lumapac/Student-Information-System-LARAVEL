<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjectList = Subject::all();

        $authUserRole = Auth::user()->role;
        if ($authUserRole == 0) {
            return view('admin.subject.table', compact('subjectList'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {



        $data = $request->validated();
        $subject = Subject::create($data);

        return redirect()->route('subject.list', [$subject->id])
            ->with('success', 'Subject created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subject = Subject::where('id', $id)->firstOrFail();
        return view('admin.subject.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subject = Subject::findOrFail($id);
        return view('admin.subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, string $id)
    {
        $subject = Subject::where('id', $id)->firstOrFail();
        $data = $request->validated();

        $subject->update($data);

        return redirect()->route('subject.view', [$subject->id])
            ->with('success', 'Subject updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = Subject::where('id', $id)->first();

        if (!$subject) {
            return redirect()->route('subject.list')->with([
                'confirmationMessage' => 'Subject not found!',
                'alertType' => 'danger'
            ]);
        }

        $subject->delete();

        return redirect()->route('subject.list')->with([
            'confirmationMessage' => 'Subject deleted successfully!',
            'alertType' => 'success'
        ]);
    }
}
