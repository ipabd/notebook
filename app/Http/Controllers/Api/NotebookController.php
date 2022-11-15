<?php

namespace App\Http\Controllers\Api;

use App\Models\Notebook;
use App\Http\Requests\NotebookRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class NotebookController extends Controller
{
    /**
     * @OA\Get(
     *    path="/api/v1/notebook",
     *    operationId="index",
     *    tags={"Notebook All"},
     *    summary="Get all notebook for REST API",
     *    description="Get list of notebook",
     *    @OA\Parameter(name="limit", in="query", description="limit", required=false,
     *        @OA\Schema(type="integer")
     *    ),
     *    @OA\Parameter(name="page", in="query", description="the page number", required=false,
     *        @OA\Schema(type="integer")
     *    ),
     *    @OA\Parameter(name="order", in="query", description="order  accepts 'asc' or 'desc'", required=false,
     *        @OA\Schema(type="string")
     *    ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example="200"),
     *             @OA\Property(property="data",type="object")
     *          )
     *       )
     *  )
     */


    public function index()
    {
        try {
            $limit = request()->limit ?: 15;
            $order = request()->order == 'asc' ? 'asc' : 'desc';
            $model = Notebook::orderBy('datebirth', $order)->paginate($limit);
            return response()->json(['status' => 200, 'data' => $model]);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'message' => $e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/v1/notebook",
     *     operationId="notebookCreate",
     *     tags={"Store"},
     *     summary="Create yet another notebook record",
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *         @OA\JsonContent(ref="#/components/schemas/NotebookStore"),
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/NotebookStore")
     *     )
     * )
     */


    public function store(NotebookRequest $request)
    {
        try {
            $model = new Notebook();
            $model->fill($request->all());
            $model->save();
            return response()->json(['status' => 201, 'data' => $model]);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'message' => $e->getMessage()]);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/v1/notebook/{id}",
     *     tags={"Show "},
     *     description="For valid response try integer IDs with value >= 1  Notebook values will generated exceptions",
     *     operationId="notebookShow",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of pet that needs to be fetched",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *             minimum=1
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/NotebookShow"),
     *         @OA\MediaType(
     *             mediaType="application/xml",
     *             @OA\Schema(ref="#/components/schemas/NotebookShow")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Notebook not found"
     *     )
     * )
     */

    public function show($id)
    {
        try {
            $model = Notebook::query()->findOrFail($id);
            return response()->json(['status' => 200, 'data' => $model]);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'message' => $e->getMessage()]);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/v1/notebook/{id}",
     *     operationId="NotebookUpdate",
     *     tags={"Update"},
     *     summary="Update Notebook by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of Notebook",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *         @OA\JsonContent(ref="#/components/schemas/NotebookShow")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/NotebookStore")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid Notebook supplied"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Notebook not found"
     *     ),
     * )
     */

    public function update(Request $request, $id)
    {
        try {
            $params = $request->all();
            $model = Notebook::query()->findOrFail($id);
            $model->fill($params);
            $model->save();
            return response()->json(['status' => 200, 'data' => $model]);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'message' => $e->getMessage()]);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/notebook/{id}",
     *     tags={"Delete"},
     *     summary="Delete purchase notebook by ID",
     *     description="For valid response try integer IDs with positive integer value. Negative or non-integer values will generate API errors",
     *     operationId="NotebookDelete",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the notebook that needs to be deleted",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *             minimum=1
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="notebook not found"
     *     )
     * ),
     */
    public function destroy($id)
    {
        try {
            $model = Notebook::query()->findOrFail($id);
            $model->delete();
            return response()->json(['data' => null, 'status' => 200, 'data' => []]);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'message' => $e->getMessage()]);
        }
    }
}
