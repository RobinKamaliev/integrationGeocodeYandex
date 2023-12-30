<?php

declare(strict_types=1);

namespace App\Http\Controllers\Documentation\Models;

/**
 *  * @OA\Post (
 *      path="/api/coordinates",
 *      tags={"Coordinates"},
 *      description="save coordinate",
 *      security={{"bearerAuth": {} }},
 *         @OA\RequestBody(
 *              required=true,
 *              @OA\JsonContent(
 *                  @OA\Property(property="latitude", type="float", example="52.12313"),
 *                  @OA\Property(property="longitude", type="float", example="32.1233"),
 *                  @OA\Property(property="user_id", type="int", example="1"),
 *              )
 *          ),
 *         @OA\Response(
 *              response=200,
 *              description="successful operation",
 *              @OA\JsonContent(
 *                  @OA\Property(property="data", type="object",
 *                      @OA\Property(property="message", type="string", example="задача поставлена"),
 *                  ),
 *             ),
 *          ),
 *      @OA\Response(
 *          response=401,
 *          description="['error' => 'Unauthenticated.']"),
 *      @OA\Response(
 *              response=404,
 *              description="not found",
 *              @OA\JsonContent(
 *                  @OA\Property(property="error", type="string", example="coordinate not created"),
 *             ),
 *          ),
 * )
 *
 *  * @OA\Get(
 *      path="/api/coordinates/{userId}",
 *      tags={"Coordinates"},
 *      summary="Retrieve coordinates by user ID",
 *      description="Retrieve coordinates within a specific time range with pagination",
 *      @OA\Parameter(
 *          name="userId",
 *          in="path",
 *          required=true,
 *          description="User ID",
 *          @OA\Schema(
 *              type="integer",
 *              format="int64"
 *          )
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          description="User coordinates data",
 *          @OA\JsonContent(
 *              @OA\Property(property="from_datetime", type="string", example="2023-01-01 00:00:00"),
 *              @OA\Property(property="to_datetime", type="string", example="2023-12-31 23:59:59"),
 *              @OA\Property(property="paginate", type="int", example=100)
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="object",
 *                  @OA\Property(property="longitude", type="string"),
 *                  @OA\Property(property="latitude", type="string"),
 *                  @OA\Property(property="address", type="string")
 *              ),
 *                  @OA\Property(property="pagination", type="object",
 *                       @OA\Property(property="total", type="integer"),
 *                       @OA\Property(property="per_page", type="integer"),
 *                       @OA\Property(property="current_page", type="integer"),
 *                       @OA\Property(property="last_page", type="integer"),
 *                       @OA\Property(property="from", type="integer"),
 *                       @OA\Property(property="to", type="integer"),
 *                       @OA\Property(property="path", type="string"),
 *                       @OA\Property(property="next_page_url", type="string", nullable=true),
 *                       @OA\Property(property="prev_page_url", type="string", nullable=true)
 *                   )
 *          )
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="Not found",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="object",
 *                  @OA\Property(property="error", type="string", example="user not found|sql")
 *              )
 *          )
 *      )
 *  )
 */
class Coordinate
{
}
