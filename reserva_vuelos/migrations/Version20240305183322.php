<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240305183322 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aerolinea (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vuelo (id INT AUTO_INCREMENT NOT NULL, aerolinea_id INT NOT NULL, origen VARCHAR(255) NOT NULL, destino VARCHAR(255) NOT NULL, fecha_salida VARCHAR(255) NOT NULL, fecha_llegada VARCHAR(255) NOT NULL, precio INT NOT NULL, INDEX IDX_B608E375781B6133 (aerolinea_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vuelo ADD CONSTRAINT FK_B608E375781B6133 FOREIGN KEY (aerolinea_id) REFERENCES aerolinea (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vuelo DROP FOREIGN KEY FK_B608E375781B6133');
        $this->addSql('DROP TABLE aerolinea');
        $this->addSql('DROP TABLE vuelo');
    }
}
