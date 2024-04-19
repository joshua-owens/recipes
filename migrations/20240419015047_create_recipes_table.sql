-- +goose Up
-- +goose StatementBegin
CREATE TABLE recipes (
  id   BIGSERIAL PRIMARY KEY,
  name TEXT NOT NULL,
  ingredients JSONB,
  instructions TEXT,
  created_at TIMESTAMPTZ DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMPTZ DEFAULT CURRENT_TIMESTAMP
);
-- +goose StatementEnd

-- +goose Down
-- +goose StatementBegin
DROP TABLE recipes;
-- +goose StatementEnd
