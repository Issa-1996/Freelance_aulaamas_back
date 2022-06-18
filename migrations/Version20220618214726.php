<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220618214726 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, model_id INT DEFAULT NULL, user_id INT DEFAULT NULL, numero_commande VARCHAR(255) NOT NULL, type_commande VARCHAR(255) NOT NULL, nom_commande VARCHAR(255) NOT NULL, avance VARCHAR(255) DEFAULT NULL, relicat VARCHAR(255) DEFAULT NULL, date_commande VARCHAR(255) NOT NULL, prix VARCHAR(255) DEFAULT NULL, INDEX IDX_6EEAA67D7975B7E7 (model_id), INDEX IDX_6EEAA67DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE depense (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, libelle VARCHAR(255) DEFAULT NULL, prix VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, date VARCHAR(255) NOT NULL, INDEX IDX_34059757A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, libelle VARCHAR(255) DEFAULT NULL, prix VARCHAR(255) DEFAULT NULL, description_model VARCHAR(255) DEFAULT NULL, images VARCHAR(255) DEFAULT NULL, cathegorie VARCHAR(255) DEFAULT NULL, INDEX IDX_D79572D9A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) NOT NULL, epaule VARCHAR(255) DEFAULT NULL, manche_client VARCHAR(255) DEFAULT NULL, epaule_client VARCHAR(255) DEFAULT NULL, cou_client VARCHAR(255) DEFAULT NULL, longueur_bras_client VARCHAR(255) DEFAULT NULL, longueur_pantalon_client VARCHAR(255) DEFAULT NULL, cuisse_client VARCHAR(255) DEFAULT NULL, hanche_client VARCHAR(255) DEFAULT NULL, tour_de_bras_client VARCHAR(255) DEFAULT NULL, tour_de_taille_client VARCHAR(255) DEFAULT NULL, manche_protrine VARCHAR(255) DEFAULT NULL, manche_protrine_client VARCHAR(255) DEFAULT NULL, ceinture_client VARCHAR(255) DEFAULT NULL, type_de_tissu_client VARCHAR(255) DEFAULT NULL, taille_tissu_client VARCHAR(255) DEFAULT NULL, couleur_tissu_client VARCHAR(255) DEFAULT NULL, poignet_machet_client VARCHAR(255) DEFAULT NULL, bras_client VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D649450FF010 (telephone), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D7975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE depense ADD CONSTRAINT FK_34059757A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D7975B7E7');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DA76ED395');
        $this->addSql('ALTER TABLE depense DROP FOREIGN KEY FK_34059757A76ED395');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D9A76ED395');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE depense');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE user');
    }
}
