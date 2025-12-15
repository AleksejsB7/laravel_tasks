<?php

namespace Testsproject\LaravelTasks\Http\Controllers;

use Illuminate\Http\Request;
use Testsproject\LaravelTasks\Models\Person;
use Testsproject\LaravelTasks\Http\Requests\StorePersonRequest;
use Testsproject\LaravelTasks\Http\Requests\UpdatePersonRequest;
use Testsproject\LaravelTasks\Http\Resources\PersonResource;

class PersonController
{
    // GET /api/people?q=...&sort=oldest
    public function index(Request $request)
    {
        $query = Person::query();

        // vienkāršs meklēšanas filtrs pēc name vai bio
        if ($request->filled('q')) {
            $q = $request->input('q');
            $query->where(function ($sub) use ($q) {
                $sub->where('name', 'like', '%' . $q . '%')
                    ->orWhere('bio', 'like', '%' . $q . '%');
            });
        }

        // vienkāršs sortings: newest (default) vai oldest
        if ($request->input('sort') === 'oldest') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        // pagination, default 10 per page
        $people = $query->paginate(10);

        return PersonResource::collection($people);
    }

    // POST /api/people
    public function store(StorePersonRequest $request)
    {
        $person = Person::create($request->validated());

        return new PersonResource($person);
    }


    // GET /api/people/{person}
    public function show(Person $person)
    {
        return new PersonResource($person);
    }

    // PATCH /api/people/{person}
    public function update(UpdatePersonRequest $request, Person $person)
    {
        $person->update($request->validated());

        return new PersonResource($person);
    }

    // DELETE /api/people/{person}
    public function destroy(Person $person)
    {
        $person->delete();

        return response()->json([
            'message' => 'Person deleted',
        ]);
    }
}
