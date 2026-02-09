<?php

namespace pragmatic\translations\migrations;

use craft\db\Migration;

class m240902_000001_add_translation_groups extends Migration
{
    public function safeUp(): bool
    {
        $this->createTable('{{%pragmatic_translation_groups}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'dateCreated' => $this->dateTime()->notNull(),
            'dateUpdated' => $this->dateTime()->notNull(),
            'uid' => $this->uid(),
        ]);

        $this->insert('{{%pragmatic_translation_groups}}', [
            'name' => 'site',
            'dateCreated' => $this->db->getCurrentUTCDateTimeSQL(),
            'dateUpdated' => $this->db->getCurrentUTCDateTimeSQL(),
            'uid' => $this->db->generateUuid(),
        ]);

        return true;
    }

    public function safeDown(): bool
    {
        $this->dropTableIfExists('{{%pragmatic_translation_groups}}');
        return true;
    }
}
