CREATE TABLE IF NOT EXISTS langage(
    id_lang int PRIMARY KEY auto_increment,
    name_lang VARCHAR(50) NOT NULL UNIQUE,
    lev_lang INT NOT NULL
);

CREATE TABLE IF NOT EXISTS entreprise(
    id_entr PRIMARY KEY auto_increment,
    name_entre VARCHAR(50) NOT NULL UNIQUE,
    adr_entr VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS experience(
    id_exp PRIMARY KEY auto_increment,
    titre_exp VARCHAR(50) NOT NULL,
    start_exp DATE NOT NULL UNIQUE,
    end_exp DATE NOT NULL UNIQUE,
    tache_exp VARCHAR(500) NOT NULL,
    id_entr_exp INT NOT NULL,
    FOREIGN KEY (id_entr_exp) 
    REFERENCES entreprise (id_entr)
);

CREATE TABLE IF NOT EXISTS projet(
    id_projet PRIMARY KEY auto_increment,
    titre_projet VARCHAR(50) NOT NULL UNIQUE,
    text_projet VARCHAR(500) NOT NULL,
    img_projet VARCHAR(50) NOT NULL UNIQUE,
    id_exp_projet INT NULL,
    FOREIGN KEY (id_exp_projet)
    REFERENCES experience (id_exp)
);

CREATE TABLE IF NOT EXISTS utilise(
    id_ut PRIMARY KEY auto_increment,
    id_lang_ut INT NOT NULL,
    id_exp_ut INT NULL,
    id_projet_ut INT NULL,
    FOREIGN KEY (id_lang_ut)
    REFERENCES langage (id_lang),
    FOREIGN KEY (id_exp_ut)
    REFERENCES experience (id_exp),
    FOREIGN KEY (id_projet_ut)
    REFERENCES projet (id_projet)
);

