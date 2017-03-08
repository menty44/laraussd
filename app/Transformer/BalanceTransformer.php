<?php

/**
 * Author: oluoch
 * URL: www.blaqueyard.com
 * twitter: http://twitter.com/menty44
 * fred.oluoch@blaqueyard.com
 */

namespace App\Transformer;

class BalanceTransformer {

    public function transform($account) {
        return [
            'id' => $account->id,
            //'name' => $account->name,
            //'type' => $account->type,
            'balance' => $account->balance,
            'created_at' => $account->created_at,
            'updated_at' => $account->updated_at
            //'task_description' => account->description


        ];
    }

}
