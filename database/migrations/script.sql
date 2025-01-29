-- PhewCloud DB

CREATE TABLE users (
    id CHAR(36) NOT NULL DEFAULT (UUID()),
    username VARCHAR(60) NOT NULL UNIQUE,
    name VARCHAR(100),
    description VARCHAR(400),
    reminding VARCHAR(100),
    -- storage_limit BIGINT NOT NULL DEFAULT 10737418240, -- Varsayılan 10 GB (10,737,418,240 byte)
    -- storage_used BIGINT NOT NULL DEFAULT 0
    password VARCHAR(255) NOT NULL,  -- Field to store hashed passwords
    image VARCHAR(250),
    bannerImage VARCHAR(250),
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE roles (
    id CHAR(36) NOT NULL DEFAULT (UUID()),
    name VARCHAR(60) NOT NULL,
    normalized_name VARCHAR(60) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE (name),
    UNIQUE (normalized_name)
);

-- düzenlencek

CREATE TABLE files (
    id CHAR(36) NOT NULL DEFAULT (UUID()),  -- Dosya için benzersiz kimlik
    userId CHAR(36) NOT NULL,              -- Dosyayı yükleyen kullanıcı ID'si
    name VARCHAR(255) NOT NULL,            -- Dosya adı
    type VARCHAR(100),                     -- Dosya türü (ör. pdf, jpg, png, mp4)
    size BIGINT NOT NULL,                  -- Dosya boyutu (bayt cinsinden)
    url VARCHAR(500) NOT NULL,             -- Dosyanın saklandığı yerin URL'si
    folderId CHAR(36),                     -- Dosyanın bulunduğu klasörün ID'si (root klasör için NULL olabilir)
    isShared BOOLEAN DEFAULT FALSE,        -- Dosyanın paylaşılma durumu
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Dosya yüklenme tarihi
    updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Dosya son güncelleme tarihi
    PRIMARY KEY (id),
    FOREIGN KEY (userId) REFERENCES users(id),
    FOREIGN KEY (folderId) REFERENCES folders(id)
);

CREATE TABLE folders (
    id CHAR(36) NOT NULL DEFAULT (UUID()),  -- Klasör için benzersiz kimlik
    userId CHAR(36) NOT NULL,              -- Klasörü oluşturan kullanıcı ID'si
    name VARCHAR(255) NOT NULL,            -- Klasör adı
    parentFolderId CHAR(36),               -- Üst klasörün ID'si (root klasör için NULL olabilir)
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Klasör oluşturulma tarihi
    updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Klasör son güncelleme tarihi
    PRIMARY KEY (id),
    FOREIGN KEY (userId) REFERENCES users(id),
    FOREIGN KEY (parentFolderId) REFERENCES folders(id)
);

