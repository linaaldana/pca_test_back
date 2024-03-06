<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240306061202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE VIEW
        view_estadistica AS
       SELECT a.nombre AS aerolinea, COUNT(r.id) AS reservas
       FROM reserva r
       INNER JOIN vuelo v ON r.vuelo_id = v.id
       INNER JOIN aerolinea a ON v.aerolinea_id = a.id
       GROUP BY a.nombre 
       ORDER BY reservas DESC;');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP VIEW view_estadistica');
    }
}
