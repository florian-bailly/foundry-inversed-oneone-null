<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241224133553 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE account (id SERIAL NOT NULL, foo_id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7D3656A48E48560F ON account (foo_id)');
        $this->addSql('CREATE TABLE account_multiple_setting (id SERIAL NOT NULL, account_setting_id INT NOT NULL, foo_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4B00F69D12AE4FD6 ON account_multiple_setting (account_setting_id)');
        $this->addSql('CREATE INDEX IDX_4B00F69D8E48560F ON account_multiple_setting (foo_id)');
        $this->addSql('CREATE TABLE account_setting (id SERIAL NOT NULL, account_id INT NOT NULL, locale VARCHAR(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_565FACD09B6B5FBA ON account_setting (account_id)');
        $this->addSql('CREATE TABLE foo (id SERIAL NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A48E48560F FOREIGN KEY (foo_id) REFERENCES foo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE account_multiple_setting ADD CONSTRAINT FK_4B00F69D12AE4FD6 FOREIGN KEY (account_setting_id) REFERENCES account_setting (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE account_multiple_setting ADD CONSTRAINT FK_4B00F69D8E48560F FOREIGN KEY (foo_id) REFERENCES foo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE account_setting ADD CONSTRAINT FK_565FACD09B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE account DROP CONSTRAINT FK_7D3656A48E48560F');
        $this->addSql('ALTER TABLE account_multiple_setting DROP CONSTRAINT FK_4B00F69D12AE4FD6');
        $this->addSql('ALTER TABLE account_multiple_setting DROP CONSTRAINT FK_4B00F69D8E48560F');
        $this->addSql('ALTER TABLE account_setting DROP CONSTRAINT FK_565FACD09B6B5FBA');
        $this->addSql('DROP TABLE account');
        $this->addSql('DROP TABLE account_multiple_setting');
        $this->addSql('DROP TABLE account_setting');
        $this->addSql('DROP TABLE foo');
    }
}
