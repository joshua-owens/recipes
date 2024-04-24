# Recipes

## Requirements
- [docker](https://www.docker.com/)
- [goose](https://github.com/pressly/goose)
- [sqlc](https://github.com/sqlc-dev/sqlc)

## Code Generation

- Generating the python gRPC server code

```shell
pip install grpcio
pip install grpcio-tools
```


```shell
python3 -m grpc_tools.protoc -I protos/ --python_out=cmd/scraper/ --grpc_python_out=cmd/scraper protos/recipe.proto
```

- Go client code

```
go install google.golang.org/protobuf/cmd/protoc-gen-go@v1.28
go install google.golang.org/grpc/cmd/protoc-gen-go-grpc@v1.2
```

```
protoc --go_out=internal --go_opt=paths=source_relative --go-grpc_out=internal --go-grpc_opt=paths=source_relative protos/recipe.proto 
```