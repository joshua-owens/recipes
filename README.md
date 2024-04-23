# Recipes

## Requirements
- [docker](https://www.docker.com/)
- [goose](https://github.com/pressly/goose)
- [sqlc](https://github.com/sqlc-dev/sqlc)

## Code Generation

- Generating the python gRPC server code

```shell
python3 -m grpc_tools.protoc -I protos/ --python_out=cmd/scraper/ --grpc_python_out=cmd/scraper protos/recipe.proto
```