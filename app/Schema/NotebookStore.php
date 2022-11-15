<?php


namespace App\Schema;


/**
 * Class NotebookStore.
 *
 * @author  <eugene_1025@mail.ru>
 *
 * @OA\Schema(
 *     title="Notebook store",
 *     description="Notebook store",
 * )
 */

class NotebookStore
{
    /**
     * @OA\Property(
     *     default="",
     *     title="fio",
     *     description="fio",
     *     type="string"
     * )
     *
     * @var string
     */
    private $fio;

    /**
     * @OA\Property(
     *     default="",
     *     title="telephone",
     *     description="telephone",
     *     type="string"
     * )
     *
     * @var string
     */
    private $telephone;

    /**
     * @OA\Property(
     *     default="yy@ff.com",
     *     title="email",
     *     description="email",
     *     type="string"
     * )
     *
     * @var string
     */
    private $email;

    /**
     * @OA\Property(
     *     default="",
     *     format="date",
     *     description="datebirth",
     *     title="datebirth",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $datebirth;


    /**
     * @OA\Property(
     *     default="",
     *     title="img",
     *     description="img",
     *     type="string"
     * )
     *
     * @var string
     */
    private $img;

    /**
     * @OA\Property(
     *     default="",
     *     title="text",
     *     description="text",
     *     type="string"
     * )
     *
     * @var string
     */
    private $text;

}
