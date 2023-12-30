<?php

declare(strict_types=1);

namespace App\Http\Controllers\Documentation;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Catalog  Products",
 *      description="
 * Для получения доступа к запросам нужно  получить токен (auth).
 * Полученный токен сохранить в authorize.",
 * )
 *
 * @OA\Compontents(
 *
 *      @OA\SecurityScheme(
 *          securityScheme="bearerAuth",
 *          type="http",
 *          scheme="bearer"
 *      )
 *)
 *
 * @OA\Post(
 *        path="/api/auth/register",
 *        tags={"Authentication"},
 *        summary="Register a new user",
 *        description="Registers a new user with the provided information",
 *        @OA\RequestBody(
 *            required=true,
 *            description="User registration data",
 *            @OA\JsonContent(
 *                @OA\Property(property="password", type="string", example="123123123"),
 *                @OA\Property(property="email", type="string", example="addas@mail.ru")
 *            )
 *        ),
 *        @OA\Response(
 *              response=200,
 *              description="successful operation",
 *              @OA\JsonContent(
 *                  @OA\Property(property="data", type="object",
 *                      @OA\Property(property="access_token", type="string"),
 *                      @OA\Property(property="refreshToken", type="string"),
 *                  ),
 *             ),
 *        ),
 *        @OA\Response(
 *              response=404,
 *              description="successful operation",
 *              @OA\JsonContent(
 *                  @OA\Property(property="data", type="object",
 *                      @OA\Property(property="error", type="string", example="User not created"),
 *                  ),
 *             ),
 *        ),
 *  )
 *
 * @OA\Post(
 *         path="/api/auth/login",
 *         tags={"Authentication"},
 *         summary="Register a new user",
 *         description="Registers a new user with the provided information",
 *         @OA\RequestBody(
 *             required=true,
 *             description="User registration data",
 *             @OA\JsonContent(
 *                 @OA\Property(property="email", type="string", example="addas@mail.ru"),
 *                 @OA\Property(property="password", type="string", example="123123123"),
 *             )
 *         ),
 *         @OA\Response(
 *             response=200,
 *             description="successful operation",
 *             @OA\JsonContent(
 *                 @OA\Property(property="data", type="object",
 *                     @OA\Property(property="access_token", type="string"),
 *                     @OA\Property(property="refreshToken", type="string"),
 *                 ),
 *            ),
 *         ),
 *         @OA\Response(
 *             response=401,
 *             description="http unauthorized",
 *             @OA\JsonContent(
 *                 @OA\Property(property="error", type="string", example="Unauthorized"),
 *            ),
 *         ),
 *   )
 */
class Documentation
{
}
