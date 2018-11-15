<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181113172357 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article CHANGE title title VARCHAR(255) NOT NULL, CHANGE content content LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE article RENAME INDEX fk_article_1_idx TO IDX_23A0E6612469DE2');
        $this->addSql('ALTER TABLE category CHANGE name name VARCHAR(100) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article CHANGE title title VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, CHANGE content content TEXT DEFAULT NULL COLLATE latin1_swedish_ci');
        $this->addSql('ALTER TABLE article RENAME INDEX idx_23a0e6612469de2 TO fk_article_1_idx');
        $this->addSql('ALTER TABLE category CHANGE name name VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci');
    }
}
