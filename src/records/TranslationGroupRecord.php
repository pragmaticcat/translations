<?php

namespace pragmatic\translations\records;

use craft\db\ActiveRecord;

class TranslationGroupRecord extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%pragmatic_translation_groups}}';
    }
}
