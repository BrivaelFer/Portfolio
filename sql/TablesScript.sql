CREATE TABLE IF NOT EXISTS langage(
    id_lang INT PRIMARY KEY auto_increment,
    name_lang VARCHAR(50) NOT NULL UNIQUE,
    lev_lang INT NOT NULL,
    img_lang VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS entreprise(
    id_entr INT PRIMARY KEY auto_increment,
    name_entr VARCHAR(50) NOT NULL,
    adr_entr VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS orga_formation(
    id_orga INT PRIMARY KEY auto_increment,
    name_orga VARCHAR(50) NOT NULL,
    ville_orga VARCHAR(50) NOT NULL,
    codep_orga VARCHAR(50) NOT NULL,
    adr_orga VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS formation(
    id_form INT PRIMARY KEY auto_increment,
    inti_form VARCHAR(255) NOT NULL,
    start_date_form DATE NOT NULL,
    end_date_form DATE NOT NULL,
    form_end BOOLEAN NOT NULL,
    desc_form TEXT NOT NULL,
    id_orga_form INT NOT NULL,
    FOREIGN KEY(id_orga_form) REFERENCES orga_formation(id_orga)
);

CREATE TABLE IF NOT EXISTS experience(
    id_exp INT PRIMARY KEY auto_increment,
    titre_exp VARCHAR(50) NOT NULL,
    start_exp DATE NOT NULL UNIQUE,
    end_exp DATE NOT NULL UNIQUE,
    tache_exp VARCHAR(500) NOT NULL,
    id_entr_exp INT NOT NULL,
    FOREIGN KEY (id_entr_exp) 
    REFERENCES entreprise (id_entr)
);

CREATE TABLE IF NOT EXISTS projet(
    id_projet INT PRIMARY KEY auto_increment,
    titre_projet VARCHAR(50) NOT NULL UNIQUE,
    text_projet VARCHAR(500) NOT NULL,
    img_projet VARCHAR(50) NOT NULL UNIQUE,
    id_exp_projet INT NULL,
    id_form_projet INT NULL,
    FOREIGN KEY (id_exp_projet) REFERENCES experience (id_exp),
    FOREIGN KEY (id_form_projet) REFERENCES formation(id_form)
);

CREATE TABLE IF NOT EXISTS utilise(
    id_ut INT PRIMARY KEY auto_increment,
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

