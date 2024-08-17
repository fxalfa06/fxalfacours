CREATE TABLE utilisateurs (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    date_inscription TIMESTAMP DEFAULT NOW()
);

CREATE TABLE cours (
    id SERIAL PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description TEXT,
    niveau VARCHAR(20), -- Basique, Avancé, Personnalisé
    type VARCHAR(20) -- Cours, Atelier, Webinaire
);

CREATE TABLE inscriptions (
    id SERIAL PRIMARY KEY,
    utilisateur_id INTEGER REFERENCES utilisateurs(id),
    cours_id INTEGER REFERENCES cours(id),
    date_inscription TIMESTAMP DEFAULT NOW(),
    progression INTEGER DEFAULT 0
);

CREATE TABLE commentaires (
    id SERIAL PRIMARY KEY,
    utilisateur_id INTEGER REFERENCES utilisateurs(id),
    cours_id INTEGER REFERENCES cours(id),
    contenu TEXT,
    date_commentaire TIMESTAMP DEFAULT NOW()
);

CREATE TABLE notes (
    id SERIAL PRIMARY KEY,
    utilisateur_id INTEGER REFERENCES utilisateurs(id),
    cours_id INTEGER REFERENCES cours(id),
    note INTEGER,
    date_notation TIMESTAMP DEFAULT NOW()
);