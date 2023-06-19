<?php

namespace App\Lib\Expenses;

use App\Models\V1\User;
use Exception;
use Carbon\Carbon;

class Validations {

    const MAX_LENGTH_DESCRIPTION = 191;

    public static function ValidRequest($request): void {
        if(isset($request->userId)){self::userExists($request->userId);}
        if(isset($request->description)){self::descriptionLenth($request->description);}
        if(isset($request->value)){self::valueIsNotNegative($request->value);}
        if(isset($request->expenseDate)){self::dateIsNotFuture($request->expenseDate);}
    }

    private static function userExists($id): void {
        try{
            User::findOrFail($id);
        }
        catch (\Exception $ex){
            throw new Exception('ID de usuário não existe.');
        }     
    }
    private static function descriptionLenth($description): void  {
        $lenth = strlen($description);
        if($lenth > self::MAX_LENGTH_DESCRIPTION){throw new Exception('Descrição com mais de 191 caracteres.');}
    }

    private static function valueIsNotNegative($value): void  {
        if($value < 0){throw new Exception('O valor informado não pode ser negativo.');}
    }

    private static function dateIsNotFuture($date): void  {
        $today = Carbon::now()->format('Y-m-d');
        $dateRequest = Carbon::parse($date)->format('Y-m-d');
        if($dateRequest > $today){throw new Exception('A data informada é maior qe o dia atual.');}
    }

}