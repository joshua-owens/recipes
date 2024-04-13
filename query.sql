-- name: GetRecipe :one
SELECT * FROM recipes
WHERE id = $1 LIMIT 1;

-- name: ListRecipes :many
SELECT * FROM recipes
ORDER BY name;

-- name: CreateRecipe :one
INSERT INTO recipes (
    name, ingredients, instructions
) VALUES (
    $1, $2, $3
)
RETURNING *;

-- name: UpdateRecipe :exec
UPDATE recipes
    set name = $2,
    ingredients = $3,
    instructions = $4
WHERE id = $1;

-- name: DeleteRecipe :exec
DELETE FROM recipes
WHERE id = $1;