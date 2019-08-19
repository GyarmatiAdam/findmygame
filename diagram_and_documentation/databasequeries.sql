CREATE TABLE categories (
    cat_id int NOT NULL AUTO_INCREMENT,
    cat_type varchar(100),
    PRIMARY KEY (cat_id)
);

CREATE TABLE users (
    user_id int NOT NULL AUTO_INCREMENT,
    first_name varchar(100),
    last_name varchar(100),
    username VARCHAR (100),
    email VARCHAR(200),
    dob date,
    pass VARCHAR (255),
    image_path varchar(255),
    user_role int,
    user_status VARCHAR (50),
    PRIMARY KEY (user_id)
);

CREATE TABLE events (
    event_id int NOT NULL AUTO_INCREMENT,
    fk_cat_id int,
    fk_user_id int,
    event_name VARCHAR (155),
    event_type VARCHAR (100),
    event_desc text,
    event_date DATETIME,
    event_location VARCHAR (255),
    PRIMARY KEY (event_id),
    FOREIGN KEY (fk_cat_id) REFERENCES categories(cat_id),
    FOREIGN KEY (fk_user_id) REFERENCES users(user_id)
);

CREATE TABLE comments (
    comment_id int NOT NULL AUTO_INCREMENT,
    fk_user_id int,
    comment_title VARCHAR (100),
    comment_text text,
    comment_date TIMESTAMP,
    PRIMARY KEY (comment_id),
    FOREIGN KEY (fk_user_id) REFERENCES users(user_id)
);

CREATE TABLE groups (
    group_id int NOT NULL AUTO_INCREMENT,
    fk_cat_id int,
    fk_comment_id int,
    group_name VARCHAR (150),
    group_desc text,
    vacancy_number int,
    vacancy_desc text,
    PRIMARY KEY (group_id),
    FOREIGN KEY (fk_cat_id) REFERENCES categories(cat_id),
    FOREIGN KEY (fk_comment_id) REFERENCES comments(comment_id)
);

CREATE TABLE grusers (
    gruser_id int NOT NULL AUTO_INCREMENT,
    fk_group_id int,
    fk_user_id int,
    gruser_status varchar (155),
    PRIMARY KEY (gruser_id),
    FOREIGN KEY (fk_group_id) REFERENCES groups(group_id),
    FOREIGN KEY (fk_user_id) REFERENCES users(user_id)
);