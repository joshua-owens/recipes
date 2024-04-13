CREATE TABLE recipes (
  id   BIGSERIAL PRIMARY KEY,
  name TEXT NOT NULL,
  ingredients JSONB,
  instructions TEXT
);