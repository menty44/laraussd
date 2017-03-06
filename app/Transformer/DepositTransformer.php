<?php

namespace App\Transformer;

class DepositTransformer {

    public function transform($account) {
        return [
            'id' => $account->id,
            //'name' => $account->name,
            //'type' => $account->type,
            'balance' => $account->balance,
            //'created_at' => $account->created_at,
            'updated_at' => $account->updated_at
            //'task_description' => account->description


        ];
    }

}
