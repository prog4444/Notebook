<?php

namespace App\Http\Controllers;

use App\Models\Notebook;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NoteBookController extends Controller
{
    /**
     * @OA\Post(
     ** path="/api/v1/notebook",
     *   tags={"Notebook"},
     *   summary="add notebook",
     *
     *  @OA\Parameter(
     *      name="full_name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="company",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *       name="phone",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="date_of_birth",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
  *      @OA\Parameter(
     *      name="photo",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="file"
     *      )
     *   ),
     *   @OA\Response(
     *      response=201,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
    public function create(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|string',
            'company' => 'required|string',
            'phone' =>  'required|string|min:9|max:12',
            'email' => 'required|string',
            'date_of_birth' => 'string',
        ]);
      

        $user = Notebook::create([
            'full_name' => $request->full_name,
            'company' => $request->company,
            'phone' =>  $request->phone,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
         

        ]);
 
        return response()->json(['message' => 'save'], 200);
    }
 

        /**
     * @OA\post(
     ** path="/api/v3/notebook/{id}",
     *   tags={"Notebook"},
     *   summary="update notebook",
     *
     *    @OA\Parameter(
     *      name="id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
   *  @OA\Parameter(
     *      name="full_name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="company",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *       name="phone",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="date_of_birth",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
  *      @OA\Parameter(
     *      name="photo",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=201,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
  
    public function update(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'full_name' => 'required|string',
            'company' => 'required|string',
            'phone' =>  'required|string|min:9|max:12',
            'email' => 'required|string',
            'date_of_birth' => 'nullable',
            'photo' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],


        ]);
      
        $notebook = Notebook::find($request->id);
        $notebook->full_name = $input['full_name'];
        $notebook->company = $input['company'];
        $notebook->phone = $input['phone'];
        $notebook->email = $input['email'];
    
       
        $notebook->save();
      
 
        return response()->json(['message' => 'update'], 200);
       
    }
    
     /**
     * @OA\get(
     ** path="/api/v2/notebook",
     *   tags={"Notebook"},
     *   summary="get notebook",
     *   @OA\Response(
     *      response=201,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
    public function info() 
    {

     $notebook = Notebook::all();
     return response()->json(['message' => $notebook], 200);

    }

      /**
     * @OA\Get(
     *  summary="get info by id",
     *  path="/api/v5/notebook/{id}",
     *  tags={"Notebook"},
     * security={{"bearerAuth":{}}},
     * @OA\Parameter(name="id", required=true, in="query", @OA\Schema(type="integer")),
     * @OA\Response(response="200", description="List orders."),
     *  @OA\Response(response=401, description="Unauthorized"),
     * @OA\Response(response=404, description="Not Found")
     * )
     */

     public function edit(Request $request)
     {
         return Notebook::findOrFail($request->id);
     }

     /**
     * @OA\delete(
     ** path="/api/v4/notebook/{id}",
     *   tags={"Notebook"},
     *   summary="delete notebook",
     *
     *    @OA\Parameter(
     *      name="id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *   @OA\Response(
     *      response=201,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
    public function delete(Request $request)
    {
        return Notebook::destroy($request->id);
    }
}
