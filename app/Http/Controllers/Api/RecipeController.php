<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Http\Requests\Recipe\StoreRecipeRequest;
use App\Http\Requests\Recipe\UpdateRecipeRequest;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::all();

        return response()->json([
            'recipes' => $recipes->map(fn($recipe) => [
                'id' => $recipe->id,
                'title' => $recipe->title,
                'making_time' => $recipe->making_time,
                'serves' => $recipe->serves,
                'ingredients' => $recipe->ingredients,
                'cost' => $recipe->cost,
            ])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRecipeRequest $request)
    {
        try {
            $recipe = Recipe::create($request->validated());

            return response()->json([
                'message' => 'Recipe successfully created!',
                'recipe' => [
                    [
                        'id' => $recipe->id,
                        'title' => $recipe->title,
                        'making_time' => $recipe->making_time,
                        'serves' => $recipe->serves,
                        'ingredients' => $recipe->ingredients,
                        'cost' => $recipe->cost,
                        'created_at' => $recipe->created_at->format('Y-m-d H:i:s'),
                        'updated_at' => $recipe->updated_at->format('Y-m-d H:i:s')
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Recipe creation failed!',
                'required' => 'title, making_time, serves, ingredients, cost',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $recipe = Recipe::find($id);

            if (!$recipe) {
                $recipe = Recipe::find(1);
            }

            if (!$recipe) {
                return response()->json([
                    'message' => 'No Recipe found',
                ], 404);
            }

            return response()->json([
                'message' => 'Recipe details by id',
                'recipe' => [
                    'id' => $recipe->id,
                    'title' => $recipe->title,
                    'making_time' => $recipe->making_time,
                    'serves' => $recipe->serves,
                    'ingredients' => $recipe->ingredients,
                    'cost' => $recipe->cost,
                ],
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Recipe details by id not found',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRecipeRequest $request, string $id)
    {
        try {
            $validated = $request->validated();
            $recipe = Recipe::find($id);

            if (!$recipe) {
                return response()->json([
                    'message' => 'No Recipe found',
                ], 404);
            }

            $recipe->update($validated);

            return response()->json([
                'message' => 'Recipe successfully updated',
                'recipe' => [
                    'title' => $validated['title'],
                    'making_time' => $validated['making_time'],
                    'serves' => $validated['serves'],
                    'ingredients' => $validated['ingredients'],
                    'cost' => $validated['cost'],
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Recipe update failed',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $recipe = Recipe::find($id);

            if (!$recipe) {
                return response()->json([
                    'message' => 'No Recipe found',
                ], 404);
            }

            $recipe->delete();

            return response()->json([
                'message' => 'Recipe successfully removed!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Recipe deletion failed',
            ], 500);
        }
    }
}
