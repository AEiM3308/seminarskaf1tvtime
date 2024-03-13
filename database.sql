CREATE DATABASE seminarska;
USE seminarska;

CREATE TABLE users (
    id SERIAL PRIMARY KEY NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    username VARCHAR(255) UNIQUE NOT NULL
);

CREATE TABLE seasons(
    id SERIAL PRIMARY KEY NOT NULL,
    year INTEGER NOT NULL
);

CREATE TABLE races(
    id SERIAL PRIMARY KEY NOT NULL,
    date DATE NOT NULL,
    name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    cover VARCHAR(255) NOT NULL,
    winner_driver VARCHAR(255),
    winner_team VARCHAR(255),
    season_id INTEGER,
    CONSTRAINT "FK_season" FOREIGN KEY("season_id") REFERENCES "seasons"("id")
);

CREATE TABLE images(
    id SERIAL PRIMARY KEY NOT NULL,
    path VARCHAR(255) NOT NULL,
    CONSTRAINT "FK_race" FOREIGN KEY("race_id") REFERENCES "race"("id")
);

CREATE TABLE watched(
    id SERIAL PRIMARY KEY NOT NULL,
    CONSTRAINT "FK_race" FOREIGN KEY("race_id") REFERENCES "race"("id"),
    CONSTRAINT "FK_user" FOREIGN KEY("user_id") REFERENCES "user"("id")
);