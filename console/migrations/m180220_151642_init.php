<?php

use yii\db\Migration;

class m180220_151642_init extends Migration
{
	public function up()
	{
		$tableOptions = null;

		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable('{{%currency}}', [
			'id' => $this->primaryKey(),
			'cid' => $this->integer(),
			'created' => $this->timestamp()->notNull()->defaultExpression('NOW()'),
			'updated' => $this->timestamp()->notNull()->defaultExpression('NOW()'),
			'title' => $this->string()->notNull()->unique(),
			'code' => $this->string(3)->notNull()->unique(),
		], $tableOptions);

		$this->createTable('{{%currency_rate}}', [
			'id' => $this->primaryKey(),
			'cid' => $this->integer(),
			'created' => $this->timestamp()->notNull()->defaultExpression('NOW()'),
			'updated' => $this->timestamp()->notNull()->defaultExpression('NOW()'),
			'date' => $this->dateTime()->notNull(),
			'currency_code_from' => $this->string(3)->notNull(),
			'currency_code_to' => $this->string(3)->notNull(),
			'value' => $this->decimal(16, 8),
		], $tableOptions);

		$this->createIndex('currency_rate_from_date_idx', '{{%currency_rate}}', ['date', 'currency_code_from']);
		$this->createIndex('currency_rate_to_date_idx', '{{%currency_rate}}', ['date', 'currency_code_to']);
		$this->addForeignKey('currency_rate_from_fk', '{{%currency_rate}}', 'currency_code_from', '{{%currency}}', 'code', 'CASCADE');
		$this->addForeignKey('currency_rate_to_fk', '{{%currency_rate}}', 'currency_code_to', '{{%currency}}', 'code', 'CASCADE');

		$this->createTable('{{%counterparty}}', [
			'id' => $this->primaryKey(),
			'cid' => $this->integer(),
			'created' => $this->timestamp()->notNull()->defaultExpression('NOW()'),
			'updated' => $this->timestamp()->notNull()->defaultExpression('NOW()'),
			'title' => $this->string()->notNull()->unique(),
			'description' => $this->string(),
		], $tableOptions);

		$this->createTable('{{%category}}', [
			'id' => $this->primaryKey(),
			'cid' => $this->integer(),
			'created' => $this->timestamp()->notNull()->defaultExpression('NOW()'),
			'updated' => $this->timestamp()->notNull()->defaultExpression('NOW()'),
			'lft' => $this->integer()->notNull(),
			'rgt' => $this->integer()->notNull(),
			'root' => $this->integer(),
			'level' => $this->integer()->notNull(),
			'title' => $this->string()->notNull()->unique(),
			'description' => $this->string(),
		], $tableOptions);

		$this->createTable('{{%account}}', [
			'id' => $this->primaryKey(),
			'cid' => $this->integer(),
			'created' => $this->timestamp()->notNull()->defaultExpression('NOW()'),
			'updated' => $this->timestamp()->notNull()->defaultExpression('NOW()'),
			'lft' => $this->integer()->notNull(),
			'rgt' => $this->integer()->notNull(),
			'root' => $this->integer(),
			'level' => $this->integer()->notNull(),
			'title' => $this->string()->notNull()->unique(),
			'counterparty_id' => $this->integer(),
			'description' => $this->string(),
			'currency_code' => $this->string(3),
			'balance' => $this->decimal(16, 4),
		], $tableOptions);

		$this->addForeignKey('account_counterparty_fk', '{{%account}}', 'counterparty_id', '{{%counterparty}}', 'id', 'CASCADE');
		$this->addForeignKey('account_currency_fk', '{{%account}}', 'currency_code', '{{%currency}}', 'code', 'CASCADE');

		$this->createTable('{{%transaction}}', [
			'id' => $this->primaryKey(),
			'cid' => $this->integer(),
			'created' => $this->timestamp()->notNull()->defaultExpression('NOW()'),
			'updated' => $this->timestamp()->notNull()->defaultExpression('NOW()'),
			'category_id' => $this->integer(),
			'account_id_from' => $this->integer(),
			'account_id_to' => $this->integer(),
			'value_from' => $this->decimal(16, 4),
			'value_to' => $this->decimal(16, 4),
		], $tableOptions);

		$this->addForeignKey('transaction_category_fk', '{{%transaction}}', 'category_id', '{{%category}}', 'id', 'CASCADE');
		$this->addForeignKey('transaction_account_from_fk', '{{%transaction}}', 'account_id_from', '{{%account}}', 'id', 'CASCADE');
		$this->addForeignKey('transaction_account_to_fk', '{{%transaction}}', 'account_id_to', '{{%account}}', 'id', 'CASCADE');
	}

	public function down()
	{
		$this->dropTable('{{%transaction}}');
		$this->dropTable('{{%account}}');
		$this->dropTable('{{%category}}');
		$this->dropTable('{{%counterparty}}');
		$this->dropTable('{{%currency_rate}}');
		$this->dropTable('{{%currency}}');
	}
}
