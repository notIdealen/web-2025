CREATE TABLE IF NOT EXISTS
    post (
        id           INT UNSIGNED AUTO_INCREMENT,
        content      TEXT,
        created_at   DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
        created_by   INT UNSIGNED NOT NULL,
        like_counter INT UNSIGNED,
                     PRIMARY KEY(id)
    );

CREATE TABLE IF NOT EXISTS
    user (
        id          INT UNSIGNED AUTO_INCREMENT,
        name        VARCHAR(30) NOT NULL,
        lastname    VARCHAR(30) NOT NULL,
        quote       VARCHAR(255) DEFAULT "",
        image_path  VARCHAR(255) DEFAULT NULL,
        reg_date    DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
        folder_name VARCHAR(70) NOT NULL,
                    PRIMARY KEY(id)
    );

CREATE TABLE IF NOT EXISTS
    image (
        id         INT UNSIGNED AUTO_INCREMENT,
        created_by INT UNSIGNED NOT NULL,
        post_id    INT UNSIGNED NOT NULL,
        image_path VARCHAR(255) DEFAULT NULL,
                   PRIMARY KEY(id)
    );
    